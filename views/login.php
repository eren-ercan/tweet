<?php
require_once '../sm.php';
if(SM::isLoggedIn()){
    header('Location:/');
    die();
}
?>
<h3>Sign In</h3><hr><br>
<form method="post" action="../controllers/login.php">
<input type="text" name="email" placeholder="email">
<input type="password" name="pass" placeholder="pass">
<button type="submit">Login</button><br><br>
<a href="../views/signup.php">Sign Up</a>
</form>