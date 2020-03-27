<?php

$id = $_POST['id'];
$email = $_POST['email'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$role = $_POST['role'];

editUser($id, $email, $firstName, $lastName, $role);
