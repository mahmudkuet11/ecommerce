<?php
include 'header.php';
if(!is_admin($_SESSION['user_id'])){
	header("Location:index.php");
	die();
}
?>
        <div id="content" class="faq">
        	<h2>Orders</h2>
			<?php
				$sql = "SELECT * FROM orders WHERE order_status='pending' OR order_status='received'";
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){ ?>
					<div class="single_order">
						<h3>Order ID: <?php echo $row['order_id']; ?></h3>
						<div class="order_details">
							<?php
								$order_id = $row['order_id'];
								if(!is_received($row['order_id']) && !is_completed($row['order_id']))
									echo '<span id="receive_'.$order_id.'"><input id="'.$order_id.'" type="button" value="Receive Order" class="order_btn" title="click to receive this order" onClick="receive_order(this.id)" /></span>';
								if(!is_completed($row['order_id']))
									echo '&nbsp;<span id="complete_'.$order_id.'"><input id="'.$order_id.'" type="button" value="Complete Order" class="order_btn" title="click to complete this order" onClick="complete_order(this.id)" /></span>';
								echo '&nbsp;<span id="reject_'.$order_id.'"><input id="'.$order_id.'" type="button" value="Reject Order" class="order_btn" title="click to reject this order" onClick="reject_order(this.id)" /></span>';
							?>
							
							<a class="order_btn" href="order_details.php?id=<?php echo $row['order_id']; ?>">Order Details</a>
							<?php echo $row['order_time']; ?>
						</div>
					</div>
				<?php }
			
			?>
        </div> <!-- END of content -->
		
		
		
		
 <?php include 'footer.php';  ?>