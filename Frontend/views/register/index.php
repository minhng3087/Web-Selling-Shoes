<div class="main">

<section class="signup">
	<!-- <img src="images/signup-bg.jpg" alt=""> -->
	<div class="container">
		<div class="signup-content">
			<form method="POST" id="signup-form" class="signup-form">
				<h2 class="form-title">Create account</h2>
				<div class="form-group">
					<input type="text" class="form-input" name="username" id="username" placeholder="Your Name"/>
				</div>
				
				<div class="form-group">
					<input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
					<span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
				</div>
				<div class="form-group">
					<input type="password" class="form-input" name="password_confirm" id="re_password" placeholder="Repeat your password"/>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
				</div>
			</form>
			<p class="loginhere">
				Have already an account ? <a href="index.php?controller=login&action=login" class="loginhere-link">Login here</a>
			</p>
		</div>
	</div>
</section>

</div>