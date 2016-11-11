<div class="header-section">
	<!-- top_bg -->
	<div class="top_bg">

		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="{{ url('/admin') }}">Administrador Lara-Shop</a></li>
				</ul>
			</div>
			<div class="top_left">
				@if (!Auth::guest())
				<h2><i class="glyphicon glyphicon-user" ></i> {{Auth::user()->full_name }} </h2>
				@endif
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
	<div class="clearfix"></div>
	<!-- /top_bg -->
</div>
<div class="header_bg">{{-- 
	<div class="header">
		<div class="head-t">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" class="img-responsive" alt=""> </a>
			</div>
			<!-- start header_right -->
			<div class="header_right">
				<div class="rgt-bottom">
					<div class="log">
						<div class="login">
							<div id="loginContainer">
								<a id="loginButton" class=""><span>Login</span></a>
								<div id="loginBox" style="display: none;">                
									<form id="loginForm">
										<fieldset id="body">
											<fieldset>
												<label for="email">Email Address</label>
												<input type="text" name="email" id="email">
											</fieldset>
											<fieldset>
												<label for="password">Password</label>
												<input type="password" name="password" id="password">
											</fieldset>
											<input type="submit" id="login" value="Sign in">
											<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
										</fieldset>
										<span><a href="#">Forgot your password?</a></span>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="reg">
						<a href="register.html">REGISTER</a>
					</div>
					<div class="cart box_1">
						<a href="checkout.html">
							<h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)<img src="images/bag.png" alt=""></h3>
						</a>	
						<p><a href="javascript:;" class="simpleCart_empty">(empty card)</a></p>
						<div class="clearfix"> </div>
					</div>
					<div class="create_btn">
						<a href="checkout.html">CHECKOUT</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="search">
					<form>
						<input type="text" value="" placeholder="search...">
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
 --}}</div>
<!-- //header-ends -->				
