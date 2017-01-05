<?php

class JobClass{
	private $db;
	
	/**
     * Constructor to create instance of DB object
     *
	 */
	public function __construct(){
		$this -> db = DbClass::getInstance();
		$this -> db -> getsettingsData();
	}	
	/**
     * Create url friendly string
     *
	 * @return string - url string
	 */
	public function toAscii($str, $delimiter='-') {
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	
		return $clean;
	}
	
	/**
     * Check email
     *
	 * @return bool - email valid
	 */
	public function isEmail($email){
		if (preg_match("/^(\w+((-\w+)|(\w.\w+))*)\@(\w+((\.|-)\w+)*\.\w+$)/",$email)){
			return true;
		}
		else {
			return false;
		}
	}
	
	/**
     * Add http if none
     *
	 * @return string - url to check
	 * @return string - url with http
	 */
	public function addhttp($url) {
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}
		return $url;
	}

	
	/**
     * Get job
     *
	 * @param int - job id
	 *
	 */
	public function getJob($jobId){
		$jobId = $this -> db -> cleanData($jobId);
		$return_array =  $this -> db -> row("SELECT * FROM job WHERE jobId = :jobid",array("jobid"=>$jobId));
		return $return_array;
	}
		
		
	/**
     * Get all job
     *
	 *
	 */
    public function getAllJob(){
		
		$results =  $this -> db -> query("SELECT * FROM job WHERE 1");
        return $results;
    }	 
	
	/**
     * Get total job
     *
     * @return number - job total
     */
   public function countAllJob(){
		$SQL = "SELECT * FROM job WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	
	/**
     * Edit job
     *
     * @param int $jobId - suppliers id
     * @return string - error message
     */
    public function editJob($jobId=""){
		$msg = '';
        $jobId = $this -> db -> cleanData($jobId);
        $post_name = $this -> db -> cleanData($_REQUEST['post_name']);
		$description = $this -> db -> cleanData($_REQUEST['description']);
		
		if($jobId > 0)
		{
		  $rs = $this -> db -> query("UPDATE job SET post_name = :postn, description = :desc WHERE jobId = :jobid",array("postn"=>$post_name,"desc"=>$description,"jobid"=>$jobId));
		  if($rs == 0)
		  {
			$msg = "Failed to save information.";
		  }
		  else
		  {
			$msg = "Information saved successfully.";
		  }
		}
		else
		{
			$rslt = $this -> db -> query("INSERT INTO job(post_name,description,date) VALUES(:postn,:desc,:dt)",array("postn"=>$post_name,"desc"=>$description,"dt"=>date('Y-m-d h:i:s A')));
			$jobId = $this -> db -> lastInsertId();
			if($rslt == 0)			
			{
				$msg = "Failes to save information";
			}else{
				$msg = "Information saved successfully.";
			}
			
		}
		return $msg;
		
    }
	
	/**
     * Delete Brand
     *
     * @param string - job id
	 */
	public function deleteJob($jobId){
		$jobId = $this -> db -> cleanData($jobId);

		$rs = $this -> db -> query("DELETE FROM job WHERE jobId = :jobid",array("jobid"=>$jobId));
		  if($rs == 0)
		  {
		  	return 0;
		  }
		  else
		  {
			return 1;
		  }
	}	
	
}	
?>