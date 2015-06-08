<?php
include 'header.php';
if(!is_admin($_SESSION['user_id'])){
	header("Location:index.php");
	die();
}
$order_id = $_GET['id'];
?>
        <div id="content" class="faq">
        	<h2>Order No: <?php echo $order_id; ?></h2>
			<h1>Product Info</h1>
            <table id="details_table">
				<tr>
					<td>Product ID</td>
					<td>Name</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Total</td>
					<td>Model</td>
					<td>Manufacturer</td>
					<td>Product Link</td>
				</tr>
				<?php
					$product_id = get_product_id_from_order_id($order_id);
					for($i = 0; $i < sizeof($product_id); $i++){ ?>
						<tr>
							<td><?php echo $product_id[$i]; ?></td>
							<td><?php echo get_product_details($product_id[$i],'name'); ?></td>
							<td><?php echo get_product_details($product_id[$i],'price'); ?></td>
							<td><?php echo get_quantity($order_id,$i); ?></td>
							<?php 
								$total = get_product_details($product_id[$i],'price') * get_quantity($order_id,$i);
							?>
							<td><?php echo $total ?></td>
							<td><?php echo get_product_details($product_id[$i],'model'); ?></td>
							<td><?php echo get_product_details($product_id[$i],'manufacturer'); ?></td>
							<td><a class="order_btn" href="<?php echo get_product_details($product_id[$i],'link'); ?>">View Product</a></td>
						</tr>
					<?php }
				?>
			</table>
			<br/><br/><br/>
			<h1>Customer Info</h1>
            <table id="customer_details_table">
				<tr>
					<td>Name</td>
					<td><?php echo get_customer_details($order_id,'name') ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo get_customer_details($order_id,'address') ?></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php echo get_customer_details($order_id,'city') ?></td>
				</tr>
				<tr>
					<td>Country</td>
					<td><?php echo get_customer_details($order_id,'country') ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo get_customer_details($order_id,'email') ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><?php echo get_customer_details($order_id,'phone') ?></td>
				</tr>
			</table>
			<br/>
			<?php
				$order_id = $_GET['id'];
				if(!is_received($order_id) && !is_completed($order_id))
					echo '<span id="receive_'.$order_id.'"><input id="'.$order_id.'" type="button" value="Receive Order" class="order_btn" title="click to receive this order" onClick="receive_order(this.id)" /></span>';
				if(!is_completed($order_id))
					echo '&nbsp;<span id="complete_'.$order_id.'"><input id="'.$order_id.'" type="button" value="Complete Order" class="order_btn" title="click to complete this order" onClick="complete_order(this.id)" /></span>';
			?>
        </div> <!-- END of content -->
 <?php include 'footer.php';  ?>