<html>
    <head>
        <title> login</title>
        <link rel="stylesheet" href="login/css/style.css">

    </head>


<body>
<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(login/images/bg.png);"></div>
		      	<h3 class="text-center mb-0"> Login form</h3>
   
   
    <form method="POST" action="login.php" class="login-form">
      <!--
        the is applied to the form where place holder of the user name in the template should contail the email wheere asthe password palce holder should contain the password it self 
      -->
        
    <div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			
               <input type="email" name="email" class="form-control" placeholder="Email" required>
               </div>
               <div class="form-group"> 
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              
              <input type="password"name="password" class="form-control"  placeholder="Password" required>

              <div class="form-group d-md-flex">
                <div class="w-100 text-md-right">
                  <a href="forgotpwdform.php">forgot password</a>
                </div>
              </div>
</div>

<div class="form-group">
	            	<button  type="submit" value="login" name="btn" id="btn" class="btn form-control btn-primary rounded submit px-3">Login
</button>

                </div>
    </form>
   
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
    </body>
</html>    