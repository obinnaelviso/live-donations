<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Life Saving Foundation Admin</title>
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
<!--static chart-->
</head>
<body>
<div class="login-page">
    <div class="login-main">
    	 <div class="login-head">
				<h1>Life Saving Foundation</h1>
			</div>
			<div class="login-block">
                <div></div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                            Incorrect Email or Password! Please try again.
                        </div>
                    @endif
                    <input type="text" name="email" placeholder="Email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<li>
                                    <input class="form-check-input" type="checkbox" name="remember" id="brand1" {{ old('remember') ? 'checked' : '' }}>
									<label for="brand1"><span></span>Remember me</label>
								</li>
							</ul>
                        </div>
                        {{-- @if (Route::has('password.request'))
                            <div class="forgot">
                                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                        @endif --}}
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign In" value="Login">
					{{-- <h3>Not a member?<a href="{{ route("register") }}">Register</a></h3> --}}
				</form>
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




