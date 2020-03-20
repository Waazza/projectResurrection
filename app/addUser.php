<?php

var_dump($_POST);
$email = $_POST['email'];
$pw = $_POST['password'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$role = $_POST['role'];

addUser($email, $pw, $firstName, $lastName, $role);


