@extends('layouts.auth')
@section('login')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-logo">
            <img src="/img/logo.jpg" width="100">
        </div>
        <form action="/auth" method="POST" class="form-login">
				@csrf
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
				<br>
				<div class="input-group">
					<input type="text" class="form-control"  placeholder="name" name="name"  value="" required>
				</div>
				<div class="input-group">
					<input type="email" class="form-control" placeholder="name@example" name="email" value="" required>
				</div>
				<div class="input-group">
					<input type="password" class="form-control" placeholder="your password" name="password" value="" required>
				</div>
				<br>
				<div class="input-group">
					<button name="submit" class="btn">Register</button>
				</div>
				<p class="login-register-text">Have an account? <a href="/login">Login Here</a>.</p>
			</form>
    </div>
</div>
@endsection
