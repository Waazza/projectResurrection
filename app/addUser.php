<?php

$email = $_POST['email'];
$pw = $_POST['password'];
$pwConfirm = $_POST['passwordConfirm'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$role = $_POST['role'];

addUser($email, $pw, $firstName, $lastName, $role, $pwConfirm);


