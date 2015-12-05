<html>
<head>
<script src="js/jquery-2.1.3.min.js"></script>
<scrip src="js/frontpage.js"></scrip>
</head>
<body>
<div>
<h2>Register</h2>
<form id="register" action="register" method="post">
<p>Enter your username: <input type="text" name="username" /></p>
<p>Enter your email: <input type="email" name="email" /></p>
<p>Enter a password: <input type="password" name="password1" /></p>
<p>Enter password again: <input type="password" name="password2" /></p>
<button type="submit" name="register">Register</button>
</form>
</div>
<div>
<h2>Login</h2>
<form id="login" action="login" method="post">
<p>Enter your email: <input type="email" name="email" /></p>
<p>Enter your password: <input type="password" name="password" /></p>
<button type="submit" name="login">Login</button>
</form>
</div>
</body>
</html>