<?php

class ApplyClass{
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
     * Get all apply job
     *
	 *
	 */
    public function getAllApplyJob(){
		
		$results =  $this -> db -> query("SELECT * FROM resume WHERE 1");
        return $results;
    }	 
	
	/**
     * Get total apply job
     *
     * @return number - job total
     */
   public function countAllApplyJob(){
		$SQL = "SELECT * FROM resume WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	/**
     * Add apply job
     *    
     * @return string - error message
     */
	
	public function addApply(){
		$msg = '';
		if(($_FILES['resume']['name'])==''){
			return 'Please attach your resume.';
		}
		$post_name = $this -> db -> cleanData($_REQUEST['post_name']);
		$name = $this -> db -> cleanData($_REQUEST['name']);
		$phone = $this -> db -> cleanData($_REQUEST['ContactNo']);
		$email = $this -> db -> cleanData($_REQUEST['email']);
		
		$rslt = $this -> db -> query("INSERT INTO resume(post_name,name,phone,email,date) VALUES(:post_name,:name,:phone,:email,:dt)",array("post_name"=>$post_name,"name"=>$name,"phone"=>$phone,"email"=>$email,"dt"=>date('Y-m-d h:i:s A')));
		$resumeId = $this -> db -> lastInsertId();
		if($rslt == 0)			
		{
			$msg = "Failes to save information";
		}else{
			$msg = "Information saved successfully.";
		}
		
		//File upload function
		if(($_FILES['resume']['name'])!='')
		{
			$fileuploadresp = $this->uploadFile($_FILES['resume'],$resumeId);
			if($fileuploadresp=='true')
			{
				$msg =  "You have successfully apply for the post.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
	
		return $msg;		
    }
	
	/**
     * Upload Brand Image
     *
     * @param string - file
	 */
	private function uploadFile($file,$rId){
		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $rId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = 'uploads/Legacy/Resume/'.$imageloc;
		$allowed_ext = array('pdf','doc','docx');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Resume/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> db -> query("UPDATE resume SET imgloc = '".$imageloc."' WHERE resumeId = '".$rId."'");				
				}
				return true;
			}
			else{
				if ($file['error'] == 1) {
					$max_upload_size = min($this->let_to_num(ini_get('post_max_size')), $this->let_to_num(ini_get('upload_max_filesize')));
					return 'The file you attempted to upload was too large.<br /> Please try again with a file that is less than '.($max_upload_size/(1024*1024)).' MB';
				}
			}
		}
		else{
			return 'This filetype is not allowed. Please upload one of the following: .jpg, .jpeg, .gif, .png';
		}
	}
	
	/**
     * Delete Brand
     *
     * @param string - job id
	 */
	public function deleteApplyJob($resumeId){
		$resumeId = $this -> db -> cleanData($resumeId);

		$rs = $this -> db -> query("DELETE FROM resume WHERE resumeId = :rsmid",array("rsmid"=>$resumeId));
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