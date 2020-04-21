<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
</head>
<body>

<h2 align="center"><a href="profile.php">Chat</a></h2></th>
<?php

session_start();
include('dbcon.php');
$search_get_id = $_GET['var'];
$sender_id=$_SESSION['id'];
//echo $search_get_id," ";
//echo $_SESSION['id']," ";

$query12="SELECT * FROM student WHERE id='$_SESSION[id]'";
   $run12=mysqli_query($con,$query12);
   while($go12=mysqli_fetch_assoc($run12))
   {
   $image_sender=$go12['image'];
   }

$query13="SELECT * FROM student WHERE id='$search_get_id'";
   $run13=mysqli_query($con,$query13);
   while($go13=mysqli_fetch_assoc($run13))
   {
   $image_receiver=$go13['image'];

   }

   
//) or (receiver_id='$sender_id' and sender_id='$search_get_id')
//sender_id='$sender_id' and receiver_id='$search_get_id'
$query="SELECT * FROM message WHERE (sender_id='$sender_id' and receiver_id='$search_get_id') || (receiver_id='$sender_id' and sender_id='$search_get_id')";
  $result=mysqli_query($con,$query);
     //$con file we used to include data base connection
  $row=mysqli_num_rows($result);
  // echo $row;
   while($row!=0)
  {
  $go=mysqli_fetch_assoc($result);
  $message_id=$go['id'];
  $message=$go['message'];
  $send_sender_id=$go['sender_id'];
  $receiver_id=$go['receiver_id'];
  $time=$go['time'];
  $seen=$go['seen'];
  //echo $send_sender_id,"-",$search_get_id,"-",$receiver_id,"-",$sender_id;
  ?>
  <?php 

   if($send_sender_id==$search_get_id )
   {
   ?>
      <div class="container" style="background-color: lightblue">
        <img src="profile_pic/<?php echo$image_receiver;?>" alt="Avatar" style="width:100%;">
        <p><?php echo $message; ?></p>
        <span class="time-right"><?php echo $time;?></span>
      </div>
      <?php
      // echo $receiver_id,"-",$_SESSION['id'];
         if($receiver_id==$_SESSION['id'])
         {
         $qry6=" UPDATE `message` SET seen='1' WHERE id='$message_id' ";   
         $result6=mysqli_query($con,$qry6);
         }
      ?>
<?php

   }
  ?>

 <?php 
 if( $receiver_id==$search_get_id)
 {
 ?>
      <div class="container darker" style="background-color: lightgreen;">
        <img src="profile_pic/<?php echo$image_sender;?>" alt="Avatar" class="right" style="width:100%;">
        <p align="right"><?php echo $message; ?></p>
        <span class="time-left"><?php echo $time;?></span>
      </div>
      

<?php

 }
?>


<?php
$row--;
}
 


?>
<p align="right"><?php if($seen==1)
           {
            echo "seen";
           }?></p>
<div class="container darker">
  <form method="POST">
      
      <textarea style="width:80%;"  class="form-control" name="message" placeholder="Send a message to correct someone"></textarea>
      <input  type="submit" style="color: blue;"  name="submit" value="send">
    
  </form>
</div>



<?php 
if (isset($_POST['submit'])) 
{
$query12="INSERT INTO message(sender_id,message,receiver_id,seen) VALUES ('$_SESSION[id]','$_POST[message]','$search_get_id','0') ";
$run12=mysqli_query($con,$query12) or die('eroor');
}
?>



</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>