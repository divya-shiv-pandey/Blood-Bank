<?php
session_start();

require "Util.php";
$util = new Util();

//Clear Session
$_SESSION["member_id"] = "";
$_SESSION["member_type"] = "";
session_destroy();

// clear cookies
$util->clearAuthCookie();

header("Location: ./");
?>