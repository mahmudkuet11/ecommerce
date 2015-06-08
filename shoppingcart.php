<?php
	include 'header.php';
	if(!isset($_SESSION['user_id'])){
		header('Location:login.php');
		die();
	}
?>  
        <div id="content">
		
        	<table width="700px" cellspacing="0" cellpadding="5">
                   	  <tr bgcolor="#CCCCCC">
                        	<th width="220" align="left">Image </th> 
                        	<th width="180" align="left">Product name </th> 
                       	  	<th width="100" align="center">Quantity </th> 
                        	<th width="60" align="right">Price </th> 
                        	<th width="60" align="right">Total </th> 
                        	<th width="90"> </th>
                            
                      </tr>
					  <?php
						$product_id = json_decode($_SESSION['product_id']);
						$product_qty = json_decode($_SESSION['product_quantity']);
						$size = sizeof($product_id);
						$total = 0;
						for($i=0;$i<$size;$i++){
							$id = $product_id[$i];
							$qty = $product_qty[$i];
							$res_id = mysql_query("SELECT * FROM products WHERE product_id='$id'");
							$row_id = mysql_fetch_array($res_id); ?>
							<tr id="<?php echo $id.'tr'; ?>">
								<td><img width="200px" height="150px" src="<?php echo $row_id['image_link'];  ?>" alt="<?php $row_id['product_name'] ?>" /></td> 
								<td><?php echo $row_id['product_name']; ?></td> 
								<td align="center"><?php echo $qty; ?> </td>
								<td align="right"><?php echo $row_id['price']; ?> </td> 
								<td align="right"><?php echo $row_id['price']*$qty; $total += $row_id['price']*$qty ?> </td>
								<td align="center"> <a style="cursor:pointer" id="<?php echo $id; ?>" onClick="remove_order(this.id);"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a> </td>
							</tr>
						<?php }
					  ?>
                        <tr>
                        	
                            <td align="right" style="background:#ccc; font-weight:bold"> Total (BDT) </td>
                            <td align="right" id="total_price" style="background:#ccc; font-weight:bold"><?php echo $total; ?> </td>
                            <td style="background:#ccc; font-weight:bold"> </td>
						</tr>
					</table>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
                        <div class="checkout"><a href="checkout.php" class="more">Proceed to Checkout</a></div>
                        <div class="cleaner h20"></div>
                        <div class="continueshopping"><a href="products.php" class="more">Continue Shopping</a></div>
                    	
                    </div>
            
		</div>
 <?php include 'footer.php';  ?> 