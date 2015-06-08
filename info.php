<?php include 'header.php';  ?>
<?php
if(!isset($_SESSION['user_id'])){
	header('Location:login.php');
	die();
}
?>
        <div id="content" class="faq">
			<?php
			if($_GET['msg'] == 'suc'){
			?>
        	<h2 style="color:green">Success !!!!</h2>
            <h3>Your Order is received</h3>
            <p>You'll  receive an email confirming that your order has been received. YOU MAY BE GIVEN A CALL TO VERIFY AND COMPLETE THE ORDER. Thanks for being with us</p>
			<?php }
				if($_GET['msg'] == 'error'){
			?>
			<h2 style="color:red">Error !!!</h2>
			<h3>Something is wrong. please try again</h3>
			<?php } ?>
        </div> <!-- END of content -->
 <?php include 'footer.php';  ?>