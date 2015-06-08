<?php
ob_start();
include 'core/functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Commerce</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/custom/ajax.js"></script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>


<script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',		
						itemsVisible: 5,
						elemsSlide: 2,
						duration: 200,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 171,
						showControls:1});
		},
		
	});

	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
</script>

</head>

<body id="home">

<div id="templatemo_wrapper">
	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="">E-Commerce</a></h1></div>
        
        <div id="header_right">
            
            <div class="cleaner"></div>
            <div id="templatemo_search">
                <form action="products.php" method="get">
                  <input type="text" value="Search" name="search" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
         </div> <!-- END -->
    </div> <!-- END of header -->
    
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="index.php" class="selected">Home</a></li>
            <li><a href="products.php">Products</a>
                <ul>
					<?php
					
						$sql = "SELECT * FROM category";
						$result = mysql_query($sql);
						while($row = mysql_fetch_array($result)){
							echo '<li><a href="products.php?category='.$row['category'].'">'.$row['category'].'</a></li>';
						}
					
					?>
              </ul>
            </li>
            <li><a href="faqs.php">FAQs</a></li>
            <li><a href="shoppingcart.php">Cart</a></li>
            <?php
				if(isset($_SESSION['user_id'])){
			?>
			<li><a href="#">Account</a>
				<ul>
					<li><a href="">hi, <?php
							echo username_from_user_id($_SESSION['user_id']);
					?>
					</a></li>
					
					<?php
						if(is_admin($_SESSION['user_id'])){
							echo '<li><a href="addproduct.php">Add new product</a></li>';
							echo '<li><a href="order.php">View Order</a></li>';
						}
					?>
					
					<li><a href="user_order.php">My Order</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
			<?php }else{ ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			<?php  }

			?>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_middle">
    	<img src="images/templatemo_image_01.png" alt="Image 01" />
    	<h1>Introducing Web Store</h1>
        <p></p>
        <a href="products.php" class="buy_now">Browse All Products</a>
    </div> <!-- END of middle -->
    
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	<div id="product_slider">
    		<div id="SlideItMoo_outer">	
                <div id="SlideItMoo_inner">			
                    <div id="SlideItMoo_items">
						<?php
							$sql = "SELECT * FROM products WHERE featured='yes'";
							$res = mysql_query($sql);
							while($row = mysql_fetch_array($res)){ ?>
								<div class="SlideItMoo_element">
									<a  href="productdetail.php?product_id=<?php echo $row['product_id'] ?>">
									<img width="160" height="120" src="<?php echo $row['image_link'] ?>" alt="<?php  echo $row['product_name']  ?>" /></a>
								</div>
							<?php }
						
						?>
                        
                    </div>			
                </div>
            </div>
            <div class="cleaner"></div>
        </div>
        
        <div id="sidebar">
            <h3>Categories</h3>
            <ul class="sidebar_menu">
					<?php
					
						$sql = "SELECT * FROM category";
						$result = mysql_query($sql);
						while($row = mysql_fetch_array($result)){
							echo '<li><a href="products.php?category='.$row['category'].'">'.$row['category'].'</a></li>';
						}
					
					?>
			</ul>
            <h3><a class="sidebar_title" href="" title=""  target="_blank">Newsletter</a></h3>
            <p>we will inform you when new item will come</p>
            <div id="newsletter">
                <form action="#" method="get">
                  <input type="text" value="Subscribe" name="email_newsletter" id="email_newsletter" title="email_newsletter" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="subscribe" value="Subscribe" alt="Subscribe" id="subscribebtn" title="Subscribe" class="subscribebtn"  />
                </form>
                <div class="cleaner"></div>
            </div>
        </div> <!-- END of sidebar -->