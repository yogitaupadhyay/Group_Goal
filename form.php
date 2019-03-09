<?php
$con= mysqli_connect("localhost", "root", "", "gg")or die(mysqli_error($con));
session_start();

/*--get the data from creater-->*/
$rollno= mysqli_real_escape_string($con,$_POST['rollno']);
$password= mysqli_real_escape_string($con,$_POST['password']);
        $stime= mysqli_real_escape_string($con,$_POST['stime']);
        $etime= mysqli_real_escape_string($con,$_POST['etime']);
        $reason= mysqli_real_escape_string($con,$_POST['reason']);
        $deadline= mysqli_real_escape_string($con,$_POST['deadline']);
        
      
        /*create table for voting*/
        $r1="create table gg.polls3 (yes int(10),no varchar(30))";
        $r1_S= mysqli_query($con, $r1)or die(mysqli_error($con));
          /*get the the data from sign up page-*/
        $r="create table gg.polls2 (rollno int(10),start_time varchar(30),end_time varchar(30),reason varchar(30),deadline varchar(30))";
        $r_S= mysqli_query($con, $r)or die(mysqli_error($con));
        $r2="insert into polls2(rollno ,start_time ,end_time ,reason ,deadline )values('$rollno','$stime','$etime','$reason','$deadline')";
         $r2_S= mysqli_query($con, $r2)or die(mysqli_error($con));
        echo 'hello';
        /*mailing part*/
        $r1="drop table polls2";
        
        $r1_s=mysqli_query($con, $r1)or die(mysqli_error($con));
        echo "hi";
     
?>

