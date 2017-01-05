<?php

class BrandClass{
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
     * Get brand
     *
	 * @param int - brand id
	 *
	 */
	public function getBrand($bId){
		$bId = $this -> db -> cleanData($bId);
		$return_array =  $this -> db -> row("SELECT * FROM brand WHERE brandId = :bid",array("bid"=>$bId));
		return $return_array;
	}
		
		
	/**
     * Get all brand
     *
	 *
	 */
    public function getAllBrand(){
		
		$results =  $this -> db -> query("SELECT * FROM brand WHERE 1 ORDER BY brandId ASC");
        return $results;
    }	 
	
	/**
     * Get total brand
     *
     * @return number - brand total
     */
   public function countAllBrand(){
		$SQL = "SELECT * FROM brand WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	
	/**
     * Edit brand
     *
     * @param int $brandId - suppliers id
     * @return string - error message
     */
    public function editBrand($brandId=""){
		$msg = '';
        $brandId = $this -> db -> cleanData($brandId);
        $brand_name = $this -> db -> cleanData($_REQUEST['brand_name']);
		$brand_desc = $this -> db -> cleanData($_REQUEST['brand_desc']);
		
		if($brandId > 0)
		{
		  $rs = $this -> db -> query("UPDATE brand SET brand_name = :bn,brand_desc = :bd WHERE brandId = :bid",array("bn"=>$brand_name,"bd"=>$brand_desc,"bid"=>$brandId));
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
			$rslt = $this -> db -> query("INSERT INTO brand(brand_name,brand_desc) VALUES(:bn,:bd)",array("bn"=>$brand_name,"bd"=>$brand_desc));
			$brandId = $this -> db -> lastInsertId();
			if($rslt == 0)			
			{
				$msg = "Failes to save information";
			}else{
				$msg = "Information saved successfully.";
			}
			
		}
		//Image upload function
		if(($_FILES['brand_img']['name'])!='')
		{
			$fileuploadresp = $this->uploadBrandImg($_FILES['brand_img'],$brandId);
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		
		if(($_FILES['brand_banner_img']['name'])!='')
		{
			$fileuploadresp = $this->uploadBrandBannerImg($_FILES['brand_banner_img'],$brandId);
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		
		if(($_FILES['brand_inner_img']['name'])!='')
		{
			$fileuploadresp = $this->uploadBrandBannerInnerImg($_FILES['brand_inner_img'],$brandId);
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
     * Upload Brand Image
     *
     * @param string - file
	 */
	private function uploadBrandImg($file,$bId){
		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $bId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = '../uploads/Legacy/Brand/normal/'.$imageloc;
		$targetthumb = '../uploads/Legacy/Brand/thumb/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Brand/normal/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
				
				list($width, $height, $type, $attr)=getimagesize($file['tmp_name']);
				if($width > 227 ) /* Checking the width of image */
				{
					$Twidth = 227;
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
					$this -> thumb -> thumbnail($targetthumb,$target,$Twidth,$Theight,$tag,114);
					$this -> db -> query("UPDATE brand SET brand_img = '".$imageloc."' WHERE brandId = '".$bId."'");				
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
     * Upload Brand Banner Image
     *
     * @param string - file
	 */
	private function uploadBrandBannerImg($file,$bId){
		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $bId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = '../uploads/Legacy/Brand/Banner/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Brand/Banner/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
				
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> db -> query("UPDATE brand SET brand_banner_img = '".$imageloc."' WHERE brandId = '".$bId."'");				
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
     * Upload Brand Banner Image
     *
     * @param string - file
	 */
	private function uploadBrandBannerInnerImg($file,$bId){
		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $bId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = '../uploads/Legacy/Brand/BannerInner/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Brand/BannerInner/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
				
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> db -> query("UPDATE brand SET brand_inner_img = '".$imageloc."' WHERE brandId = '".$bId."'");				
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
     * @param string - brand id
	 */
	public function deleteBrand($brandId){
		$brandId = $this -> db -> cleanData($brandId);

		$rs = $this -> db -> query("DELETE FROM brand WHERE brandId = :bid",array("bid"=>$brandId));
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