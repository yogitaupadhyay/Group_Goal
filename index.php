   <?php $con= mysqli_connect("localhost", "root", "", "gg")or die(mysqli_error($con));
session_start();

?>
<html>
            <head>
                <title> group_gol</title>
                 <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <style>
            h2{
                text-align: center;
            }
            #login{
                margin-top: 50px; 
            }
            #h{
                border:10px solid #0099ff;
                background-color: #0099ff;
                height:540px
            }
            body{
                border:2px solid #0099ff;
            }
        </style>
            </head>
            <body>
                  <div id="signup">
                            
<div id="mymodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               
                <h2 class="modal-title" style="color:purple"><img src="signup.jpg">user_signup</h2>
                 <button class="close"data-dismiss="modal"  aria-hidden="true">*</button>
           </div>
                <form action="#signuppage" method="post" >
                                <div class="modal-body">

                    <input  type="text" placeholder="rollno" name="rollno" required class="form-control"><br></br>
                    <input  type="password" placeholder="password" name="password" minlength="6" maxlength="9"  class="form-control" required><br></br>
                    <input  type="email" placeholder="email_id" name="email"  class="form-control" required><br></br>
               
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit1" class="btn btn-primary btn-block" >signup</button><br>
                <button type="button" class="btn btn-default" data-dismiss="modal" >close</button>
                 </div>
            </form>
           
        </div>
    </div>
</div>
</div>
                <div id="signuppage">
               
                     
                <?php
                /*--get the data from creater-->*/
                $x1=0;$y=0;
                 if(isset($_POST['submit1'])){
      $rollno1= mysqli_real_escape_string($con,$_POST['rollno']);
     $password1= mysqli_real_escape_string($con,$_POST['password']);
     $email1= mysqli_real_escape_string($con,$_POST['email']);
$q1="select * from student";
$q1_r=mysqli_query($con, $q1)or die(mysqli_error($con));

$q2="select * from signup";
$q2_r=mysqli_query($con, $q2)or die(mysqli_error($con));


    while($row2= mysqli_fetch_array($q2_r))
     {
       
       if($rollno1==$row2[0])
        {
        $y++;
        }
    }
    
if($rollno1>=1611800&&$rollno1<=16118910)
  {
    while($rowstudent= mysqli_fetch_array($q1_r))
     {
       
       if($rollno1==$rowstudent[0])
        {
           
        $x1++;
        }
    }
      if($x1==1)
      {
          if($y==0)
          {
                  
      
       $m1= $r2="insert into signup(rollno ,password,email )values('$rollno1','$password1','$email1')";
          $mysqli_result1= mysqli_query($con, $m1)or die(mysqli_error($con));
          echo"you have successfully signup"?><a href="frontpage.php">click</a><?php echo"to proceed";
          
       
      }
      if($y==1){
          ?>
                         <script>alert("you already have signup");</script><?php
      }
  }
     
  }
                 }
?>  

                </div>
                
                
                <div id="login">
                    <!---login page-->
                   
                    <div class="col-xs-6"id="h"> 
                        <div class="row">
                            <img src="smily2.png"><h1 style="font-size: 100px">Group Gol!</h1>   
                        </div>
                        <br><br>
                        <div class="row">
                            <img src="login3.png"><img src="login5.png">
                        </div>
                        
                    </div>
                    <div class="col-xs-5 col-xs-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2> <img src="imozi3.png" height="60px" width="60px">login</h2>
                            </div>
                            <div class="panel-body">
                                <!--form---->
                         <form action="#loginpage" method="post" >
                    <input  type="text" placeholder="roll_no" name="rollno" required class="form-control"><br></br>
                    <input  type="password" placeholder="password" name="password" minlength="6" maxlength="9"  class="form-control" required><br></br>
                    don't have account<a data-target="#mymodal" data-toggle="modal" style="color:blue"> signup</a><br><br>
                            </div>
                            <div class="panel-footer">
                             
                <button type="submit" name="submit" class="btn btn-primary btn-block"  >login</button>
            </form>
                    
                            </div></div>
                    </div>
                </div>
                
                
                
<!--get data from the sign up page-->
 <div id="loginpage" style="" >
    
  <?php
               
                $x=0;
                 if(isset($_POST['submit'])){
      $rollno= mysqli_real_escape_string($con,$_POST['rollno']);
     $password= mysqli_real_escape_string($con,$_POST['password']);
$q="select * from signup";
$q_r=mysqli_query($con, $q)or die(mysqli_error($con));

if($rollno>=1611800&&$rollno<=16118910)
  {
    while($row= mysqli_fetch_array($q_r))
     {
       
       if($rollno==$row[0])
        {
        $x++;
        }
    }
       if($x==0)
      {?>
                         <script>alert("you don't have account first signup");</script><?php
      }
      if($x==1)
      {
          $m="select * from signup where rollno='$rollno'";
          $mysqli_result= mysqli_query($con, $m)or die(mysqli_error($con));
          $row1= mysqli_fetch_assoc($mysqli_result);
          
          if($row1["password"]==$password)
          {
              echo"you have successfully logged in "?><a href="frontpage.php">click</a><?php echo"to proceed";
          }
          else{ 
              echo "wrong password";
          }
      }
     exit(0);
  }
?>   
              <script>alert("you are not authorised user");</script><?php
  }
?>
     </div>