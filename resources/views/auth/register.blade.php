<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Life Saving Foundation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Life Saving Foundation" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="/admin/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="/admin/js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="/admin/css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--//charts-->
</head>
<body>
<!--inner block start here-->
<div class="signup-page-main">
     <div class="signup-main">
    	 <div class="signup-head">
				<h1>Life Saving Foundation Registration</h1>
			</div>
			<div class="signup-block">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul type="disc">
                                @foreach($errors->all() as $error)
                                    <li type="*">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
					<input type="text" name="email" class="lock" placeholder="Email Address" required="">
					<input type="password" name="password" class="lock" placeholder="Password" required>
					<input type="password" name="password_confirmation" class="lock" placeholder="Confirm Password" requred>
					{{-- <div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span>I agree to the terms</label>
								</li>
							</ul>
						</div>

						<div class="clearfix"> </div>
					</div> --}}
                    <input type="submit" name="Sign In" value="Register">
				</form>
				<div class="sign-down">
				<h4>Already have an account? <a href="{{ route("login") }}"> Login</a></h4>
				</div>
			</div>
    </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2020 Life Saving Foundation. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
<!--COPY rights end here-->
<!--scrolling js-->
		<script src="/admin/js/jquery.nicescroll.js"></script>
		<script src="/admin/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="/admin/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>




