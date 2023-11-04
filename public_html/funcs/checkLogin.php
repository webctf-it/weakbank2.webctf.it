<?php
session_start();
$flag = false;
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
    $flag = true;
    $admin = $_SESSION['admin'];
}
