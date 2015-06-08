<?php
include 'header.php';
if(!isset($_SESSION['user_id'])){
	header('Location:login.php');
	die();
}
?>
        <div id="content" class="faq">
        	<h2>Orders</h2>
			<?php
				$user = $_SESSION['user_id'];
				$sql = "SELECT * FROM orders WHERE user_id='$user'";
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){ ?>
					<div class="single_order">
						<h3>Order ID: <?php echo $row['order_id']; ?></h3>
						<p>Order status: <?php echo $row['order_status']; ?><br/>
						Total amount: <?php echo $row['total_price']; ?></p>
					</div>
				<?php }
			?>
        </div> <!-- END of content -->
		
		
		
		
 <?php include 'footer.php';  ?>