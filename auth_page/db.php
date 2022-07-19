<?php
session_start();

$conn = mysqli_connect("localhost",'root','','chatapp');
if (!$conn) {
    die("Connection Failed :-".mysqli_connect_error());
}