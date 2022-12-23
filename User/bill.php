<?php
session_start();
require 'config.php';
require 'model/db.php';
require "model/user_address.php";

header("location:checkout.php");
?>