<?php
class NewslettertopicClass{	
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
    public function getAllNeswlettertopic($type=""){
		
		$SQL = "SELECT * FROM newslettertopic WHERE 1";
		if(isset($type) && $type == 'fend'){
			$SQL .= " AND status = 'Y'";
		}
		$SQL .= " ORDER BY news_letter_topic_title";
        $this -> rs =  $this -> db -> query($SQL);
        return $this -> rs;
    }
	
	
    /**
     * GetNewsletter Topic item
     *
     * @return array - Newsletter Topic item array
     */
    public function getNewslettertopic($newletter_topic_id){
        $newletter_topic_id = $this -> db -> cleanData($newletter_topic_id);
        $this -> rs =  $this -> db -> row("SELECT * FROM newslettertopic WHERE newletter_topic_id = '$newletter_topic_id'");
        return $this -> rs;
    }

    /**
     * Edit Newsletter Topic
     *
     * @param int $newletter_topic_id - Newsletter Topic id
     * @param file $file -Newsletter Topic file
     * @return string - error message
     */
    public function editNewslettertopic($newletter_topic_id=""){
        $newletter_topic_id = $this -> db -> cleanData($newletter_topic_id);	
		$title = $this -> db -> cleanData($_POST['title']);			
		$description = $this -> db -> cleanData($_POST['description']);
		$status = $this -> db -> cleanData($_POST['status']);
		$msg = "";		
        // Check required fields
        if($newletter_topic_id > 0)
		{
				// update db
			$rs = $this -> db -> query("UPDATE newslettertopic SET news_letter_topic_title= :ttl,news_letter_topic= :news_letter_topic,status= :status WHERE newletter_topic_id = :newletter_topic_id",array("ttl"=>$title,"news_letter_topic"=>$description,"status"=>$status,"newletter_topic_id"=>$newletter_topic_id));
			if($rs == 0){
				$this -> msg = "Failed to save information.";
			}else{
				$this -> msg = "Information saved successfully.";
			}
			 
        }
        else
		{
				$rs = $this -> db -> query("INSERT INTO newslettertopic SET news_letter_topic_title= :ttl,news_letter_topic= :news_letter_topic,status= :status",array("ttl"=>$title,"news_letter_topic"=>$description,"status"=>$status));
				$newletter_topic_id = $this -> db -> lastInsertId();
				if($rs == 1)
					$this -> msg = "Information saved successfully.";
				else
					$this -> msg = "Failed to save information.";	
					
				
        }
		return $this -> msg;
    }

    /**
     * Delete slider
     *
     * @param int $newletter_topic_id - ID of slider item
     * 
     * 
     */
    public function deleteNewslettertopic($newletter_topic_id)
	{
        $newletter_topic_id = $this -> db -> cleanData($newletter_topic_id);				
		
		  $this -> rs = $this -> db -> query("DELETE FROM newslettertopic WHERE newletter_topic_id = '".$newletter_topic_id."'");
		  if($this -> rs == 0)
		  {
			return "Failed to delete information.";
		  }
		  else
		  {
			return "Information deleted successfully.";
		  }
    }

	
	
	
}
?>