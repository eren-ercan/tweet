<?php

//test for commit
require_once 'header.php';
require_once '../sm.php';
require_once '../tweet.php';

if(!SM::isLoggedIn()){
    header('Location:login.php');
    die();
}

$tweet = new Tweet($_SESSION['id']);
?>

<link rel="stylesheet" type ='text/css' href="../css/style.css" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<ul id="tweet">
    <?php
        foreach($tweet->get() as $t){
            echo '<li class="tweetlist">'.date('d-m-Y h:i:s',intval($t['time']/1000 + 7200 )).' <br> '.$t['tweet'].' </li><a id="tDelete" href="../controllers/tweet.php?type=delete&tweetId='.$t['id'].'"><i class="far fa-trash-alt"></i></a><hr> ';
        }
    ?>
</ul>

<form method="post" action="../controllers/tweet.php?type=add">
    <textarea name="tweet" placeholder="tweeetttt" maxlengnth="280"  cols="35"></textarea>
    <button class="send-button" type="submit"><i class="fas fa-retweet fa-2x"></i></button>
</form>


