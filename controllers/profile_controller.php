<?php
session_start();

$client = new client(); 
$client -> getDatasClientByName($_SESSION['username']);

if(isset($_POST['submit'])) {
    if(!empty($_POST['firstname']) && !empty($_POST['lastname'])
     && !empty($_POST['username']) && !empty($_POST['email'])
      && !empty($_POST['password']) && !empty($_POST['streetSign'])
      && !empty($_POST['zipSign']) && !empty($_POST['citySign'])
      && !empty($_POST['birthday'])) {

      }

      }
