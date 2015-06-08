<?php include 'header.php';  ?>
<?php
if(isset($_SESSION['user_id'])){
	header('Location:index.php');
	die();
}
?>
        <div id="content">
        	<h2>Login</h2>
			
            <div class="col col_13">
			<?php
				if(isset($_GET['login_error']) && $_GET['login_error'] == 'yes'){
			?>
				<p id="login_error" style="color:red">your username and password didn't match</p>
			<?php
				}
			?>
            <p>Please enter your username/Email and Password</p>
            <div id="contact_form">
               <form method="post" name="login_form" action="core/login_process.php" onsubmit="return (validate_login_form());" >
                    
                    <label for="author">Username/Email:</label> <input type="text" id="author" name="username" class="required input_field" />
                    <div class="cleaner h10"></div>
						
                    <label for="author">Password:</label> <input type="password" id="author" name="password" class="required input_field" />
                    <div class="cleaner h10"></div>
					
					<input type="checkbox" name="remember" />keep me logged in
					<div class="cleaner h10"></div>
					
					<input type="submit" value="Login" id="submit" name="submit" class="submit_btn float_l" />
					
                </form>
            </div>
		</div>
        <?php include 'location.php' ?>
        
            
        </div> <!-- END of content -->
 <?php include 'footer.php';  ?>