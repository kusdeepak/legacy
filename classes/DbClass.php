<?php
require("LogClass.php");
class DbClass
{
	# @object, The PDO object
	public $pdo;

	# @object, PDO statement object
	private $sQuery;

	# @array,  The database settings
	private $settings;

	# @bool ,  Connected to the database
	private $bConnected = false;

	# @object, Object for logging exceptions	
	private $log;

	# @array, The parameters of the SQL query
	private $parameters;
	
	# @object, The DB class object
	private static $db_instance;
	
	
	
	/**
     * Create DbClass object
     *
     * @return object $db_instance - DB Object
     */
    public static function getInstance()
	{
        // If instance exists then return it, else create new instance and return it
        if (!self::$db_instance)
        {
            self::$db_instance = new DbClass();
        }
        return self::$db_instance;
    }
		
    /**
	*   Default Constructor 
	*
	*	1. Instantiate Log class.
	*	2. Connect to database.
	*	3. Creates the parameter array.
	*/
		public function __construct()
		{ 			
			$this->log = new Log();	
			$this->Connect();
			$this->parameters = array();
		}
	
       /**
	*	This method makes connection to the database.
	*	
	*	1. Reads the database settings from a ini file. 
	*	2. Puts  the ini content into the settings array.
	*	3. Tries to connect to the database.
	*	4. If connection failed, exception is displayed and a log file gets created.
	*/
		private function Connect()
		{
			$this->settings = parse_ini_file("settings.ini.php");
			$dsn = 'mysql:dbname='.$this->settings["dbname"].';host='.$this->settings["host"].'';
			try 
			{
				# Read settings from INI file, set UTF8
				$this->pdo = new PDO($dsn, $this->settings["user"], $this->settings["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				
				# We can now log any exceptions on Fatal error. 
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				# Disable emulation of prepared statements, use REAL prepared statements instead.
				$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
				# Connection succeeded, set the boolean to true.
				$this->bConnected = true;
			}
			catch (PDOException $e) 
			{
				# Write into log
				echo $this->ExceptionLog($e->getMessage());
				die();
			}
		}
	/*
	 *   You can use this little method if you want to close the PDO connection
	 *
	 */
	 	public function CloseConnection()
	 	{
	 		# Set the PDO object to null to close the connection
	 		# http://www.php.net/manual/en/pdo.connections.php
	 		$this->pdo = null;
	 	}
		
    /**
	*	Every method which needs to execute a SQL query uses this method.
	*	
	*	1. If not connected, connect to the database.
	*	2. Prepare Query.
	*	3. Parameterize Query.
	*	4. Execute Query.	
	*	5. On exception : Write Exception into the log + SQL query.
	*	6. Reset the Parameters.
	*/	
		private function Init($query,$parameters = "")
		{
		# Connect to database
		if(!$this->bConnected) { $this->Connect(); }
		try {
				# Prepare query
				$this->sQuery = $this->pdo->prepare($query);
				
				# Add parameters to the parameter array	
				$this->bindMore($parameters);

				# Bind parameters
				if(!empty($this->parameters)) {
					foreach($this->parameters as $param)
					{
						$parameters = explode("\x7F",$param);
						$this->sQuery->bindParam($parameters[0],$parameters[1]);
					}		
				}
				
				# Execute SQL 
				$this->succes 	= $this->sQuery->execute();		
			}
			catch(PDOException $e)
			{
					# Write into log and display Exception
					echo $this->ExceptionLog($e->getMessage(), $query );
					die();
			}

			# Reset the parameters
			$this->parameters = array();
		}
		
    /**
	*	@void 
	*
	*	Add the parameter to the parameter array
	*	@param string $para  
	*	@param string $value 
	*/	
		public function bind($para, $value)
		{	
			$this->parameters[sizeof($this->parameters)] = ":" . $para . "\x7F" . $value;
		}
    /**
	*	@void
	*	
	*	Add more parameters to the parameter array
	*	@param array $parray
	*/	
		public function bindMore($parray)
		{
			if(empty($this->parameters) && is_array($parray)) {
				$columns = array_keys($parray);
				foreach($columns as $i => &$column)	{
					$this->bind($column, $parray[$column]);
				}
			}
		}
    /**
	* 	If the SQL query  contains a SELECT or SHOW statement it returns an array containing all of the result set row
	*	If the SQL statement is a DELETE, INSERT, or UPDATE statement it returns the number of affected rows
	*
	*   @param  string $query
	*	@param  array  $params
	*	@param  int    $fetchmode
	*	@return mixed
	*/			
		public function query($query,$params = null, $fetchmode = PDO::FETCH_ASSOC)
		{
			$query = trim($query);
			
			/*View and debug prepared PDO query without looking at MySQL logs*/
			//echo $this -> interpolateQuery($query,$params);

			$this->Init($query,$params);

			$rawStatement = explode(" ", $query);
			
			# Which SQL statement is used 
			$statement = strtolower($rawStatement[0]);
			
			if ($statement === 'select' || $statement === 'show') {				
				return $this->sQuery->fetchAll($fetchmode);
			}
			elseif ( $statement === 'insert' ||  $statement === 'update' || $statement === 'delete' ) {
				return $this->sQuery->rowCount();	
			}	
			else {
				return NULL;
			}
		}
		
      /**
       *  Returns the last inserted id.
       *  @return string
       */	
		public function lastInsertId() {
			return $this->pdo->lastInsertId();
		}	
		
		public function Quote($str)
		{
			return $this->pdo->quote($str);
		}
		
    /**
	*	Returns an array which represents a column from the result set 
	*
	*	@param  string $query
	*	@param  array  $params
	*	@return array
	*/	
		public function column($query,$params = null)
		{
			$this->Init($query,$params);
			$Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);		
			
			$column = null;

			foreach($Columns as $cells) {
				$column[] = $cells[0];
			}

			return $column;
			
		}	
    /**
	*	Returns an array which represents a row from the result set 
	*
	*	@param  string $query
	*	@param  array  $params
	*   @param  int    $fetchmode
	*	@return array
	*/	
		public function row($query,$params = null,$fetchmode = PDO::FETCH_ASSOC)
		{	
			$this->Init($query,$params);
			return $this->sQuery->fetch($fetchmode);			
		}
    /**
	*	Returns the value of one single field/column
	*
	*	@param  string $query
	*	@param  array  $params
	*	@return string
	*/	
		public function single($query,$params = null)
		{
			$this->Init($query,$params);
			return $this->sQuery->fetchColumn();
		}
       /**	
	* Writes the log and returns the exception
	*
	* @param  string $message
	* @param  string $sql
	* @return string
	*/
	private function ExceptionLog($message , $sql = "")
	{
		$exception  = 'Unhandled Exception. <br />';
		$exception .= $message;
		$exception .= "<br /> You can find the error back in the log.";

		if(!empty($sql)) {
			# Add the Raw SQL to the Log
			$message .= "\r\nRaw SQL : "  . $sql;
		}
			# Write into log
			$this->log->write($message);

		return $exception;
	}			
	
	 /**
     * Clean data for SQL
     *
     * @param string $value - string to clean
     * @return string $value - cleaned string
     */
    public function cleanData($value)
    {
        $value = trim($value);
        // Strip slashes if magic quotes on
        if( get_magic_quotes_gpc() )
        {
            $value = stripslashes( $value );
        }
        // Use mysql_real_escape_string if exists
        if( function_exists( "mysql_real_escape_string" ) )
        {
            if (!is_numeric($value)){
                $value = $value;//= mysql_real_escape_string($value);
            }
        }
        // Else use mysql_escape_string if exists
        elseif(function_exists( "mysql_escape_string" ) ){
            if (!is_numeric($value)){
                $value = mysql_escape_string( $value );
            }
        }
        // Else add slashes
        else{
            $value = addslashes( $value );
        }
        return ($value);
    }
	
	 /**
     * Clean data array for SQL
     *
     * @param string $value_array - array os strings to clean
     * @return string $value_array - cleaned string array
     */
    public function cleanDataArray($value_array){
        foreach($value_array as $id => $value){
            $value_array[$id] = $this -> cleanData($value);
        }
        return $value_array;
    }

	
	/**
	* Fetch data from setting table 
	* 
	* Define variables
	*/
	public function getsettingsData()
	{
		$results =  $this->query("SELECT * FROM settings");			
		if(!defined('SITEURL')){define("SITEURL",stripslashes($results[0]['site_url']));}
		if(!defined('ADMINMAIL')){define("ADMINMAIL",stripslashes($results[0]['admin_email']));}
		if(!defined('RECORDPERPAGE')){define("RECORDPERPAGE",stripslashes($results[0]['results']));}
		if(!defined('SITELOGO')){define("SITELOGO",stripslashes($results[0]['imageloc']));}
		if(!defined('SITENAME')){define("SITENAME",stripslashes($results[0]['site_name']));}
	}
	
	/**
     * Generic DB method to count total rows
     *
     * @param string $query - SQL query
     */
    public function countRows($query,$params = null,$fetchmode = PDO::FETCH_ASSOC){
       	$this->Init($query,$params);
		return $this->sQuery->rowCount();
    }
	
	/**
	* @param string $query The sql query with parameter placeholders
	* @param array $params The array of substitution parameters
	* @return string The interpolated query
	*/
	public static function interpolateQuery($query, $params) {
		$keys = array();
		if($params != null)
		{
			# build a regular expression for each parameter
			foreach ($params as $key => $value) {
				if (is_string($key)) {
					$keys[] = '/:'.$key.'/';
				} else {
					$keys[] = '/[?]/';
				}
			}
		}
		$query = preg_replace($keys, $params, $query, 1, $count);
	
		#trigger_error('replaced '.$count.' keys');
	
		return $query;
	}
}
?>
