<?php

class IndustriesClass{
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
     * Get industries
     *
	 * @param int - industries id
	 *
	 */
	public function getIndustries($iId){
		$iId = $this -> db -> cleanData($iId);
		$return_array =  $this -> db -> row("SELECT * FROM industries WHERE industriesId = :iid",array("iid"=>$iId));
		return $return_array;
	}
		
		
	/**
     * Get all industries
     *
	 *
	 */
    public function getAllIndustries(){
		
		$results =  $this -> db -> query("SELECT * FROM industries WHERE parentId = '0' ORDER BY display_order");
		return $results;
    }	
		
	/**
     * Get parentId of an industries
     *
	 * @param int - industries id
	 */
	public function getParentId($iId)
	{
		$iId = $this -> db -> cleanData($iId);
		$rs = $this -> db -> row("SELECT * FROM industries WHERE industriesId = :iid",array("iid"=>$iId));
		if($rs['parentId'] != 0)
			return $rs['parentId'];
		else
			return $iId;
	}
	
	/**
     * Get child industries of an industries
     *
	 * @param int - industries id
	 */
	public function getChildIndustry($iId='')
	{
		$iId = $this -> db ->cleanData($iId);
		$SQL = "SELECT * FROM industries WHERE parentId = '".$iId."'";
		$subIndustryArray = $this -> db -> query($SQL);
		$subIndustryArrayStr = "";
		 if(count($subIndustryArray)>0)
		 {
			 foreach($subIndustryArray as $indRow)
			 {
				$subIndustryArrayStr .= $indRow['industriesId'].",";
			 }
			 $subIndustryArrayStr = substr($subIndustryArrayStr,0,-1);				
		 }		 
		 return $subIndustryArrayStr;
	}
	
	/**
     * Get all sub industries
     *
	 * @param int - industries id
	 * @param text - type
	 */ 
	
	public function getAllSubIndustries($parentId,$type=''){
		$parentId = $this -> db -> cleanData($parentId);
		$type = $this -> db -> cleanData($type);
		$SQL = "SELECT * FROM industries WHERE 1";
		if($parentId >0) 
		{
			$SQL .= " AND parentId = '".$parentId."'";
		}
		else 
		{
			$SQL .= " AND parentId = '0'";
		}
		if($type == 'fend')
		{
			$SQL .= " AND status = 'Y'";
		}
				
		$SQL .= " ORDER BY display_order";	
		//echo $SQL;
        $results =  $this -> db -> query($SQL);
        return $results;
    }
	
	/**
     * Get all sub industries dropdown
     *
	 * @param int - industries id
	 */
	
	public function getAllSubIndustriesDropdown($parentId=""){
		$parentId = $this -> db -> cleanData($parentId);
		$SQL = "SELECT * FROM industries WHERE parentId = '0'  ORDER BY industriesId";
        $results =  $this -> db -> query($SQL);
        $str = '
		<select name="industriesId" id="industriesId" class="inplogin" onchange="return showsubcat(this.value);">
			<option value="">Select Industry</option>';
			foreach($results as $industriesId => $industry_row)
			{
			$str .= '<option value="'.$industry_row['industriesId'].'"';
			if($industry_row['industriesId']==$parentId){ $str .= 'selected';}
			$str .= '>'.utf8_encode(stripslashes($industry_row['industries_name'])).'</option>';
			$subcatSQL = "SELECT * FROM industries WHERE parentId = '".$industry_row['industriesId']."'ORDER BY industriesId";
				$resultssub =  $this -> db -> query($subcatSQL);
				foreach($resultssub as $subcatId => $subcat_row)
				{
				$str .= '<option value="'.$subcat_row['industriesId'].'"';
				if($subcat_row['industriesId']==$parentId){ $str .= 'selected';}
				$str .= '>&nbsp;&nbsp;&gt;&gt;'.utf8_encode(stripslashes($subcat_row['industries_name'])).'</option>';
				}
			}
		$str .='</select>';
		return $str;
    }
	
	/**
     * Get all sub industries dropdown with multiple selection
     *
	 *
	 */
	
	public function getAllSubIndustriesMultipleDropdown($parentId=""){
		
		$SQL = "SELECT * FROM industries WHERE parentId = '0'  ORDER BY display_order";
        $results =  $this -> db -> query($SQL);
        $str = '
		<select name="industry[]" id="industry" multiple="multiple" style="height:450px;">';
			foreach($results as $industriesId => $industry_row)
			{
			$str .= '<option value="'.$industry_row['industriesId'].'"';
			if(is_array($parentId)&&in_array($industry_row['industriesId'],$parentId)){ $str .= 'selected';}
			$str .= '>'.utf8_encode(stripslashes($industry_row['industries_name'])).'</option>';
			$subcatSQL = "SELECT * FROM industries WHERE parentId = '".$industry_row['industriesId']."' AND status = 'Y' ORDER BY display_order";
				$resultssub =  $this -> db -> query($subcatSQL);
				foreach($resultssub as $subcatId => $subcat_row)
				{
				$str .= '<option value="'.$subcat_row['industriesId'].'"';
				if(is_array($parentId)&&in_array($subcat_row['industriesId'],$parentId)){ $str .= 'selected';}
				$str .= '>&nbsp;&nbsp;&nbsp;&nbsp;'.utf8_encode(stripslashes($subcat_row['industries_name'])).'</option>';
				}
			}
		$str .='</select>';
		return $str;
    }
	
	
	/**
     * Get total industries
     *
     * @return number - industries total
     */
   public function countAllIndustries(){
		$SQL = "SELECT * FROM industries WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	
	/**
     * Edit industries
     *
     * @param int $industriesId - suppliers id
     * @return string - error message
     */
    public function editIndustries($industriesId="",$parentId=""){
		$msg = '';
        $industriesId = $this -> db -> cleanData($industriesId);
		$parentId = $this -> db -> cleanData($parentId);
        $industries_name = $this -> db -> cleanData($_REQUEST['industries_name']);	
		$small_description = $this -> db -> cleanData($_REQUEST['small_description']);	
		$description = $this -> db -> cleanData($_REQUEST['description']);
		$display_order = $this -> db -> cleanData($_REQUEST['display_order']);
		$status = $this -> db -> cleanData($_REQUEST['status']);		
		if($industriesId > 0)
		{
		  $rs = $this -> db -> query("UPDATE industries SET industries_name = :in, parentId = :pi, display_order = :display_order, status = :status,small_description=:sdsc,description=:dsc WHERE industriesId = :iid",array("in"=>$industries_name,"pi"=>$parentId,"display_order"=>$display_order,"status"=>$status,"iid"=>$industriesId,"sdsc"=>$small_description,"dsc"=>$description));
		  if($rs == 0)
		  {
			$msg = "Failed to save information.";
		  }
		  else
		  {
			$msg = "Information saved successfully.";
		  }
		}else{
		  $rs = $this -> db -> query("INSERT INTO industries (industries_name,parentId,display_order,status,small_description,description) VALUES(:in, :pi, :display_order, :status,:sdsc,:dsc)",array("in"=>$industries_name,"pi"=>$parentId,"display_order"=>$display_order,"status"=>$status,"sdsc"=>$small_description,"dsc"=>$description));
		  $industriesId = $this -> db -> lastInsertId();
		  if($rs == 0)
		  {
			$msg = "Failed to save information.";
		  }
		  else
		  {
			$msg = "Information saved successfully.";
		  }
		}
		
		//Image upload function
		if(($_FILES['industry_img']['name'])!='')
		{
			$fileuploadresp = $this->uploadIndustryImg($_FILES['industry_img'],$industriesId);
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
     * Upload Industry Image
     *
     * @param string - file
	 */
	private function uploadIndustryImg($file,$iId){
		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $iId.'.'.$file_type;
		$target = '../uploads/Legacy/Industries/normal/'.$imageloc;
		$targetthumb = '../uploads/Legacy/Industries/thumb/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Industries/normal/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
				
				list($width, $height, $type, $attr)=getimagesize($file['tmp_name']);
				if($width > 51 ) /* Checking the width of image */
				{
					$Twidth = 51;
				}
				else
				{
					$Twidth = $width;
				}
				$Theight = $height;
				$tag = 'width';
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> thumb = ThumbnailClass::getInstance();
					$this -> thumb -> thumbnail($targetthumb,$target,$Twidth,$Theight,$tag,52);
					$this -> db -> query("UPDATE industries SET industries_img_name = '".$imageloc."', imgname = '".$file['name']."' WHERE industriesId = '".$iId."'");				
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
     * Delete Industry
     *
     * @param string - industry id
	 */
	public function deleteIndustry($industryId){
		$industryId = $this -> db -> cleanData($industryId);
		$rs = $this -> db -> query("DELETE FROM industries WHERE industriesId = :iid",array("iid"=>$industryId));
		  if($rs == 0)
		  {
		  	return 0;
		  }
		  else
		  {
			return 1;
		  }
	}	
	
	
	public function getRootIndustryDropDown($industryId='')
	{
		$industryId = $this -> db -> cleanData($industryId);
		$SQL = "SELECT * FROM industries WHERE parentId = '0' ORDER BY industries_name";
        $results =  $this -> db -> query($SQL);
		$rootindustry_str = '
		<select name="industry" id="industry" onchange="showSubIndustry(this.value);">';
		$rootindustry_str .= '<option value="">Select Category</option>';
		foreach($results as $indIds => $industry_row){
		$rootindustry_str .= '<option value="'.$industry_row['industriesId'].'"';
		if($industry_row['industriesId'] == $industryId){ $rootindustry_str .= 'selected';}
		$rootindustry_str .= '>'.ucwords(stripslashes($industry_row['industries_name'])).'</option>';
		}
		$rootindustry_str .='</select>';
		return $rootindustry_str;
	}
	
	public function getSubIndustryDropDown($industryId='')
	{
		$industryId = $this -> db -> cleanData($industryId);
		
			$SQL = "SELECT * FROM industries WHERE parentId = '".$industryId."' AND status = 'Y' ORDER BY industries_name";
			$results =  $this -> db -> query($SQL);
			$rootindustry_str = '
			<select name="subind" id="subind" onchange="showProductType(this.value)">';
			$rootindustry_str .= '<option value="">Select Sub-Category</option>';
			if($industryId != '')
			{
				foreach($results as $indIds => $industry_row){
				$rootindustry_str .= '<option value="'.$industry_row['industriesId'].'"';
				if($industry_row['industriesId'] == $industryId){ $rootindustry_str .= 'selected';}
				$rootindustry_str .= '>'.ucwords(stripslashes($industry_row['industries_name'])).'</option>';
				}
			}
			$rootindustry_str .='</select>';
			return $rootindustry_str;
		
	}
}	
?>