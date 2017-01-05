<?php
class ProductTypesClass{
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
     * Get producttype
     *
	 * @param int - producttype id
	 *
	 */
	public function getProductType($ptId){
		$ptId = $this -> db -> cleanData($ptId);
		$return_array =  $this -> db -> row("SELECT * FROM producttype WHERE productTypeId = :iid",array("iid"=>$ptId));
		return $return_array;
	}
		
		
	/**
     * Get all producttype
     *
	 *
	 */
    public function getAllProductTypes($iId){
		$iId = $this -> db -> cleanData($iId);
		$SQL = "SELECT * FROM producttype WHERE 1";
		if(isset($iId) && $iId != '0')
		{
			$SQL .= " AND industryId = '".$iId."'";
		}
		$SQL .= " ORDER BY display_order";
		//echo $SQL;
		$results =  $this -> db -> query($SQL);
		return $results;
    }	
		
	/**
     * Get all sub producttype dropdown
     *
	 * @param int - producttype id
	 */
	
	public function getAllSubIndustriesDropdown($parentId=""){
		$parentId = $this -> db -> cleanData($parentId);
		$SQL = "SELECT * FROM industries WHERE parentId = '0'  ORDER BY industriesId";
        $results =  $this -> db -> query($SQL);
        $str = '
		<select name="industriesId" id="industriesId" class="inplogin" onchange="return showsubcat(this.value);">
			<option value="">Select Industry</option>';
			foreach($results as $productTypeId => $industry_row)
			{
			$str .= '<optgroup label="'.utf8_encode(stripslashes($industry_row['industries_name'])).'">';
			$subcatSQL = "SELECT * FROM industries WHERE parentId = '".$industry_row['industriesId']."'ORDER BY industriesId";
				$resultssub =  $this -> db -> query($subcatSQL);
				foreach($resultssub as $subcatId => $subcat_row)
				{
				$str .= '<option value="'.$subcat_row['industriesId'].'"';
				if($subcat_row['industriesId']==$parentId){ $str .= 'selected';}
				$str .= '>&nbsp;&nbsp;&gt;&gt;'.stripslashes($subcat_row['industries_name']).'</option>';
				}
				$str .= '</optgroup>';
			}
		$str .='</select>';
		return $str;
    }
	
	
	
	
	/**
     * Edit producttype
     *
     * @param int $productTypeId - suppliers id
     * @return string - error message
     */
    public function editProductTypes($productTypeId="",$parentId=""){
		$msg = '';
        $productTypeId = $this -> db -> cleanData($productTypeId);
		$parentId = $this -> db -> cleanData($parentId);
        $producttype = $this -> db -> cleanData($_REQUEST['producttype']);	
		$display_order = $this -> db -> cleanData($_REQUEST['display_order']);
		$status = $this -> db -> cleanData($_REQUEST['status']);		
		if($productTypeId > 0)
		{
		  $rs = $this -> db -> query("UPDATE producttype SET producttype = :in, industryId = :pi, display_order = :display_order, status = :status WHERE productTypeId = :iid",array("in"=>$producttype,"pi"=>$parentId,"display_order"=>$display_order,"status"=>$status,"iid"=>$productTypeId));
		  if($rs == 0)
		  {
			$msg = "Failed to save information.";
		  }
		  else
		  {
			$msg = "Information saved successfully.";
		  }
		}else{
		  $rs = $this -> db -> query("INSERT INTO producttype (producttype,industryId,display_order,status) VALUES(:in, :pi, :display_order, :status)",array("in"=>$producttype,"pi"=>$parentId,"display_order"=>$display_order,"status"=>$status));
		  $productTypeId = $this -> db -> lastInsertId();
		  if($rs == 0)
		  {
			$msg = "Failed to save information.";
		  }
		  else
		  {
			$msg = "Information saved successfully.";
		  }
		}
		return $msg;
		
    }
		
	
	/**
     * Delete producttype
     *
     * @param string - producttype id
	 */
	public function deleteProductType($productTypeId){
		$productTypeId = $this -> db -> cleanData($productTypeId);
		$rs = $this -> db -> query("DELETE FROM producttype WHERE productTypeId = :iid",array("iid"=>$productTypeId));
		  if($rs == 0)
		  {
		  	return 0;
		  }
		  else
		  {
			return 1;
		  }
	}	
	
	public function getProdTypeDropDown($industryId='')
	{
		$industryId = $this -> db -> cleanData($industryId);
		
			$SQL = "SELECT * FROM producttype WHERE industryId = '".$industryId."' AND status = 'Y' ORDER BY display_order";
			$results =  $this -> db -> query($SQL);
			$rootindustry_str = '
			<select name="prodtype" id="prodtype">';
			$rootindustry_str .= '<option value="">Select Product-Type</option>';
			if($industryId != '')
			{
				foreach($results as $indIds => $ptype_row){
				$rootindustry_str .= '<option value="'.$ptype_row['productTypeId'].'"';
				if($ptype_row['productTypeId'] == $industryId){ $rootindustry_str .= 'selected';}
				$rootindustry_str .= '>'.ucwords(stripslashes($ptype_row['producttype'])).'</option>';
				}
			}
			$rootindustry_str .='</select>';
			return $rootindustry_str;
		
	}
	
}	
?>