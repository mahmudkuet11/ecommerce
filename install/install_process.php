<?php
$pass = md5($_POST['password']);
$email = $_POST['email'];
$demo = "";
if(isset($_POST['demo'])) $demo = 'yes';
else $demo = 'no';
$con = mysql_connect("localhost","root","");
$db = mysql_query("CREATE DATABASE project");
if(!$db){
	echo '<p style="color:red;font-size:25px">please make sure that there is no database called "project"</p>';
	die();
}
mysql_select_db("project",$con);
$cat = "CREATE TABLE category(
id int PRIMARY KEY AUTO_INCREMENT,
category varchar(50)
)";
$orders = "CREATE TABLE orders(
order_id int PRIMARY KEY AUTO_INCREMENT,
user_id int,
name varchar(300),
address varchar(500),
city varchar(50),
country varchar(50),
email varchar(150),
phone varchar(25),
order_status varchar(20),
total_price varchar(30),
product_id varchar(1000),
order_time varchar(100),
quantity varchar(1000)
)";
$products = "CREATE TABLE products(
product_id int PRIMARY KEY AUTO_INCREMENT,
product_name varchar(100),
description varchar(2000),
price int,
availability int,
model varchar(50),
manufacturer varchar(50),
category varchar(50),
image_link varchar(200),
sell int,
view int,
featured varchar(10)
)";
$user = "CREATE TABLE user(
user_id int PRIMARY KEY AUTO_INCREMENT,
username varchar(50),
password varchar(32),
email varchar(50),
newsletter_activation varchar(50)
)";
mysql_query($cat);
mysql_query($orders);
mysql_query($products);
mysql_query($user);
$admin_create = "INSERT INTO user (username,password,email,newsletter_activation) VALUES('admin','$pass','$email','')";
mysql_query($admin_create);


$cat = array();
$products = array();
if($demo == 'yes'){
$cat[0] = "INSERT INTO category (category) VALUES('personal')";
$cat[1] = "INSERT INTO category (category) VALUES('tools')";
$cat[2] = "INSERT INTO category (category) VALUES('electronics')";

$products[0] = "INSERT INTO products (product_name,description,price,availability,model,manufacturer,category,image_link,sell,view,featured) VALUES('Doll','this is a cute doll','300','50','doll-12','Local','personal','http://localhost/project/upload/4139542313307.jpg','0','1','yes')";
$products[1] = "INSERT INTO products (product_name,description,price,availability,model,manufacturer,category,image_link,sell,view,featured) VALUES('Hammer','very useful tool for various works. keep one near your hand and use.','600','25','hammer-16','Local','tools','http://localhost/project/upload/4139542277001.jpg','0','0','yes')";
$products[3] = "INSERT INTO products (product_name,description,price,availability,model,manufacturer,category,image_link,sell,view,featured) VALUES('Shoe','Smart looking shoes. super flexible and very comfortable','2000','60','bata-1C23','Bata','personal','http://localhost/project/upload/4139542292004.jpg','0','1','yes')";
$products[4] = "INSERT INTO products (product_name,description,price,availability,model,manufacturer,category,image_link,sell,view,featured) VALUES('Laptop','Intel core i3 3.0 GHz,4GB DDR3 RAM,15 inch color monitor,500 GB hard disk','40000','200','DELL-800','Dell','electronics','http://localhost/project/upload/4139542305006.jpg','0','0','yes')";
$products[5] = "INSERT INTO products (product_name,description,price,availability,model,manufacturer,category,image_link,sell,view,featured) VALUES('Table fan','Rechargeable table fan with charger light. Long lasting battery. Smart looking.','3500','30','1C23DE','National Fan Industries','electronics','http://localhost/project/upload/4139542260403.jpg','0','0','yes')";
$products[6] = "INSERT INTO products (product_name,description,price,availability,model,manufacturer,category,image_link,sell,view,featured) VALUES('Paper Weight','this is a paper weight','80','60','no','Local','personal','http://localhost/project/upload/4139542320205.jpg','0','3','yes')";


for($i=0;$i<3;$i++){
	mysql_query($cat[$i]);
}

for($i=0;$i<7;$i++){
	mysql_query($products[$i]);
}

header("Location:../index.php");

}






?>