<?php

function userIsLoggedIn() {
    if (isset($_POST['action']) and $_POST['action'] == 'login')
     {
      if (!isset($_POST['user']) or $_POST['user'] == '' or
            !isset($_POST['password']) or $_POST['password'] == '' ) 
       {
          $GLOBALS['loginError'] = 'riempire entrampi i campi';
          return FALSE;
       }
       $password = md5($_POST['password'] . 'ijdb');
       if (databaseContainsUser($_POST['user'], $password)) {
           session_start();
           $_SESSION['loggedIn'] = TRUE;
           $_SESSION['user'] = $_POST['user'];
           $_SESSION['password'] = $password;
           return TRUE;
       }
 else {
           session_start();
           unset($_SESSION['loggedIn']);
           unset($_SESSION['user']);
           unset($_SESSION['password']);
           $GLOBALS['loginError'] = 'password o user sbagliato';
          return FALSE;
       }
    }
    if (isset($_POST['action']) and $_POST['action'] == 'logout')
     {
        session_start();
           unset($_SESSION['loggedIn']);
           unset($_SESSION['user']);
           unset($_SESSION['password']);
           header('Location: ' . $_POST['goto']);
           exit();
    }
    session_start();
    if (isset($_SESSION['loggedIn']))
        {
        return databaseContainsUser($_SESSION['user'], $_SESSION['password']);
    }
   }
   
   function databaseContainsUser($user, $password) {
    $pdo= new PDO ('mysql:host=localhost; dbname=SEUdb', 'Matteo', 'matteopwd');
    try {
//        echo $user;
//        echo $password;
        $sql = "SELECT COUNT(*) FROM users WHERE User = '". $user."' AND Password ='". $password."'";
        $s = $pdo->prepare($sql);
//        $s = bindValue(':user', $user);
//        $s = bindValue(':password', $password);
        $s -> execute();
        
    } catch (PDOException $e) {
        $error = 'Errore in ricerca user';
        exit();
    }
    $row = $s->fetch();
    if ($row[0]>0) {
        return TRUE;
    }
 else {
        return FALSE;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
