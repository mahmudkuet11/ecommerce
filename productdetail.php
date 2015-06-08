<?php
include 'header.php';

if(isset($_GET['product_id'])){
	$sql = "SELECT * FROM products WHERE product_id=".$_GET['product_id'];
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	//$id = $_GET['product_id'];
	$view = $row['view'] + 1;
	mysql_query("UPDATE products SET view='$view' WHERE product_id='". $row['product_id'] ."'");
}else{
	header('Location:index.php');
	die();
}

?>
        <div id="content">
        	<h2>Product Details</h2>
            <div class="col col_13">
        	<a  rel="lightbox[portfolio]" href="<?php echo $row['image_link']; ?>"title=""><img width="300" height="200" src="<?php echo $row['image_link']; ?>" alt="<?php echo $row['product_name'] ?>" /></a>
            </div>
            <div class="col col_13 no_margin_right">
                <table>
					<tr>
                        <td height="30" width="160">Name:</td>
                        <td><?php echo $row['product_name'] ?></td>
                    </tr>
                    <tr>
                        <td height="30" width="160">Price:</td>
                        <td><?php echo $row['price'] ?></td>
                    </tr>
                    <tr>
                        <td height="30">Availability:</td>
                        <td><?php echo $row['availability'] ?></td>
                    </tr>
                    <tr>
                        <td height="30">Model:</td>
                        <td><?php echo $row['model'] ?></td>
                    </tr>
                    <tr>
                        <td height="30">Manufacturer:</td>
                        <td><?php echo $row['manufacturer'] ?></td>
                    </tr>
					<tr>
                        <td height="30" width="160">Category:</td>
                        <td><?php echo $row['category'] ?></td>
                    </tr>
                    <tr><td height="30">Quantity</td><td><input type="text" id="quantity" value="1" style="width: 20px; text-align: right" onKeyUp="check_quantity(this.value,'<?php echo $_GET['product_id'] ?>');" /></td></tr>
					<tr id="response">
						<td></td>
						<?php
							if(!is_added_to_cart($_GET['product_id'])){
						?>
						<td><a style="cursor:pointer" id="<?php echo $_GET['product_id']; ?>" class="add_to_cart" onClick="addtocart(this.id);">Add to Cart</a></td>
						<?php }else{ ?>
						<td><a style="cursor:pointer" id="<?php echo $_GET['product_id']; ?>" class="add_to_cart">Added to Cart</a></td>
						<?php } ?>
						
					</tr>
					<?php
						if(isset($_SESSION['user_id']) && is_admin($_SESSION['user_id'])){ ?>
							<tr><td><a href="core/delete_product.php?id=<?php echo $_GET['product_id'] ?>">delete this product</a></td></tr>
						<?php }
					?>
					
					</table>
					<div class="cleaner h20"></div>
					
					
					
				<div class="checkout"><a href="shoppingcart.php" class="more">Go To Cart</a></div>
			</div>
            <div class="cleaner h30"></div>
            
            <h5><strong>Product Description</strong></h5>
            <p><?php echo $row['description'] ?></p>	
            
            <div class="cleaner h50"></div>
            
            <h4>Related Products</h4>		
			<?php
				$cat = $row['category'];
				$query = "SELECT * FROM products WHERE category='$cat' LIMIT 0,3";
				$res = mysql_query($query);
				while($rows = mysql_fetch_array($res)){
			?>
        	<div class="col col_14 product_gallery">
            	
				<?php echo '<a href="productdetail.php?product_id='.$rows['product_id'].'">'; ?>
				<img width="200" height="150" src="<?php echo $rows['image_link'] ?>" alt="<?php echo $rows['product_name'] ?>" /></a>
                <h3><?php echo $rows['product_name'] ?></h3>
                <p class="product_price">BDT <?php echo $rows['price'] ?></p>
            </div>    
			<?php } ?>
            <a href="products.php?category=<?php echo $cat; ?>" class="more float_r">View all</a>
            
            <div class="cleaner"></div>
        </div> <!-- END of content -->
 <?php include 'footer.php';  ?>