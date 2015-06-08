 <div class="cleaner"></div>
    </div> <!-- END of main -->
    
    <div id="templatemo_footer">
		<div class="col col_16"><pre> </pre></div>
    	<div class="col col_16">
        	<h4>Categories</h4>
            <ul class="footer_menu">
					<?php
					
						$sql = "SELECT * FROM category LIMIT 0,3";
						$result = mysql_query($sql);
						while($row = mysql_fetch_array($result)){
							$cat = $row['category'];
							echo '<li><a href="products.php?category='.$cat.'">'.$cat.'</a></li>';
						}
					
					?>		
		  </ul>  
        </div>
        
        
        <div class="col col_16">
        	<h4>Social</h4>
            <ul class="footer_menu">
            	<li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Youtube</a></li>
		  </ul>  
        </div>
        <div class="col col_13 no_margin_right">
        	<h4>About Us</h4>
            <p>we are an online based company. we receive your order and deliver the products according your needs.</p>
        </div>
        
        <div class="cleaner h40"></div>
		<center>
			Copyright &copy; 2014 WEB STORE | Designed by <a href="http://www.facebook.com/raju.rajuk">Mahmudur Rahman</a>
		</center>
    </div> <!-- END of footer -->   
   
</div>

<script type="text/javascript" src="js/custom/add_to_cart.js"></script>
<script type='text/javascript' src='js/logging.js'></script>
<script type='text/javascript' src='js/custom/validate.js'></script>
</body>
</html>