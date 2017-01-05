<?php
class BlogClass{
	
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
     * Get website blogs
     *
     * @return array - blogs array
     */
    public function getAllBlogs($start,$limit,$time){
		$start = $this -> db -> cleanData($start);
		$limit = $this -> db -> cleanData($limit);
		$post_time = $this -> db -> cleanData($time);
		if($post_time!=''){
		$SQL = "SELECT * FROM blogs WHERE 1 ORDER BY addedon DESC LIMIT $start,$limit";
		}else{		
		$SQL = "SELECT * FROM blogs WHERE 1 ORDER BY displayorder  LIMIT $start,$limit";
		}
        $results =  $this -> db -> query($SQL);
        return $results;
    }
	
	/**
     * Get blogs item
     *
     * @return array - blogs item array
     */
    public function getBlogs($blogId){
        $blogId = $this -> db -> cleanData($blogId);
        $blogs =  $this -> db -> row("SELECT * FROM blogs WHERE blogId = '$blogId'");
        return $blogs;
    }

    /**
     * Edit blogs
     *
     * @param int $blogId - blogs id
     * @param array $pages_info - blogs info
     * @param file $file - blogs file
     * @return string - error message
     */
    public function editBlog($blogId=""){
        $blogId = $this -> db -> cleanData($blogId);
        $title = $this -> db -> cleanData($_POST['title']);
		$sub_title = $this -> db -> cleanData($_POST['sub_title']);
        $description = $this -> db -> cleanData($_POST['description']);
        $status = $this -> db -> cleanData($_POST['status']);
		$seourl = $this -> db -> cleanData($_POST['seourl']);
		$displayorder = $this -> db -> cleanData($_REQUEST['displayorder']);
		
        // Check required fields
        if($blogId > 0)
		{
          	$blog_info = $this ->  getBlogs($blogId);
			if($blog_info['title']!=$title)
			{
				$seourl = $this -> generateSEOURL($title);
			}
		  	// update db
			$rs = $this -> db -> query("UPDATE blogs SET title = :ttl,subtitle = :sttl, description = :dsc, seourl = :srl, status = :st, displayorder = :dorder WHERE blogId = :pid",array("ttl"=>$title,"sttl"=>$sub_title,"dsc"=>$description,"srl"=>$seourl,"st"=>$status,"dorder"=>$displayorder,"pid"=>$blogId));
			  if($rs == 1)
			  	$msg = "Information saved successfully.";
			  else
			  	$msg = "Failed to save information.";
				 
				if($_FILES['imageloc']['tmp_name']!= '')
				 {
					$response = $this -> uploadBlogsImage($_FILES['imageloc'], $blogId);		
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
            $rs = $this -> db -> query("INSERT into blogs SET title = :ttl,subtitle = :sttl, description = :dsc, seourl = :srl, status = :st, displayorder = :dorder, addedon = NOW()",array("ttl"=>$title,"sttl"=>$sub_title,"dsc"=>$description,"srl"=>$seourl,"st"=>$status,"dorder"=>$displayorder));            $blogId = $this -> db -> lastInsertId();
            if($rs == 1)
			  	$msg = "Information saved successfully.";
			  else
			  	$msg = "Failed to save information.";
				
			if($_FILES['imageloc']['tmp_name']!= '')
			 {
				$response = $this -> uploadBlogsImage($_FILES['imageloc'], $blogId);		
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
	
	
	private function uploadBlogsImage($file, $blogId)
	   {
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);
		$imageloc = $blogId.'_pageimg'.'.'.$file_type;
		$target = ROOTURL.'/uploads/Legacy/Blog/'.$imageloc;
		
		$allowed_ext = array('jpg','png','gif','jpeg');
				
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){
				$filename = ROOTURL.'uploads/Legacy/Blog/'.$imageloc;
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
				$this -> db -> query("UPDATE blogs SET imageloc= :imageloc WHERE blogId = :pid",array("imageloc"=>$imageloc,"pid"=>$blogId));
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
     * Delete blogs
     *
     * @param int $blogId - ID of blogs item
     * 
     * 
     */
    public function deleteBlog($blogId)
	{
        $pages_info = $this -> db -> cleanData($blogId);
		// Delete from db
		$rs = $this -> db -> query("DELETE FROM blogs WHERE blogId = '".$blogId."'");
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
		$sql = "SELECT * FROM blogs WHERE seourl = '".$seourl."'";
		$cnt = $this -> db -> countRows($sql);
		return $cnt;
	}
	
	
	 public function getPagination($frmname="",$start="",$page="",$limit='')
	 {		
		$total_record =  $this -> countAllBlogsById();		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		if(isset($limit) && $limit>0 && $limit != RECORDPERPAGE)
		$recordperpage = $limit;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,$recordperpage);
        return $pagination;
    }
	 public function getPaginationCustom($frmname="",$start="",$page="",$limit=''){		
		$total_record =  $this -> countAllBlogsById();		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		if(isset($limit) && $limit>0 && $limit != RECORDPERPAGE)
		$recordperpage = $limit;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,$recordperpage);
        return $pagination;
    }
	
	public function countAllBlogsById(){
		$SQL = "SELECT * FROM blogs";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	  public function getPaginationByInd($frmname="",$start="",$page="",$industryId="",$prodTypeId="")
	  {		
		$total_record =  $this -> countAllProductByInd($industryId,$prodTypeId);		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,RECORDPERPAGE);
        return $pagination;
    }

}
?>