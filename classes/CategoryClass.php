<?php

class CategoryClass{
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
     * Get category
     *
	 * @param int - category id
	 *
	 */
	public function getCategory($cId){
		$cId = $this -> db -> cleanData($cId);
		$return_array =  $this -> db -> row("SELECT * FROM category WHERE categoryId = :cid",array("cid"=>$cId));
		return $return_array;
	}
		
		
	/**
     * Get all category
     *
	 *
	 */
    public function getAllCategory(){
		
		$results =  $this -> db -> query("SELECT * FROM category WHERE 1");
        return $results;
    }	 
	
	/**
     * Get total category
     *
     * @return number - category total
     */
   public function countAllCategory(){
		$SQL = "SELECT * FROM category WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	
	/**
     * Edit category
     *
     * @param int $categoryId - suppliers id
     * @return string - error message
     */
    public function editCategory($categoryId=""){
		$msg = '';
        $categoryId = $this -> db -> cleanData($categoryId);
        $category_name = $this -> db -> cleanData($_REQUEST['category_name']);
		$Description = $this -> db -> cleanData($_REQUEST['Description']);
		
		if($categoryId > 0)
		{
		  $rs = $this -> db -> query("UPDATE category SET category_name = :cn,Description = :desc WHERE categoryId = :cid",array("cn"=>$category_name,"desc"=>$Description,"cid"=>$categoryId));
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
			$rslt = $this -> db -> query("INSERT INTO category(category_name,Description) VALUES(:cn, :desc)",array("cn"=>$category_name,"desc"=>$Description));
			$categoryId = $this -> db -> lastInsertId();
			if($rslt == 0)			
			{
				$msg = "Failes to save information";
			}else{
				$msg = "Information saved successfully.";
			}
			
		}
		//Image upload function
		if(($_FILES['cat_img']['name'])!='')
		{
			$fileuploadresp = $this->uploadCategoryImg($_FILES['cat_img'],$categoryId);
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
	private function uploadCategoryImg($file,$cId){
		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $cId.'.'.$file_type;
		$target = '../uploads/Legacy/Category/normal/'.$imageloc;
		$targetthumb = '../uploads/Legacy/Category/thumb/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Category/normal/'.$imageloc;
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
					$this -> db -> query("UPDATE category SET imgloc = '".$imageloc."', imagename = '".$file['name']."' WHERE categoryId = '".$cId."'");				
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
     * @param string - category id
	 */
	public function deleteCategory($categoryId){
		$categoryId = $this -> db -> cleanData($categoryId);

		$rs = $this -> db -> query("DELETE FROM category WHERE categoryId = :cid",array("cid"=>$categoryId));
		  if($rs == 0)
		  {
		  	return 0;
		  }
		  else
		  {
			return 1;
		  }
	}	
	
	public function getCategoryDropDown($categoryId='')
	{
		$categoryId = $this -> db -> cleanData($categoryId);
		$SQL = "SELECT * FROM category WHERE 1 ORDER BY category_name";
        $results =  $this -> db -> query($SQL);
		$category_str = '
		<select name="category" id="category">';
		$category_str .= '<option value="">Select Product-Type</option>';
		foreach($results as $catds => $cat_row){
		$category_str .= '<option value="'.$cat_row['categoryId'].'"';
		if($cat_row['categoryId'] == $categoryId){ $category_str .= 'selected';}
		$category_str .= '>'.ucwords(stripslashes($cat_row['category_name'])).'</option>';
		}
		$category_str .='</select>';
		return $category_str;
	}
}	
?>