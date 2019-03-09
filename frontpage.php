  <?php
$con=mysqli_connect("localhost","root","","gg")or die(mysqli_error($con));?>

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
             #blackboard{
                 background-image: url(b3.jpg);
                  background-size: cover;
                  padding:50px
             }
             h1{
                
                 color:#000099;
                 text-align: center;
                 font-size:95px
             }
             div{
                 align-content: center
             }
             body{
                  background-image: url(gradient8.jpg);
                  background-size: cover;
                  border:10px solid black;
                  
             }
         </style>
               </head>
    
    <body>
        <!--modal for voting --->
        <div id="mymodal1" class="modal fade">
    <div class="modal-dialog">                <h2 class="modal-title">there shouldbe gg?</h2>
                 <button class="close" data-dismiss="modal"  aria-hidden="true">*</button>
           </div>
            <div class="modal-body">
                <form action="#vote" method="post">
                    

        <div class="modal-content">
            <div class="modal-header">
               
                  <input  type="text" placeholder="roll_no" name="rollno1" required class="form-control"><br></br>
                   <button type="submit" name="submit2"value="yes" class="btn btn-default btn-lg "onclick="fun(this)"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                     <button type="submit" name="submit2" value="no"class="btn btn-default btn-lg"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                     </form>
            </div>
                    </div>
    </div>
</div>
        <!--modal end here-->
         <h1><img src="smily2.png">group_gol !</h1>
        
        <div class="container">
            <div class="row">
              
                <div class="col-xs-6">
                   
                    <!--modal-->
                        <div>
                            <a data-target="#mymodal" class="btn btn-primary" data-toggle="modal"style="color:white;">create polls</a><br><br>
<div id="mymodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close"data-dismiss="modal"  aria-hidden="true">*</button>
                <h2 class="modal-title" style="color:purple">create poll</h2>
           </div>
            <div class="modal-body">
                <form action="mail.php" method="post" >
                    <input  type="text" placeholder="rollno_of_creater" name="rollno" required class="form-control"><br></br>
                    <input  type="password" placeholder="password" name="password" minlength="6" maxlength="9"  class="form-control" required><br></br>
                    <input  type="text" placeholder="start time of gg(dd/mm/yyyy-h:m)" name="stime"  class="form-control" required><br></br>
                      <input  type="text" placeholder="end time of gg(dd/mm/yyyy-h:m)" name="etime"  class="form-control" required><br></br>
                    <p  style="color:grey"> reason for gg:</p>
                    <select name="reason">
                        <option style="color:grey">vaction add</option>
                         <option>festival</option>
                          <option> exam-preparation is needed </option>
                           <option> collage fest</option>
                            <option> guest-lecture</option>
                             <option> aleady have enough classes</option>
                              <option> courrse had already been completed</option>
                               <option> class in of no use</option>
                    </select><br><br>
                    <input  type="text" placeholder="deadline for voting" name="deadline"   class="form-control"required><br></br>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >close</button>
                <button type="submit" name="submit" class="btn btn-primary" >create</button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
                    <!---ongoing polls-->
                    <button data-target="#mymodal1" class="btn btn-primary " data-toggle="modal"style="color:white"><span class="glyphicon glyphicon-thumbs-up"></span> vote</button><br><br>
                                 
        <button type="button"class="btn btn-primary" ><span class="glyphicon glyphicon-pause"></span><a href=""style="color:white"> stop polling</a></button>               
            
                </div>
                
                <!--buttons end here ,display of polling result-->
                
                <div class="col--xs-6"id="blackboard">
                               
<?php
$q="SELECT * FROM `polls3`";

$q_r= mysqli_query($con, $q)or die(mysqli_error($con));
$row= mysqli_fetch_array($q_r);
$yes=$row[0];
$no=$row[1];

?>
            <h4 style="color:white;text-align: center;">gg?</h4>        
                    <canvas id="myChart" width="350" height="350"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["yes", "no"],
        datasets: [{
            label: 'gg-declaration',
            data:[<?php echo $yes;?>,<?php echo $no; ?>],
            backgroundColor: [
               'red','green'
            ],
            borderColor: [
                 'red','green'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
                </div>
            </div>
        </div>
         <div id="vote">
             <?php

               $k=0;
                
                 if(isset($_POST['submit2'])){
                   
      $rollno= mysqli_real_escape_string($con,$_POST['rollno1']);
       $m= "select * from student where rollno4='$rollno'";
       $m_r= mysqli_query($con, $m)or die(mysqli_error($con));
       $mrow= mysqli_fetch_array($m_r);
       if($mrow["voted"]==0){
     $res= mysqli_real_escape_string($con,$_POST['submit2']);
      $q="UPDATE student SET voted = 1 WHERE rollno4 = '$rollno'";
    $q_r= mysqli_query($con, $q)or die(mysqli_error($con));
    
  if($res==="yes"){
      $r="UPDATE polls3 SET yes= yes+1";
        $r_r= mysqli_query($con, $r)or die(mysqli_error($con));
  }
   if($res==="no"){
      $r1="UPDATE polls3 set no= no+1";
       $r1_r= mysqli_query($con, $r1)or die(mysqli_error($con));
  }
  $n="select * from student where voted='1'";
    $n_r= mysqli_query($con, $n)or die(mysqli_error($con));
    while($nrow=mysqli_fetch_array($n_r)){
        $k++;
    }
    echo $k;
     $p="select * from polls3 ";
    $p_r= mysqli_query($con, $p)or die(mysqli_error($con));
        $p_row=mysqli_fetch_array($p_r);
    if($k==56){
        if($p_row[0]==0.75*$k)
            {
            echo "today is gg";/*<--today is gg-->*/
                }
    }
 exit(0);
                 }
                 if($mrow["voted"]==1){
                 ?> <script>alert("your vote has already been recorded");</script><?php
                 
                 }
                 }
                 
?>
         </div>
    </body>
</html>

