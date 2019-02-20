<?php
require_once '../sm.php';
require_once '../db.php';

if(!array_key_exists('email',$_POST) && !array_key_exists('pass',$_POST))
    die('missing parameters');

$db = new DB();

$result = $db->read('SELECT id FROM users WHERE email="'.$_POST['email'].'" and pass="'.$_POST['pass'].'"');

if(count($result) !== 1){
    if($db->write('INSERT INTO users (email,pass) values ("'.$_POST['email'].'","'.$_POST['pass'].'")')){
        SM::setLoggedIn($result[0]['id']);
        header('Location:../views/index.php');
    }
    else{
        die('error');
    }
}
else{
    header('Location:../views/login.php');
}

die();

?>