<div class="col-sm-4 col-md-3 sidebar">
<?php if(isset($pagename) && $pagename == 'compare'){?>
<?php }else if(isset($pagename) && $pagename == 'news'){?>
<?php }else{?>
  <div class="sidebar-search-form">
    <form class="search-form" method="get" action="">
      <input type="text" class="search-field" name="s" placeholder="Filter by Keyword">
    </form>
    <a class="search-button" href="#"><i class="fa fa-search"></i></a>
     </div>
     
  <div class="sidebar-block collapsible">
    <h3 class="block-heading">PRODUCT TYPE 1</h3>
    <ul>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 1</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 2</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 3</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 4</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 5</label>
        </div>
      </li>
    </ul>
  </div>
  <div class="sidebar-block collapsible collapsed">
    <h3 class="block-heading">Product Type 2</h3>
    <ul>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 1</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 2</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 3</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 4</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 5</label>
        </div>
      </li>
    </ul>
  </div>
  <div class="sidebar-block collapsible collapsed">
    <h3 class="block-heading">Product Type 3</h3>
    <ul>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 1</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 2</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 3</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 4</label>
        </div>
      </li>
      <li>
        <div class="checkbox">
          <label>
            <input type="checkbox">
            Filter 5</label>
        </div>
      </li>
    </ul>
  </div>
  <?php } ?>
  <!--<div class="sidebar-block collapsible">
    <h3 class="block-heading">what's new</h3>
    <ul class="ad_sidebar">
      <li> <?php echo str_replace("../",SITEURL,$siteInfo['what_new_box']);?> <a href="<?php echo SITEURL; ?>whatsnew.php"><span>More ></span></a> </li>
    </ul>
  </div>-->
  <div class="sidebar-block collapsible">
    <h3 class="block-heading">PRIVATE LABEL</h3>
    <ul class="ad_sidebar">
      <li class="sidebar_last"> <img width="81" height="74" alt="" src="<?php echo SITEURL; ?>images/yourbrand_box.jpg">
        <p>Let Legacy design a program that sells your company as much as it sells your product.</p>
        <a href="<?php echo SITEURL; ?>privateLabel.php"><span>More &gt;</span></a> </li>
    </ul>
  </div>
  <hr />
</div>
