<?php
require_once '../sm.php';
if(SM::isLoggedIn()){
    header('Location:/');
    die();
}
?>
<h3>Sign Up</h3><hr><br>
<form method="post" action="../controllers/signup.php">
<input type="text" name="email" placeholder="email">
<input type="password" name="pass" placeholder="pass">
<button type="submit">Signup</button><br><br>
<a href="../views/login.php">Sign In</a>
</form>