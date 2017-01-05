<?php
class PagingClass
{

	private static $page_instance;
	public $frmName;
	public $adjacents;
	public $total_record;
	public $limit;
	public $prev;
	public $next;
	public $lastpage;
	public $lpm1;
	public $page;
	public $pagination;
	
	/**
     * Create pagingClass object
     *
     * @return object $page_instance - Paging Object
     */
    public static function getInstance(){ 
        // If instance exists then return it, else create new instance and return it
        if (!self::$page_instance)
        {
            self::$page_instance = new PagingClass();
        }
        return self::$page_instance;
    }
	/**
     * Get Pagination with numbers, previous, next item
     *
     * @return array - string with pagination
     */
    public function pagingGeneral($frmName,$start,$page,$total_record,$limit){
		
		$this->frmName = $frmName;
		$this->start = $start;
		$this->page = $page;
		$this->total_record = $total_record;
		$this->limit = $limit;
       ?>
			<script language="JavaScript">
				function frm_sub(page)
				{
					<!--document.<?php //echo $this->frmName;?>.action="<?php //echo $_SERVER['PHP_SELF'];?>";-->
					document.<?php echo $this->frmName;?>.page.value = page;
					document.<?php echo $this->frmName;?>.submit();
				}
			</script>
			<?php
				$this->adjacents = 3;
				//$limit = 5;
				$this->lastpage = ceil($this->total_record/$this->limit);
				$this->prev = $this->page - 1;
				$this->next = $this->page + 1;
				$this->lpm1 = $this->lastpage - 1;
				$pagination = "";
				if($this->lastpage > 1)
				{	
					$pagination .= "<div class=\"pagination\">";
					//previous button
					if ($this->page > 1) 
						$pagination.= "<a href=\"javascript:frm_sub($this->prev)\" class=\"subhead1\"> <i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> </a>";
					else
						$pagination.= "<span class=\"disabled\"> <i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> </span>";	
					
					//pages	
					if ($this->lastpage < 7 + ($this->adjacents * 2))	//not enough pages to bother breaking it up
					{	
						for ($this->counter = 1; $this->counter <= $this->lastpage; $this->counter++)
						{
							if ($this->counter == $this->page)
								$pagination.= "<span class=\"current\">$this->counter</span>";
							else
								$pagination.= "<a href=\"javascript:frm_sub($this->counter)\" class=\"subhead1\">$this->counter</a>";					
						}
					}
					elseif($this->lastpage > 5 + ($this->adjacents * 2))	//enough pages to hide some
					{
						//close to beginning; only hide later pages
						if($this->page < 1 + ($this->adjacents * 2))		
						{
							for ($this->counter = 1; $this->counter < 4 + ($this->adjacents * 2); $this->counter++)
							{
								if ($this->counter == $this->page)
									$pagination.= "<span class=\"current\">$this->counter</span>";
								else
									$pagination.= "<a href=\"javascript:frm_sub($this->counter)\" class=\"subhead1\">$this->counter</a>";					
							}
							$pagination.= "<span class=\"whitetext\">...</span>";
							$pagination.= "<a href=\"javascript:frm_sub($this->lpm1)\" class=\"subhead1\">$this->lpm1</a>";
							$pagination.= "<a href=\"javascript:frm_sub($this->lastpage)\" class=\"subhead1\">$this->lastpage</a>";		
						}
						//in middle; hide some front and some back
						elseif($this->lastpage - ($this->adjacents * 2) > $this->page && $this->page > ($this->adjacents * 2))
						{
							$pagination.= "<a href=\"javascript:frm_sub(1)\" class=\"subhead1\">1</a>";
							$pagination.= "<a href=\"javascript:frm_sub(2)\" class=\"subhead1\">2</a>";
							$pagination.= "<span class=\"whitetext\">...</span>";
							for ($this->counter = $this->page - $this->adjacents; $this->counter <= $this->page + $this->adjacents; $this->counter++)
							{
								if ($this->counter == $this->page)
									$pagination.= "<span class=\"current\">$this->counter</span>";
								else
									$pagination.= "<a href=\"javascript:frm_sub($this->counter)\" class=\"subhead1\">$this->counter</a>";					
							}
							$pagination.= "<span class=\"whitetext\">...</span>";
							$pagination.= "<a href=\"javascript:frm_sub($this->lpm1)\" class=\"subhead1\">$this->lpm1</a>";
							$pagination.= "<a href=\"javascript:frm_sub($this->lastpage)\" class=\"subhead1\">$this->lastpage</a>";		
						}
						//close to end; only hide early pages
						else
						{
							$pagination.= "<a href=\"javascript:frm_sub(1)\" class=\"subhead1\">1</a>";
							$pagination.= "<a href=\"javascript:frm_sub(2)\" class=\"subhead1\">2</a>";
							$pagination.= "<span class=\"whitetext\">...</span>";
							for ($this->counter = $this->lastpage - (2 + ($this->adjacents * 2)); $this->counter <= $this->lastpage; $this->counter++)
							{
								if ($this->counter == $this->page)
									$pagination.= "<span class=\"current\">$this->counter</span>";
								else
									$pagination.= "<a href=\"javascript:frm_sub($this->counter)\" class=\"subhead1\">$this->counter</a>";					
							}
						}
					}
					
					//next button
					if ($this->page < $this->counter - 1) 
						$pagination.= "<a href=\"javascript:frm_sub($this->next)\" class=\"subhead1\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a>";
					else
						$pagination.= "<span class=\"disabled\"> <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></span>";
					$pagination.= "</div>\n";		
				}
				return $pagination;
    }
	
	/*
	* Get pagination with previous and next
	*
	* return pagination string
	*/
	public function pagingPrevNextSurvey($frmName,$start,$page,$total_record,$limit){
		
		$this->frmName = $frmName;
		$this->start = $start;
		$this->page = $page;
		$this->total_record = $total_record;
		$this->limit = $limit;
       ?>
			<script language="JavaScript">
				function frm_sub(page)
				{
					document.<?php echo $this->frmName;?>.action="<?php echo $_SERVER['PHP_SELF'];?>";
					document.<?php echo $this->frmName;?>.page.value = page;
					document.<?php echo $this->frmName;?>.submit();
				}
			</script>
			<?php
				$this->adjacents = 3;
				//$limit = 5;
				$this->lastpage = ceil($this->total_record/$this->limit);
				$this->prev = $this->page - 1;
				$this->next = $this->page + 1;
				$this->lpm1 = $this->lastpage - 1;
				$pagination = '<div style="float:right;width:50px;">';
				if($this->lastpage > 1)
				{	
					
					//next button
					if ($this->page <= $this->lastpage) 
					{
						$pagination.= "<a href=\"javascript:frm_sub($this->next)\" > &gt;</a>";
					}
					else
					{
						$pagination.= "";
					}
					$pagination.= '</div><div style="float:right;width:50px;">';
					//previous button
					if ($this->page > 1) 
					{
						$pagination.= "<a href=\"javascript:frm_sub($this->prev)\" >&lt; Prev</a>";
					}
					else
					{
						$pagination.= "Prev";
					}
		
					
				}
				$pagination.= '</div>';
				return $pagination;
    }
}
?>