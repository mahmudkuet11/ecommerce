<?php include 'header.php';  ?>
<?php 
if(isset($_SESSION['user_id'])){
	header('Location:index.php');
	die();
}
?>
        <div id="content">
        	<h2>Create New Account</h2>
			
            <div class="col col_13">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == 'pass'){
						echo '<p style="color:red">your password didn\'t match</p>';
					}
					if($_GET['error'] == 'username'){
						echo '<p style="color:red">username is already registered</p>';
					}
				}
			?>
            <p>Please fill up all fields to complete registration</p>
            <div id="contact_form">
               <form id="register_form" method="post" name="register_form" action="core/register_process.php" onsubmit="return (validate_register_form());" >
                    
                    <label for="author">Username:</label> <input type="text" id="username" name="username" class="required input_field" onkeyup="checkUsername();" />
					<label for="author" id="username_error"></label>
                    <div class="cleaner h10"></div>
					
					<label for="author">Email:</label> <input type="email" id="email" name="email" class="required input_field" onkeyup="checkEmail();" />
					<label for="author" id="email_error"></label>
                    <div class="cleaner h10"></div>
						
                    <label for="author">Password:</label> <input type="password" id="password" name="password" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<label for="author">Confirm Password:</label> <input type="password" id="re-password" name="confirm_password" class="required input_field" onkeyup="checkPass();" />
					<label for="author" id="pass_error"></label>
                    <div class="cleaner h10"></div>
					
					<input type="submit" value="Create Account" id="submit" name="submit" class="submit_btn float_l" />
					
                </form>
            </div>
		</div>
        <?php include 'location.php' ?>
        
            
        </div> <!-- END of content -->
 <?php include 'footer.php';  ?>