<?php
require_once '../sm.php';
require_once '../tweet.php';

$tweet = new Tweet($_SESSION['id']);

if(!SM::isLoggedIn()){
    header('Location:login.php');
    die();
}

if(!array_key_exists('type',$_GET))
    die('error');

switch($_GET['type']){
    case 'add':
        if(!array_key_exists('tweet',$_POST))
            die('error');

        $tweetContent = $_POST['tweet'];

        if(mb_strlen($tweetContent) > 280)
            die('Max character 280!');

        $tweet->add($_POST['tweet']);
        break;
    case 'delete':
        if(!array_key_exists('tweetId',$_GET))
            die('error');

        $tweet->delete($_GET['tweetId']);
        break;
    default:
        die('error');
}
header('Location:../views/index.php');    

?>