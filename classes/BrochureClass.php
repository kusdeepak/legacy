<?php

class BrochureClass{
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
     * Get Brochure
     *
	 * @param int - Brochure id
	 *
	 */
	public function getBrochure($brcId){
		$brcId = $this -> db -> cleanData($brcId);
		$return_array =  $this -> db -> row("SELECT * FROM brochure WHERE brochureId = :brcid",array("brcid"=>$brcId));
		return $return_array;
	}
		
		
	/**
     * Get all Brochure
     *
	 *
	 */
    public function getAllBrochure(){
		
		$results =  $this -> db -> query("SELECT * FROM brochure WHERE 1");
        return $results;
    }	 
	
	/**
     * Get total Brochure
     *
     * @return number - Brochure total
     */
   public function countAllBrochure(){
		$SQL = "SELECT * FROM Brochure WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	
	/**
     * Edit Brochure
     *
     * @param int $brochureId - suppliers id
     * @return string - error message
     */
    public function editBrochure($brochureId=""){
		$msg = '';
        $brochureId = $this -> db -> cleanData($brochureId);
        $brochure_name = $this -> db -> cleanData($_REQUEST['brochure_name']);
		
		if($brochureId > 0)
		{
		  $rs = $this -> db -> query("UPDATE brochure SET brochure_name = :brcn WHERE brochureId = :brcid",array("brcn"=>$brochure_name,"brcid"=>$brochureId));
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
			$rslt = $this -> db -> query("INSERT INTO brochure(brochure_name) VALUES(:brcn)",array("brcn"=>$brochure_name));
			$brochureId = $this -> db -> lastInsertId();
			if($rslt == 0)			
			{
				$msg = "Failes to save information";
			}else{
				$msg = "Information saved successfully.";
			}
			
		}
		//Image upload function
		if(($_FILES['brochure_file']['name'])!='')
		{
			$fileuploadresp = $this->uploadBrochureFile($_FILES['brochure_file'],$brochureId);
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
     * Upload Brochure File
     *
     * @param string - file
	 */
	private function uploadBrochureFile($file,$brcId){
		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $brcId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = '../uploads/Legacy/Brochure/'.$imageloc;		
		$allowed_ext = array('pdf');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Brochure/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}								
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> db -> query("UPDATE brochure SET brochure_file = '".$imageloc."', filename = '".$file['name']."' WHERE brochureId = '".$brcId."'");				
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
     * @param string - Brochure id
	 */
	public function deleteBrochure($brochureId){
		$brochureId = $this -> db -> cleanData($brochureId);

		$rs = $this -> db -> query("DELETE FROM brochure WHERE brochureId = :brcid",array("brcid"=>$brochureId));
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
     * Get all brochure dropdown
     *
	 *
	 */
	
	public function getAllBrochureDropdown($brochureId=""){
		$brochureId = $this -> db -> cleanData($brochureId);
		$SQL = "SELECT * FROM brochure WHERE 1";
        $results =  $this -> db -> query($SQL);
        $str = '
		<select name="brochureId" id="brochureId" class="inplogin">
			<option value="">Select Series Brochure</option>';
			foreach($results as $bId => $brochure_row)
			{
				$str .= '<option value="'.$brochure_row['brochureId'].'"';
				if($brochure_row['brochureId']==$brochureId){ $str .= 'selected';}
				$str .= '>'.utf8_encode(stripslashes($brochure_row['brochure_name'])).'</option>';			
			}
		$str .='</select>';
		return $str;
    }
	
}	
?>