<?php

class MSDSClass{
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
     * Get MSDS
     *
	 * @param int - MSDS id
	 *
	 */
	public function getMSDS($msdsId){
		$msdsId = $this -> db -> cleanData($msdsId);
		$return_array =  $this -> db -> row("SELECT * FROM msds WHERE msdsId = :msdsid",array("msdsid"=>$msdsId));
		return $return_array;
	}
		
		
	/**
     * Get all MSDS
     *
	 *
	 */
    public function getAllMSDS(){
		
		$results =  $this -> db -> query("SELECT * FROM msds WHERE 1");
        return $results;
    }	 
	
	/**
     * Get total MSDS
     *
     * @return number - MSDS total
     */
   public function countAllMSDS(){
		$SQL = "SELECT * FROM msds WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	
	/**
     * Edit MSDS
     *
     * @param int $msdsId - suppliers id
     * @return string - error message
     */
    public function editMSDS($msdsId=""){
		$msg = '';
        $msdsId = $this -> db -> cleanData($msdsId);
        $msds_name = $this -> db -> cleanData($_REQUEST['msds_name']);
		
		if($msdsId > 0)
		{
		  $rs = $this -> db -> query("UPDATE msds SET msds_name = :msdsn WHERE msdsId = :msdsid",array("msdsn"=>$msds_name,"msdsid"=>$msdsId));
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
			$rslt = $this -> db -> query("INSERT INTO msds(msds_name) VALUES(:msdsn)",array("msdsn"=>$msds_name));
			$msdsId = $this -> db -> lastInsertId();
			if($rslt == 0)			
			{
				$msg = "Failes to save information";
			}else{
				$msg = "Information saved successfully.";
			}
			
		}
		//Image upload function
		if(($_FILES['msds_file']['name'])!='')
		{
			$fileuploadresp = $this->uploadMSDSFile($_FILES['msds_file'],$msdsId);
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
	
		return $msg;
		
    }
	
	/**
     * Upload MSDS File
     *
     * @param string - file
	 */
	private function uploadMSDSFile($file,$msdsId){
		
		$fileParts  = pathinfo($file['name']);		
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $msdsId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = '../uploads/Legacy/MSDS/'.$imageloc;		
		$allowed_ext = array('pdf');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/MSDS/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}								
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> db -> query("UPDATE msds SET msds_file = '".$imageloc."', filename = '".$file['name']."' WHERE msdsId = '".$msdsId."'");				
				}
				return true;
			}			
		}
		else{
			return 'This filetype is not allowed. Please upload one of the following: .pdf';
		}
	}
	
			
	/**
     * Delete Brand
     *
     * @param string - MSDS id
	 */
	public function deleteMSDS($msdsId){
		$msdsId = $this -> db -> cleanData($msdsId);

		$rs = $this -> db -> query("DELETE FROM msds WHERE msdsId = :msdsid",array("msdsid"=>$msdsId));
		  if($rs == 0)
		  {
		  	return 0;
		  }
		  else
		  {
			return 1;
		  }
	}	
	
	/**
     * Get all MSDS dropdown
     *
	 *
	 */
	
	public function getAllMSDSDropdown($msdsId=""){
		$msdsId = $this -> db -> cleanData($msdsId);
		$SQL = "SELECT * FROM msds WHERE 1";
        $results =  $this -> db -> query($SQL);
        $str = '
		<select name="msdsId" id="msdsId" class="inplogin">
			<option value="">Select MSDS</option>';
			foreach($results as $msdsId => $msds_row)
			{
				$str .= '<option value="'.$msds_row['msdsId'].'"';
				if($msds_row['msdsId']==$msdsId){ $str .= 'selected';}
				$str .= '>'.utf8_encode(stripslashes($msds_row['msds_name'])).'</option>';			
			}
		$str .='</select>';
		return $str;
    }
}	
?>