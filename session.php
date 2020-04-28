<?php
   include('conn.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select * from admin_login where admin_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['admin_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>