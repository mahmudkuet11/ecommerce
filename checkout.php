<?php
	include 'header.php';
	if(!isset($_SESSION['user_id'])){
		header('Location:login.php');
		die();
	}
?>
        
        <div id="content">
       		<h2>Checkout</h2>
            <h5><strong>BILLING DETAILS</strong></h5>
			<form action="core/place_order.php" method="post" name="checkout_form" onsubmit="return (check_checkout_form());">
				<div class="col col_13 checkout">
					Enter your full name:
					<input type="text" name="name"  style="width:300px;"  />
					Address:
					<input type="text" name="address"  style="width:300px;"  />
					City:
					<input type="text" name="city"  style="width:300px;"  />
					Country:
					<input type="text" name="country"  style="width:300px;"  />
				</div>
				
				<div class="col col_13 checkout">
					E-MAIL
					<input type="text" name="email"  style="width:300px;"  />
					PHONE<br />
					<span style="font-size:10px">Please, specify your reachable phone number. YOU MAY BE GIVEN A CALL TO VERIFY AND COMPLETE THE ORDER.</span>
					<input type="text" name="phone"  style="width:300px;"  />
				</div>
				
				<div class="cleaner h50"></div>
				<h3>Shopping Cart</h3>
				<h4>TOTAL: <strong><?php echo get_total_price(); ?> BDT</strong></h4>
				<input type="submit" value="Order Now" id="order_btn" title="Order" />
             </form>  
		</div>
		
		<?php include 'footer.php';  ?>