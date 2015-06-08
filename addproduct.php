<?php
ob_start();
 include 'header.php'; 
if(!is_admin($_SESSION['user_id'])){
	header('Location:index.php');
	die();
}

 ?>
        <div id="content">
        	<h2>Add new Product</h2>
			
            <div class="col col_13">
			<?php
				if(isset($_GET['add']) && $_GET['add'] == 'yes'){
					echo '<p style="color:green">your product has been added successfuly</p>';
				}
			?>
			
            <p>please complete all fields.</p>
            <div id="contact_form">
               <form name="add_product_form" method="post" name="contact" action="core/add_product_process.php" enctype="multipart/form-data" onsubmit="return (check_add_product_form());">
                    
					<label for="author">Category:</label> 
					<select name="category" id="" class="required input_field">
						<?php
						
							$sql = "SELECT * FROM category";
							$result = mysql_query($sql);
							while($row = mysql_fetch_array($result)){
								echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
							}
						
						?>
					</select>
					<a href="addcategory.php">Add new</a>
                    <div class="cleaner h10"></div>
					
                    <label for="author">Product name:</label> <input type="text" id="author" name="product_name" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<label for="author">Product description:</label> <textarea id="author" name="product_description" class="required input_field" ></textarea>
                    <div class="cleaner h10"></div>
					
					<label for="author">Price:</label> <input type="number" id="author" name="price" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<label for="author">Availability:</label> <input type="number" id="author" name="availability" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<label for="author">Model:</label> <input type="text" id="author" name="model" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<label for="author">Manufacturer:</label> <input type="text" id="author" name="manufacturer" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					
					<label for="author">Upload an image:</label> <input type="file" id="author" name="image_file" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<input type="checkbox" name="featured" value="yes" />Featured
					<div class="cleaner h10"></div>
					
					<input type="submit" value="Add Product" id="submit" name="submit" class="submit_btn float_l" />
					
                </form>
            </div>
		</div>
        <?php include 'location.php' ?>
        
            
        </div> <!-- END of content -->
 <?php include 'footer.php';  ?>