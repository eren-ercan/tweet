<?php

//test for commit

require_once '../sm.php';
require_once '../tweet.php';

if(!SM::isLoggedIn()){
    header('Location:login.php');
    die();
}

$tweet = new Tweet($_SESSION['id']);
?>

Welcome <a href="../controllers/logout.php">Logout</a><br>

<ul>
    <?php
        foreach($tweet->get() as $t){
            echo '<li>'.$t['tweet'].' '.date('d-m-Y h:i:s',intval($t['time']/1000 + 7200 )).'</li><a href="../controllers/tweet.php?type=delete&tweetId='.$t['id'].'">Delete</a>';
        }
    ?>
</ul>

<form method="post" action="../controllers/tweet.php?type=add">
    <textarea name="tweet" placeholder="tweeetttt" maxlengnth="280"></textarea>
    <button type="submit">Send</button>
</form>
