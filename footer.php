<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body{
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
}
.one{
	max-width: 100%;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
.footer{
	background-color: #2b2b2b;
    padding: 50px;
    bottom: 0;
}
.footer-col1{
	width: 50%;
	padding-right: 80px;
 }
.footer-col{
   width: 20%;
   padding: 0 15px;
   padding-right:1px;
}
.footer-col h4,.footer-col1 h4,.footer-col2 h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before,.footer-col1 h4::before,.footer-col2 h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
    margin-left: -40px;
}
.footer-col1 ul p{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}

.footer-col ul li a:hover,.footer-col1 ul p:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col2 .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px -3px;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col2 .social-links a:hover {
    color: #011239;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}
</style>
<body>

  <footer class="footer">
  	 <div class="one">
  	 	<div class="row">
  	 		<div class="footer-col1">
  	 			<h4>ELES EMES Enterprises</h4>
  	 			<ul>
  	 				<p>Whether you're revamping a room, adding a pop of personality to furniture, or undertaking a large-scale project, we've got you covered. Explore our spectrum of paints, primers, and accessories to bring your vision to life. With competitive prices and a commitment to customer satisfaction, Color Harmony is more than a paint store – it's a place where your ideas take shape in living color.</p>
					<p>0112 669 </p>
					<p>shahibdhahilmy@gmail.com</p>
					<p>address</p>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Quick Links</h4>
  	 			<ul>
  	 				<li><a href="home.php">Home</a></li>
  	 				<li><a href="g.php">Gallery</a></li>
  	 				<li><a href="about_us.php">About Us</a></li>
  	 				<li><a href="contact.php">Contact Us</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col2">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href=""><i class="fab fa-instagram"></i></a>
					<a href=""><i class="fab fa-linkedin"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

</body>
</html>
