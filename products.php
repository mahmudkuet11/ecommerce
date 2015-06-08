<?php include 'header.php';
$sql = "";
if(isset($_GET['category'])){
	$cat = $_GET['category'];
	$sql = "SELECT * FROM products WHERE category='$cat' ORDER BY product_id DESC LIMIT 0,8";
}else{
	$sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 0,8";
}
if(isset($_GET['search'])){
	$search = $_GET['search'];
	$sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR model LIKE '%$search%' OR description LIKE '%$search%' OR manufacturer LIKE '%$search%' OR category LIKE '%$search%' OR price LIKE '%$search%'";
}


  ?>
        
        <div id="content">
			<?php 
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){ ?>
					<div class="col col_14 product_gallery">
						<a href="productdetail.php?product_id=<?php echo $row['product_id']; ?>"><img width="200" height="150" src="<?php echo $row['image_link'] ?>" alt="Product 01" /></a>
						<h3><?php echo $row['product_name'] ?></h3>
						<p class="product_price">BDT <?php echo $row['price'] ?></p>
					</div> 
				<?php }
			?>        	
        </div> <!-- END of content -->
		
       <?php include 'footer.php';  ?>