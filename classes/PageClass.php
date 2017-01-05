<?php
class PageClass{
	
    private $db;
	private $paging;
	private $rs;

    /**
     * Constructor to create instance of DB object
     *
     */
    public function __construct(){
        $this -> db = DbClass::getInstance();
		$this -> db -> getsettingsData();
    }
    /**
     * Get website pages
     *
     * @return array - pages array
     */
    public function getAllPages($start,$limit){
		$start = $this -> db -> cleanData($start);
		$limit = $this -> db -> cleanData($limit);
		$SQL = "SELECT * FROM pages WHERE 1 ORDER BY displayorder  LIMIT $start,$limit";
        $results =  $this -> db -> query($SQL);
        return $results;
    }
	
	/**
     * Get pages item
     *
     * @return array - pages item array
     */
    public function getPages($pageId){
        $pageId = $this -> db -> cleanData($pageId);
        $pages =  $this -> db -> row("SELECT * FROM pages WHERE pageId = '$pageId'");
        return $pages;
    }

    /**
     * Edit pages
     *
     * @param int $pageId - pages id
     * @param array $pages_info - pages info
     * @param file $file - pages file
     * @return string - error message
     */
    public function editPage($pageId=""){
        $pageId = $this -> db -> cleanData($pageId);
        $title = $this -> db -> cleanData($_POST['title']);
        $description = $this -> db -> cleanData($_POST['description']);
        $status = $this -> db -> cleanData($_POST['status']);
		$seourl = $this -> db -> cleanData($_POST['seourl']);
		$displayorder = $this -> db -> cleanData($_REQUEST['displayorder']);
        // Check required fields
        if($pageId > 0)
		{
          	$page_info = $this ->  getPages($pageId);
			if($page_info['title']!=$title)
			{
				$seourl = $this -> generateSEOURL($title);
			}
		  	// update db
			$rs = $this -> db -> query("UPDATE pages SET title = :ttl, description = :dsc, seourl = :srl, status = :st, displayorder = :dorder WHERE pageId = :pid",array("ttl"=>$title,"dsc"=>$description,"srl"=>$seourl,"st"=>$status,"dorder"=>$displayorder,"pid"=>$pageId));
			  if($rs == 1)
			  	$msg = "Information saved successfully.";
			  else
			  	$msg = "Failed to save information.";
				 
				if($_FILES['imageloc']['tmp_name']!= '')
				 {
					$response = $this -> uploadPagesImage($_FILES['imageloc'], $pageId);		
					if($response)
					{			
						$msg =  "Information saved successfully.";
					}else{
						$msg =  $response;
					}
				 }	         
        }
        else
		{
			$seourl = $this -> generateSEOURL($title);
            $rs = $this -> db -> query("INSERT into pages SET title = :ttl, description = :dsc, seourl = :srl, status = :st, displayorder = :dorder",array("ttl"=>$title,"dsc"=>$description,"srl"=>$seourl,"st"=>$status,"dorder"=>$displayorder));            $pageId = $this -> db -> lastInsertId();
            if($rs == 1)
			  	$msg = "Information saved successfully.";
			  else
			  	$msg = "Failed to save information.";
				
			if($_FILES['imageloc']['tmp_name']!= '')
			 {
				$response = $this -> uploadPagesImage($_FILES['imageloc'], $pageId);		
				if($response)
				{			
					$msg =  "Information saved successfully.";
				}else{
					$msg =  $response;
				}
			 }		
        }
		return $msg;
    }
	
	
	private function uploadPagesImage($file, $pageId){

		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);
		$imageloc = $pageId.'_pageimg'.'.'.$file_type;
		$target = ROOTURL.'/uploads/pages/'.$imageloc;
		
		$allowed_ext = array('jpg','png','gif','jpeg');
				
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){
				$filename = ROOTURL.'uploads/pages/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}				
				
				$result = move_uploaded_file($file['tmp_name'], $target);
				if($result)
				{
					/*$targetthumb = ROOTURL.'/uploads/slider/'.$imageloc;
					$resizeObj = new ResizeClass($target);
					$resizeObj -> resizeImage(1920, 700, 'crop');
					$resizeObj -> saveImage($targetthumb, 100);	*/					
				$this -> db -> query("UPDATE pages SET imageloc= :imageloc WHERE pageId = :pid",array("imageloc"=>$imageloc,"pid"=>$pageId));
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
     * Delete pages
     *
     * @param int $pageId - ID of pages item
     * 
     * 
     */
    public function deletePage($pageId)
	{
        $pages_info = $this -> db -> cleanData($pageId);
		// Delete from db
		$rs = $this -> db -> query("DELETE FROM pages WHERE pageId = '".$pageId."'");
		if($rs == 1)
			return "Information Delete successfully.";
			else
			return "Failed to Delete information.";
    }
	
	public function generateSEOURL($url="")
	{
	  $url = $this -> db -> cleanData($url);
	  $seourl = str_replace(' ', '-', trim(strtolower(stripslashes($url))));
	  $totseourlcnt = $this -> checkSEOURL($seourl);
	  if($totseourlcnt ==0){
		 return $seourl;
	  }else{
		 $cnt=0;
		 for($i=1;$i<=$totseourlcnt+$cnt;$i++)
		 {
		 	$sseourl = $seourl.'-'.$i;
		  	$chk = $this -> checkSEOURL($sseourl);
		   	if($chk == 0){
		   		return $sseourl;
		   		break;
		   	}else{
				$cnt++;
		   }
		 }
		}  	  
	 }
	
	public function checkSEOURL($seourl="")
	{
		$sql = "SELECT * FROM pages WHERE seourl = '".$seourl."'";
		$cnt = $this -> db -> countRows($sql);
		return $cnt;
	}

}
?>