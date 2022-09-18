<?php /*a:1:{s:58:"D:\wamp64\www\echo\application\index\view\index\login.html";i:1648474793;}*/ ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
<title>Login</title>
<!-- Meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- //Meta tags -->
<link rel="stylesheet" href="/static/login/css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
<link href="/static/login/css/font-awesome.css" rel="stylesheet"><!-- font-awesome-icons -->
<script type="text/javascript" src="/static/jquery/js/jquery-1.8.2.min.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function() {
		
	})
	function ajaxCall(urlx, datax, divx) {
			$.ajax({
				type: 'POST',
				url: urlx,
				data: datax,
				dataType: 'html',
				timeout: 55000,
				async: false,
				success: function(data) {
					$("#" + divx).html(data);
				},
				error: function(o, s, e) {
					//window.location = urlx;
				}
			});
		}

		function submitform(){
			var data = $("#formtosubmit").serialize();
			$.ajax({
				type: 'POST',
				url: 'loginconfim.php',
				data: data,
				dataType: 'html',
				timeout: 55000,
				async: false,
				success: function(data) {
					if(data==1){
						alert('登陆成功！');
					}else{
						alert(data);
					}
				},
				error: function(o, s, e) {
					//window.location = urlx;
				}
			});
		}



</script>

<body>
<section class="w3l-form-36">
	<div class="form-36-mian section-gap">
		<div class="wrapper">
			<div class="form-inner-cont">
				<h3>Login now</h3>
				<form action="<?php echo url('index/index/loginpass'); ?>" method="post" class="signin-form" id="formtosubmit" data-auto="true" >
					<div class="form-input">
						<span class="fa fa-envelope-o" aria-hidden="true"></span> <input type="text" name="username" id="username" 
							placeholder="Username" required />
					</div>
					<div class="form-input">
						<span class="fa fa-key" aria-hidden="true"></span> <input type="password" name="password" id="password" placeholder="Password"
							required />
					</div>
					<div class="login-remember d-grid">
						<label class="check-remaind">
							<input type="checkbox">
							<span class="checkmark"></span>
							<p class="remember">Remember me</p>
						</label>
						<input type="submit" id="submit" name="submit" class="btn theme-button"  value='Sign up'>
					</div>
					<div class="new-signup">
						<a href="#reload" class="signuplink">Forgot password?</a>
					</div>
				</form>
				<div class="social-icons">
					<p class="continue"><span>Or</span></p>
					<div class="social-login">
						<a href="#facebook">
							<div class="facebook">
								<span class="fa fa-facebook" aria-hidden="true"></span>
							
							</div>
						</a>
						<a href="#google">
							<div class="google">
								<span class="fa fa-google-plus" aria-hidden="true"></span>
							</div>
						</a>
					</div>
				</div>
				<p class="signup">Don’t have an account? <a href="#signup.html" class="signuplink" ></a></p>
			</div>

			<!-- copyright -->
			<div class="copy-right">
				<p></a></p>
			</div>
			<!-- //copyright -->
		</div>
	</div>
</section>
</body>

</html>