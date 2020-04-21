
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRAVELLER</title>

    <!-- Bootstrap core CSS -->
    <link href="decoration/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="decoration/css/style.css" rel="stylesheet">
    <link href="decoration/css/font-awesome.css" rel="stylesheet">
  </head>
 <style >
   body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
 </style>
 <?php 
session_start();
if (isset($_SESSION['id'])) {
}
else
{
  header('location:index.php');
}

?>
  <body>
 <h1 style="color: black; "><b>&nbsp&nbsp&nbsp<a href="user_index.php">TRAVELLER</a></b></h1>
  <hr>


    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="members">
              <h1 class="page-header">Members</h1>
               <?php
                if(isset($_GET['submit']))
               {
                $name=$_GET['search_name'];
                  include('dbcon.php');
                  $qu="SELECT * FROM student WHERE name LIKE '%$name%' ";
                  $run=mysqli_query($con,$qu);
                  $i=1;
                  
                  while($ro=mysqli_fetch_array($run))
                    {
                      
                      if($i<=10)
                      {
                     $profile_id=$ro['id'];
                     $image_visit=$ro['image'];
                     $profilevisit=$ro['name'];
                     $follower_count=$ro['follower_count'];       
                      $login_check=$ro['login_check'];    
                     if($profile_id!=$_SESSION['id'])
                     {
                       $query12="SELECT * FROM follow_unfollow WHERE   follower_id='$_SESSION[id]' && following_id='$profile_id'";
   $run12=mysqli_query($con,$query12);
   $row12=mysqli_num_rows($run12);
   if($row12!=0)
   {
    $check_the_following=1;
   }
   else
   {
    $check_the_following=0;
   }
            
                   ?>
              <div class="row member-row">
                <div class="col-md-3">
                  <a href="profile_visit.php?var=<?php echo $profile_id ?>"><img src="profile_pic/<?php echo$image_visit;?>" class="img-thumbnail" alt=""></a>
                  <div class="text-center">
                    <?php echo $profilevisit; ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <p><button class="btn btn-default btn-block"  class="open-button" onclick="openForm()">Chat</button></p>
                </div>
                
                <div class="col-md-3">
                <p><a class="btn btn-default btn-block" style="color: black;background-color: orange;"><?php echo" ",$follower_count," ";?><br> follower</a></p>
                </div>
                <div class="col-md-3">
                <form method="post" >
                <p><input type="submit" name="submit" value="<?php 
                   if($check_the_following==1)
                   {
                   echo"unfollow";
                   } 
                   else
                   {
                   echo"follow";
                   }
                  ?>" class="btn btn-default btn-block" style="background-color: orange"></p>
                    
                <input type="hidden" name="id" value="<?php echo$profile_id;?>">
                <input type="hidden" name="count" value="<?php echo$follower_count;?>">
              
                </form>
                </div>
              </div>
                                <div class="chat-popup" id="myForm">
                                <form action="search.php" class="form-container" method="post">
                                <h1>Chat</h1>

                                <label for="msg"><b>Message</b></label>
                                <textarea placeholder="Type message.." name="message" required></textarea>
                                
                                <input type="submit" name=submit value="chat" class="btn">
                                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                <input type="hidden" name="search_id" value="<?php echo$profile_id;?>">
                                </form>
                                </div>

                                <script>
                                function openForm() {
                                document.getElementById("myForm").style.display = "block";
                                }

                                function closeForm() {
                                document.getElementById("myForm").style.display = "none";
                                }
                                </script>
                <?php
                     }
                     }
                     $i++;
                     
                     }
                     
                }

                     ?>

                <?php
              if (isset($_POST['submit'])) 
              {
                //$chech_follow_unfollow="$_POST[submit]";
                if($_POST['submit']=="follow")
                  {
                  include('dbcon.php');
                   
                  $query3="SELECT * FROM follow_unfollow WHERE follower_id='$_SESSION[id]' AND following_id='$_POST[id]'";
                  $run3=mysqli_query($con,$query3);
                  $row3=mysqli_num_rows($run3);
                            if($row3!=0)
                            {
                            
                            }
                            else
                            {
                            $query="INSERT INTO follow_unfollow(follower_id,following_id) VALUES ('$_SESSION[id]','$_POST[id]') ";
                            $run=mysqli_query($con,$query)or die("dead");
                            $count=$_POST['count']+1;
                            $follower_count_query="UPDATE `student` SET follower_count='$count' WHERE id='$_POST[id]'";
                            $run1=mysqli_query($con,$follower_count_query)or die("dead");
                            }
                  }
                  if($_POST['submit']=="unfollow")
                  {

                 
                  $no_follower_stored=$_POST['count']-1;
                  $query3="DELETE FROM follow_unfollow WHERE follower_id='$_SESSION[id]' AND following_id='$_POST[id]' ";
                  $run3=mysqli_query($con,$query3);
                  $follower_count_query="UPDATE `student` SET follower_count='$no_follower_stored' WHERE id='$_POST[id]' ";
                  $run1=mysqli_query($con,$follower_count_query)or die("dead");
                  }


                }  
                ?>

            </div>
          </div>
        </div>
      </div>
    </section>

    <footer >
      <div class="container">
        <p>Alexander Ritik Copyright &copy, 2019</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </body>
</html>




<?php
include('dbcon.php');
if(isset($_POST['submit']))
{
  if($_POST['submit']=="chat")
  {
$query_chat="INSERT INTO message(sender_id,message,receiver_id,seen) VALUES ('$_SESSION[id]','$_POST[message]','$_POST[search_id]','0') ";
$run_chat=mysqli_query($con,$query_chat) or die('eroor');  
header('location:message.php') ;
  }
}


?>