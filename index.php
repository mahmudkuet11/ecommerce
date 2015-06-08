<?php include 'header.php';  ?>
        <div id="content">
		
        	<h2>Recently Added</h2>
			<?php
				
				$sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 0,3";
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){
			?>
        	<div class="col col_14 product_gallery">
            	<a href="productdetail.php?product_id=<?php echo $row['product_id']; ?>"><img width="200" height="150" src="<?php echo $row['image_link'] ?>" alt="Product 01" /></a>
                <h3><?php echo $row['product_name'] ?></h3>
                <p class="product_price">BDT <?php echo $row['price'] ?></p>
            </div> 
			<?php } ?>
            <a href="products.php" class="more float_r">View all</a>
			<div class="cleaner h50"></div>
			
			<h2>Top sold</h2>
			<?php
				
				$sql = "SELECT * FROM products ORDER BY sell DESC LIMIT 0,3";
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){
			?>
        	<div class="col col_14 product_gallery">
            	<a href="productdetail.php?product_id=<?php echo $row['product_id']; ?>"><img width="200" height="150" src="<?php echo $row['image_link'] ?>" alt="Product 01" /></a>
                <h3><?php echo $row['product_name'] ?></h3>
                <p class="product_price">BDT <?php echo $row['price'] ?></p>
            </div>        	
            <?php } ?>
            <a href="products.php" class="more float_r">View all</a>
			<div class="cleaner h50"></div>
			
			<h2>Top Viewed</h2>
        	<?php
				
				$sql = "SELECT * FROM products ORDER BY view DESC LIMIT 0,3";
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){
			?>
        	<div class="col col_14 product_gallery">
            	<a href="productdetail.php?product_id=<?php echo $row['product_id']; ?>"><img width="200" height="150" src="<?php echo $row['image_link'] ?>" alt="Product 01" /></a>
                <h3><?php echo $row['product_name'] ?></h3>
                <p class="product_price">BDT <?php echo $row['price'] ?></p>
            </div>        	
            <?php } ?>
            <a href="products.php" class="more float_r">View all</a>
			<div class="cleaner h50"></div>
       
        </div> <!-- END of content -->
<?php include 'footer.php';  ?>