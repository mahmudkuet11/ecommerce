<?php
include 'header.php';
if(!is_admin($_SESSION['user_id'])){
	header("Location:index.php");
	die();
}
?>
        <div id="content">
        	<h2>Add new Category</h2>
			
            <div class="col col_13">
			
            <p>please complete all fields.</p>
            <div id="contact_form">
               <form method="post" name="contact" action="core/add_new_category.php">
                    
                    <label for="author">New category name:</label> <input type="text" id="author" name="cat_name" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<input type="submit" value="Add Category" id="submit" name="submit" class="submit_btn float_l" />
					
                </form>
            </div>
		</div>
        <?php include 'location.php' ?>
        
            
        </div> <!-- END of content -->
 <?php include 'footer.php';  ?>