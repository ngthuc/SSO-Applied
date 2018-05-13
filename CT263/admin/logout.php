<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 5/13/2018
 * Time: 4:54 AM
 */
session_start();
if($_SESSION['username']){
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    header("location:index.php");
}else{
    header("location:index.php");
}