<?php
session_start();

if($_SESSION["user_account"]==""){
		Header("Location: http://140.117.69.10/~nms/");
		exit();
}
?>