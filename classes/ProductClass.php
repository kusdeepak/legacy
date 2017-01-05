<?php

class ProductClass{
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
     * Get product
     *
	 * @param int - product id
	 *
	 */
	public function getProduct($pId){
		$pId = $this -> db -> cleanData($pId);
		$return_array =  $this -> db -> row("SELECT * FROM product WHERE productId = :pid",array("pid"=>$pId));
		return $return_array;
	}
		
		
	/**
     * Get all product
     *
	 *
	 */
    public function getAllProduct(){
		
		$results =  $this -> db -> query("SELECT * FROM product WHERE 1");
        return $results;
    }	
	
	
	/**
     * Get all Featured product
     *
	 *
	 */
    public function getAllFeaturedProducts(){
		
		$results =  $this -> db -> query("SELECT * FROM product WHERE featured_product = 'Y'");
        return $results;
    }

   /**
     * Get all Related products
     *
	 *
	 */
    public function getAllRelatedProducts($pid){
		$pid = $this -> db -> cleanData($pid);
		$results =  $this -> db -> row("SELECT related_products FROM product WHERE productId = '$pid'");
        return $results;
    }
		
	/**
     * Get all product by Category
     *
	 *
	 */
    public function getAllProductByCat($catId,$start,$limit=''){
		$catId = $this -> db -> cleanData($catId);
		$results =  $this -> db -> query("SELECT * FROM product WHERE FIND_IN_SET(".$catId.",category) LIMIT $start,$limit");
        return $results;
    }	 
	
	/**
     * Get all product by Brand
     *
	 *
	 */
    public function getAllProductByBrnd($brandId,$start,$limit=''){
		$brandId = $this -> db -> cleanData($brandId);
		$results =  $this -> db -> query("SELECT * FROM product WHERE FIND_IN_SET(".$brandId.",brands) LIMIT $start,$limit");
        return $results;
    }	 
	
	
	
	/**
     * Get all product by Industry
     *
	 *
	 */
    public function getAllProductByInd($indId,$ptypeId,$start,$limit=''){
		$indId = $this -> db -> cleanData($indId);
		$ptypeId = $this -> db -> cleanData($ptypeId);
		$indObj = new IndustriesClass();
		$parentId = $indObj -> getParentId($indId);
		if($ptypeId != ''){
			//echo "SELECT * FROM product WHERE FIND_IN_SET(".$ptypeId.",producttype) LIMIT $start,$limit";
			$rslt =  $this -> db -> query("SELECT * FROM product WHERE FIND_IN_SET(".$ptypeId.",producttype) LIMIT $start,$limit");
        	return $rslt;
		}else if($parentId != $indId){
			//echo "SELECT * FROM product WHERE FIND_IN_SET(".$indId.",industry) LIMIT $start,$limit";
			$results =  $this -> db -> query("SELECT * FROM product WHERE FIND_IN_SET(".$indId.",industry) LIMIT $start,$limit");
        	return $results;
		}else{
			$SQL = "SELECT * FROM product WHERE FIND_IN_SET(".$indId.",industry)";
			$childIndId = $indObj -> getChildIndustry($indId);			
			if(!empty($childIndId))
			{
				$childIndId = explode(",",$childIndId);
				foreach($childIndId as $chind)
				{
					$SQL .= " OR FIND_IN_SET('".$chind."',industry)";
				}
			}
			$SQL .= " GROUP BY pId LIMIT $start,$limit";
			//echo $SQL;
			$rs = $this -> db -> query($SQL);			
			return $rs;
		}
    }	 
	
	
	/**
     * Get Pagination By Category
     *
     * @return string - pagination
     */
    public function getPagination($frmname="",$start="",$page="",$categoryId=""){		
		$total_record =  $this -> countAllProductByCat($categoryId);		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,RECORDPERPAGE);
        return $pagination;
    }
	
	 public function getPaginationCustom($frmname="",$start="",$page="",$limit='',$categoryId=""){		
		$total_record =  $this -> countAllProductByCat($categoryId);		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		if(isset($limit) && $limit>0 && $limit != RECORDPERPAGE)
		$recordperpage = $limit;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,$recordperpage);
        return $pagination;
    }
	
	/**
     * Get Pagination By Brand
     *
     * @return string - pagination
     */
    public function getPaginationBrnd($frmname="",$start="",$page="",$brandId=""){		
		$total_record =  $this -> countAllProductByBrnd($brandId);		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,RECORDPERPAGE);
        return $pagination;
    }
	 public function getPaginationByIndCustom($frmname="",$start="",$page="",$limit='',$brandId=""){		
		$total_record =  $this -> countAllProductByBrnd($brandId);		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		if(isset($limit) && $limit>0 && $limit != RECORDPERPAGE)
		$recordperpage = $limit;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,$recordperpage);
        return $pagination;
    }
	
	/**
     * Get Pagination By Industry
     *
     * @return string - pagination
     */
    public function getPaginationByInd($frmname="",$start="",$page="",$industryId="",$prodTypeId=""){		
		$total_record =  $this -> countAllProductByInd($industryId,$prodTypeId);		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,RECORDPERPAGE);
        return $pagination;
    }
	
	/**
     * Get Pagination 
     *
     * @return string - pagination
     */
    public function getSearchPagination($frmname="",$start="",$page=""){
		
		$total_record =  $this -> countAllSearchProduct();		
		$this -> paging = PagingClass::getInstance();
		$recordperpage = RECORDPERPAGE;
		$pagination =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,RECORDPERPAGE);
        return $pagination;
    }
	
	public function countAllSearchProduct()
	{
		/*$keyword = $this -> db -> cleanData($_REQUEST['keyword']);
		$kywrd = $this->db->Quote('%'.$keyword.'%');
		$industry = $this -> db -> cleanData($_REQUEST['industry']);
		$subind = $this -> db -> cleanData($_REQUEST['subind']);
		$prodtype = $this -> db -> cleanData($_REQUEST['prodtype']);*/
		if(isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != ''){
			$keyword = $this -> db -> cleanData($_REQUEST['keyword']);
			$kywrd = $this->db->Quote('%'.$keyword.'%');
		}
		
		if(isset($_REQUEST['industry']) && $_REQUEST['industry'] != ''){
			$industry = $this -> db -> cleanData($_REQUEST['industry']);
		}else{
			$industry = '';
		}
		
		if(isset($_REQUEST['subind']) && $_REQUEST['subind'] != ''){
			$subind = $this -> db -> cleanData($_REQUEST['subind']);
		}else{
			$subind = '';
		}
		
		if(isset($_REQUEST['prodtype']) && $_REQUEST['prodtype'] != '')
		{
			$prodtype = $this -> db -> cleanData($_REQUEST['prodtype']);
		}else{
			$prodtype = '';
		}
		
		$SQL = "SELECT * FROM product WHERE 1";
		if(isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != '')
		{
			$SQL .= " AND (pId = ".$this->db->Quote($keyword)." OR pname LIKE ".$kywrd." OR product_description LIKE ".$kywrd.")";
		}
		if(isset($_REQUEST['industry']) && $_REQUEST['industry'] != '')
		{
			$SQL .= " AND FIND_IN_SET('".$industry."',industry)";
		}
		if(isset($_REQUEST['subind']) && $_REQUEST['subind'] != '')
		{
			$SQL .= " OR FIND_IN_SET('".$subind."',industry)";
		}
		if(isset($_REQUEST['category']) && $_REQUEST['category'] != '')
		{
			$SQL .= " OR FIND_IN_SET('".$prodtype."',producttype)";
		}
		$SQL .= " GROUP BY pId ORDER BY pname";		
		//echo $SQL;
		$rs = $this -> db -> query($SQL);				
		$result =  count($rs);
        return $result;
	}
	
	/**
     * Get total product
     *
     * @return number - product total
     */
   public function countAllProduct(){
		$SQL = "SELECT * FROM product WHERE 1";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	public function countAllProductByCat($catId){
		$SQL = "SELECT * FROM product WHERE FIND_IN_SET(".$catId.",category)";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	public function countAllProductByBrnd($brndId){
		$SQL = "SELECT * FROM product WHERE FIND_IN_SET(".$brndId.",brands)";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	public function countAllProductByInd($indId,$ptypeId){
		$indId = $this -> db -> cleanData($indId);
		$ptypeId = $this -> db -> cleanData($ptypeId);
		$indObj = new IndustriesClass();
		$parentId = $indObj -> getParentId($indId);
		
		if($ptypeId != ''){
			$SQL = "SELECT * FROM product WHERE FIND_IN_SET(".$ptypeId.",producttype)";
			$results =  $this -> db -> countRows($SQL);
        	return $results;
		}else if($parentId != $indId)
		{
			$SQL = "SELECT * FROM product WHERE FIND_IN_SET(".$indId.",industry)";
			$results =  $this -> db -> countRows($SQL);
        	return $results;
		}else{
			$SQL = "SELECT * FROM product WHERE FIND_IN_SET(".$indId.",industry)";
			$childIndId = $indObj -> getChildIndustry($indId);			
			if(!empty($childIndId))
			{
				$childIndId = explode(",",$childIndId);
				foreach($childIndId as $chind)
				{
					$SQL .= " OR FIND_IN_SET('".$chind."',industry)";
				}
			}
			$SQL .= " GROUP BY pId";
			$rs = $this -> db -> countRows($SQL);			
			return $rs;
		}
		
		
		
		$SQL = "SELECT * FROM product WHERE FIND_IN_SET(".$catId.",category)";
        $results =  $this -> db -> countRows($SQL);
        return $results;
    }
	
	
	/**
     * Edit product
     *
     * @param int $productId - product id
     * @return string - error message
     */
    public function editProduct($productId=""){
		/*echo '<pre>';
		print_r($_REQUEST);*/		
		$msg = '';
		$ctstr = '';
		$indstr = '';
		$brandstr = '';
		$pdtypestr = '';
        $productId = $this -> db -> cleanData($productId);
		$pId = $this -> db -> cleanData($_REQUEST['pId']);
        $pname = $this -> db -> cleanData($_REQUEST['pname']);
		$sheet_size = $_REQUEST['sheet_size'];
		$items_per_each = $this -> db -> cleanData($_REQUEST['items_per_each']);
		$each_per_ship_unit = $this -> db -> cleanData($_REQUEST['each_per_ship_unit']);
		$each_dimension = $this -> db -> cleanData($_REQUEST['each_dimension']);
		$case_total_pcs = $this -> db -> cleanData($_REQUEST['case_total_pcs']);
		$case_dimension = $this -> db -> cleanData($_REQUEST['case_dimension']);
		$case_weight = $this -> db -> cleanData($_REQUEST['case_weight']);
		$pallet_unit_quantity = $this -> db -> cleanData($_REQUEST['pallet_unit_quantity']);
		$pallet_dimensions = $this -> db -> cleanData($_REQUEST['pallet_dimensions']);
		$product_description = $this -> db -> cleanData($_REQUEST['product_description']);
		$features_benefits = $this -> db -> cleanData($_REQUEST['features_benefits']);
		$series_brochure = $this -> db -> cleanData($_REQUEST['brochureId']);
		$MSDS = $this -> db -> cleanData($_REQUEST['msdsId']);
		$featured_product = $this -> db -> cleanData($_REQUEST['featured_product']);
		$related_products = '';
		if(isset($_REQUEST['related_products'])&& count($_REQUEST['related_products'])>0)
		$related_products = $this -> db -> cleanData(implode(',',$_REQUEST['related_products']));
		if(isset($_REQUEST['brands']) && !empty($_REQUEST['brands']))
		{
			$brands = $this -> db -> cleanDataArray($_REQUEST['brands']);
			if(!empty($brands))
			{
				foreach($brands as $brnd)	
				{
					$brandstr .= $brnd.",";
				}
				$brandstr = substr($brandstr,0,-1);
			}
		}
		if(isset($_REQUEST['category']) && !empty($_REQUEST['category']))
		{
			$category = $this -> db -> cleanDataArray($_REQUEST['category']);
			if(!empty($category))	
			{
				foreach($category as $ct)	
				{
					$ctstr .= $ct.",";
				}
				$ctstr = substr($ctstr,0,-1);
			}
		}
		if(isset($_REQUEST['industry']) && !empty($_REQUEST['industry']))
		{
			$industry = $this -> db -> cleanDataArray($_REQUEST['industry']);
			if(!empty($industry))
			{
				foreach($industry as $inds)	
				{
					$indstr .= $inds.",";
				}
				$indstr = substr($indstr,0,-1);
			}
		}
		if(isset($_REQUEST['prodtype']) && !empty($_REQUEST['prodtype']))
		{
			$prodtype = $this -> db -> cleanDataArray($_REQUEST['prodtype']);
			if(!empty($prodtype))
			{
				foreach($prodtype as $pdtype)	
				{
					$pdtypestr .= $pdtype.",";
				}
				$pdtypestr = substr($pdtypestr,0,-1);
			}
		}
		
		
		if($productId > 0)
		{
		  $rs = $this -> db -> query("UPDATE product SET pId = :pId,
		  												pname = :pname,
														sheet_size = :sheet_size,
														items_per_each = :items_per_each,
														each_per_ship_unit = :each_per_ship_unit,
														each_dimension = :each_dimension,
														case_total_pcs = :case_total_pcs,
														case_dimension = :case_dimension,
														case_weight = :case_weight,
														pallet_unit_quantity = :pallet_unit_quantity,
														pallet_dimensions = :pallet_dimensions,
														product_description = :product_description,
														features_benefits = :features_benefits,
														series_brochure = :series_brochure,
														MSDS = :MSDS,
														brands = :brands,
														category = :category,
														featured_product = :fp,
														related_products = :rp,
														industry = :industry,
														producttype = :producttype WHERE productId = :productId",array("pId"=>$pId,"pname"=>$pname,"sheet_size"=>$sheet_size,"items_per_each"=>$items_per_each,"each_per_ship_unit"=>$each_per_ship_unit,"each_dimension"=>$each_dimension,"case_total_pcs"=>$case_total_pcs,"case_dimension"=>$case_dimension,"case_weight"=>$case_weight,"pallet_unit_quantity"=>$pallet_unit_quantity,"pallet_dimensions"=>$pallet_dimensions,"product_description"=>$product_description,"features_benefits"=>$features_benefits,"series_brochure"=>$series_brochure,"MSDS"=>$MSDS,"brands"=>$brandstr,"category"=>$ctstr,"fp"=>$featured_product,"rp"=>$related_products,"industry"=>$indstr,"producttype"=>$pdtypestr,"productId"=>$productId));
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
			$product = $this -> db -> row("SELECT * FROM product WHERE pId = :pId",array("pId"=>$pId));
			if(count($product) && $product['productId'] > 0)
			{
				return 'Duplicate product id';
			}
			$rslt = $this -> db -> query("INSERT INTO product(pId,pname,sheet_size,items_per_each,each_per_ship_unit,	each_dimension,case_total_pcs,case_dimension,case_weight,pallet_unit_quantity,pallet_dimensions,product_description,		features_benefits,series_brochure,MSDS,brands,category,featured_product,related_products,industry,producttype,addedon) VALUES(:pId,:pname,:sheet_size,		:items_per_each,:each_per_ship_unit,:each_dimension,:case_total_pcs,:case_dimension,:case_weight,:pallet_unit_quantity,			:pallet_dimensions,:product_description,:features_benefits,:series_brochure,:MSDS,:brands,:category,:fp,:rp,:industry,:producttype,:addedon)",array("pId"=>$pId,"pname"=>$pname,"sheet_size"=>$sheet_size,"items_per_each"=>$items_per_each,"each_per_ship_unit"=>$each_per_ship_unit,"each_dimension"=>$each_dimension,"case_total_pcs"=>$case_total_pcs,"case_dimension"=>$case_dimension,"case_weight"=>$case_weight,"pallet_unit_quantity"=>$pallet_unit_quantity,"pallet_dimensions"=>$pallet_dimensions,"product_description"=>$product_description,"features_benefits"=>$features_benefits,"series_brochure"=>$series_brochure,"MSDS"=>$MSDS,"brands"=>$brandstr,"category"=>$ctstr,"fp"=>$featured_product,"rp"=>$related_products,"industry"=>$indstr,"producttype"=>$pdtypestr,"addedon"=>date("Y-m-d h:i:s A")));
			$productId = $this -> db -> lastInsertId();
			if($rslt == 0)			
			{
				$msg = "Failes to save information";
			}else{
				$msg = "Information saved successfully.";
			}
			
		}
		//Image upload function
		if(($_FILES['product_image']['name'])!='')
		{
			$fileuploadresp = $this->uploadProductImg($_FILES['product_image'],$productId);
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		
		if(($_FILES['barcodeimage']['name'])!='')
		{
			$fileuploadresp = $this->uploadProductBarcodeImg($_FILES['barcodeimage'],$productId);
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
	private function uploadProductImg($file,$pId){
		
		$fileParts  = pathinfo($file['name']);
		$fileParts = str_replace(' ', '_',$fileParts);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $pId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = '../uploads/Legacy/Product/'.$imageloc;
		$targetthumb = '../uploads/Legacy/Product/thumb/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Product/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
					$thumbfilename = ROOTURL.'uploads/Legacy/Product/thumb/'.$imageloc;
					if (@file_exists($thumbfilename)) {
						@unlink($thumbfilename);
					}
				
				
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$resizeObj = new ResizeClass($target);
     				$resizeObj -> resizeImage(640, 380, 'portrait');
     				$resizeObj -> saveImage($targetthumb, 100);
					$this -> db -> query("UPDATE product SET product_image = '".$imageloc."' WHERE productId = '".$pId."'");				
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
     * Upload Product Barcode Image
     *
     * @param string - file
	 */
	private function uploadProductBarcodeImg($file,$pId){
		
		$fileParts  = pathinfo($file['name']);
		$fileParts = str_replace(' ', '_',$fileParts);
		$file_type = strtolower($fileParts['extension']);		
		$imageloc = $pId.'_'.$fileParts['filename'].'.'.$file_type;
		$target = '../uploads/Legacy/Product/Barcode/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){									
					$filename = ROOTURL.'uploads/Legacy/Product/Barcode/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
				
				
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> db -> query("UPDATE product SET barcodeimage = '".$imageloc."' WHERE productId = '".$pId."'");				
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
     * @param string - product id
	 */
	public function deleteProduct($productId){
		$productId = $this -> db -> cleanData($productId);

		$rs = $this -> db -> query("DELETE FROM product WHERE productId = :pid",array("pid"=>$productId));
		  if($rs == 0)
		  {
		  	return 0;
		  }
		  else
		  {
			return 1;
		  }
	}	
	
	public function getAllSearchProduct($start='',$limit='')
	{
		if(isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != ''){
			$keyword = $this -> db -> cleanData($_REQUEST['keyword']);
			$kywrd = $this->db->Quote('%'.$keyword.'%');
		}
		
		if(isset($_REQUEST['industry']) && $_REQUEST['industry'] != ''){
			$industry = $this -> db -> cleanData($_REQUEST['industry']);
		}else{
			$industry = '';
		}
		
		if(isset($_REQUEST['subind']) && $_REQUEST['subind'] != ''){
			$subind = $this -> db -> cleanData($_REQUEST['subind']);
		}else{
			$subind = '';
		}
		
		if(isset($_REQUEST['prodtype']) && $_REQUEST['prodtype'] != '')
		{
			$prodtype = $this -> db -> cleanData($_REQUEST['prodtype']);
		}else{
			$prodtype = '';
		}
		
		$SQL = "SELECT * FROM product WHERE 1";
		if(isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != '')
		{
			$SQL .= " AND (pId = ".$this->db->Quote($keyword)." OR pname LIKE ".$kywrd." OR product_description LIKE ".$kywrd.")";
		}
		if(isset($_REQUEST['industry']) && $_REQUEST['industry'] != '')
		{
			$SQL .= " AND FIND_IN_SET('".$industry."',industry)";
		}
		if(isset($_REQUEST['subind']) && $_REQUEST['subind'] != '')
		{
			$SQL .= " OR FIND_IN_SET('".$subind."',industry)";
		}
		if(isset($_REQUEST['category']) && $_REQUEST['category'] != '')
		{
			$SQL .= " OR FIND_IN_SET('".$prodtype."',producttype)";
		}
		$SQL .= " GROUP BY pId ORDER BY pname LIMIT $start,$limit";
		
		//echo $SQL.'<br>';
		$rs = $this -> db -> query($SQL);
		
		return $rs;
	}
	
	public function sendRequestMail(){
		$category = "";
		$product = "";
		$name = "";
		$cname = "";
		$addr = "";
		$email = "";
		$contact = "";
		
		if(isset($_POST['name'])&&($_POST['name']!=''))
		{
        	$name = $this -> db -> cleanData($_POST['name']);
		}
		if(isset($_POST['cname'])&&($_POST['cname']!=''))
		{
        	$cname = $this -> db -> cleanData($_POST['cname']);
		}
		if(isset($_POST['addr'])&&($_POST['addr']!=''))
		{
        	$addr = $this -> db -> cleanData($_POST['addr']);
		}
		if(isset($_POST['email'])&&($_POST['email']!=''))
		{
        	$email = $this -> db -> cleanData($_POST['email']);
		}
		if(isset($_POST['contact'])&&($_POST['contact']!=''))
		{
        	$contact = $this -> db -> cleanData($_POST['contact']);
		} 
		
		$to = ADMINMAIL;		
		$subject = 'New Request Sample';
		$message = "<p>Dear Admin,</p>";
		$message .= "<p>New user requested for a sample on your site. Here are the details information!</p>";
		$message .= "<p>------------------------------------------</p>";
		
		
		$message .= "<p>Category or Industry: ".$_POST['category']."</p>";
		$message .= "<p>Product: ".$_POST['product']."</p>";
		$message .= "<p>Contact Name: ".$name."</p>";
		$message .= "<p>Company Name: ".$cname."</p>";
		$message .= "<p>Address: ".$addr."</p>";
		$message .= "<p>Email: ".$email."</p>";
		$message .= "<p>Phone No: ".$contact."</p>";
		$message .= "<p>------------------------------------------</p>";
		$message .= "<p>Thanks,</p>";
		$from = $email;		
		$contactObj = new ContactClass();
		$mail = $contactObj -> sendSimpleEmail($to,$subject,$message,$from);
		if($mail){
			return 'yes';
		}
		else{
			return 'no';
		}
		
	}
	
	public function AddtoCompare($productId){
		$productId = $this -> db -> cleanData($productId);	
		
		if(isset($_SESSION['compare_products'])&& !empty($_SESSION['compare_products']))
			$_SESSION['compare_products'];
		else
			$_SESSION['compare_products'] = array();		
			
		if(in_array($productId,$_SESSION['compare_products'])){
			    $key = array_search($productId, $_SESSION['compare_products']);
				unset($_SESSION['compare_products'][$key]);
				$_SESSION["compare_products"] = array_values($_SESSION["compare_products"]);
				$msg = 'This product removed from comparelist.';			
		}		
		else{
			if(count($_SESSION['compare_products'])== 4)
				$msg = "Can't add more than 4 items in comparelist.";
			else{		
				$_SESSION['compare_products'][] = $productId;
				$msg = 'This product added to comparelist.';
			}
		}
		return $msg;
	}
	
	public function GetCompare($productId){
		$productId = $this -> db -> cleanData($productId);	
		
		if(isset($_SESSION['compare_products'])&& !empty($_SESSION['compare_products']))
			$_SESSION['compare_products'];
		else
			$_SESSION['compare_products'] = array();		
			
		if(in_array($productId,$_SESSION['compare_products']))
			return true;
		else
			return false;		
		
	}
	
	public function GetAllCompare(){				
		if(isset($_SESSION['compare_products'])&& !empty($_SESSION['compare_products']))
			return 	$_SESSION['compare_products'];
		else
			return array();		
		
	}
	
	public function DeleteCompare(){				
		if(isset($_REQUEST['productids'])&& count($_REQUEST['productids'])>0){
			foreach($_REQUEST['productids'] as $productId){		
				if(in_array($productId,$_SESSION['compare_products'])){
					$key = array_search($productId, $_SESSION['compare_products']);
					unset($_SESSION['compare_products'][$key]);								
				}
			}
			$_SESSION["compare_products"] = array_values($_SESSION["compare_products"]);
			return 'Product removed from comparelist.';
		}
		else
			return 'No product selected.';		
		
	}
}	
?>