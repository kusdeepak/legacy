<?php
class SliderClass{
	
    private $db;
	private $paging;
	private $msg;
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
     * Get website slider
     *
     * @return array - slider array
     */
    public function getAllSlider($type=""){
		
		$SQL = "SELECT * FROM slider WHERE 1";
		if(isset($type) && $type == 'fend'){
			$SQL .= " AND status = 'Y'";
		}
		$SQL .= " ORDER BY displayorder";
        $this -> rs =  $this -> db -> query($SQL);
        return $this -> rs;
    }
	
	
    /**
     * Get slider item
     *
     * @return array - slider item array
     */
    public function getSlider($sliderId){
        $sliderId = $this -> db -> cleanData($sliderId);
        $this -> rs =  $this -> db -> row("SELECT * FROM slider WHERE sliderId = '$sliderId'");
        return $this -> rs;
    }

    /**
     * Edit slider
     *
     * @param int $sliderId - slider id
     * @param file $file - slider file
     * @return string - error message
     */
    public function editSlider($sliderId=""){
        $sliderId = $this -> db -> cleanData($sliderId);	
		$title = $this -> db -> cleanData($_POST['title']);			
		$displayorder = $this -> db -> cleanData($_POST['displayorder']);
		$description = '';
		if(isset($_REQUEST['description'])&&$_REQUEST['description']!='')
		$description = $this -> db -> cleanData($_POST['description']);
		$status = $this -> db -> cleanData($_POST['status']);
		$msg = "";		
        // Check required fields
        if($sliderId > 0)
		{
				// update db
			$rs = $this -> db -> query("UPDATE slider SET title= :ttl,displayorder= :displayorder,description= :description,status= :status WHERE sliderId = :sliderId",array("ttl"=>$title,"displayorder"=>$displayorder,"description"=>$description,"status"=>$status,"sliderId"=>$sliderId));
			if($rs == 0){
				$this -> msg = "Failed to save information.";
			}else{
				$this -> msg = "Information saved successfully.";
			}
			 if($_FILES['imageloc']['tmp_name']!= '')
			 {
				$response = $this -> uploadSliderImage($_FILES['imageloc'], $sliderId);		
				if($response)
				{			
					$this -> msg =  "Information saved successfully.";
				}else{
					$this -> msg =  $response;
				}
			 }
        }
        else
		{
				$rs = $this -> db -> query("INSERT INTO slider SET title= :ttl,displayorder= :displayorder,description= :description,status= :status",array("ttl"=>$title,"displayorder"=>$displayorder,"description"=>$description,"status"=>$status));
				$sliderId = $this -> db -> lastInsertId();
				if($rs == 1)
					$this -> msg = "Information saved successfully.";
				else
					$this -> msg = "Failed to save information.";	
					
				if($_FILES['imageloc']['tmp_name']!= '')
				{
					$response = $this -> uploadSliderImage($_FILES['imageloc'], $sliderId);		
					if($response)
					{			
						$this -> msg =  "Information saved successfully.";
					}else{
						$this -> msg =  $response;
					}
				}
        }
		return $this -> msg;
    }

    /**
     * Delete slider
     *
     * @param int $sliderId - ID of slider item
     * 
     * 
     */
    public function deleteSlider($sliderId)
	{
        $sliderId = $this -> db -> cleanData($sliderId);
		$imageloc = $this -> getSlider($sliderId);		
		if(!empty($imageloc))
		 {
			$normal = '../uploads/slider/'.$imageloc['imageloc'];
			if (@file_exists($normal))
			{
				@unlink($normal);
			}
		 }
		  $this -> rs = $this -> db -> query("DELETE FROM slider WHERE sliderId = '".$sliderId."'");
		  if($this -> rs == 0)
		  {
			return "Failed to delete information.";
		  }
		  else
		  {
			return "Information deleted successfully.";
		  }
    }

	/**
     * Upload slider file
     *
     * @param array $sliderId - slider id
     * @param file $file - slider file
     * @return string - error message
     */
	private function uploadSliderImage($file, $sliderId){

		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);
		$imageloc = $sliderId.'_slideimg'.'.'.$file_type;
		$target = ROOTURL.'/uploads/slider/'.$imageloc;
		
		$allowed_ext = array('jpg','png','gif','jpeg');
				
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){
				$filename = ROOTURL.'uploads/slider/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}				
				
				$result = move_uploaded_file($file['tmp_name'], $target);
				if($result)
				{
					$targetthumb = ROOTURL.'/uploads/slider/'.$imageloc;
					$resizeObj = new ResizeClass($target);
					$resizeObj -> resizeImage(1920, 700, 'crop');
					$resizeObj -> saveImage($targetthumb, 100);	
					$targetthumb = ROOTURL.'/uploads/slider/thumb/'.$imageloc;
					$resizeObj = new ResizeClass($target);
					$resizeObj -> resizeImage(320, 360, 'exact');
					$resizeObj -> saveImage($targetthumb, 100);	
				$this -> db -> query("UPDATE slider SET imageloc= :imageloc WHERE sliderId = :sliderId",array("imageloc"=>$imageloc,"sliderId"=>$sliderId));
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
	
}
?>