
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dobble Social Network: Members Page</title>

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

  <header>
    <div class="container">
      <img src="decoration/img/logo.png" class="logo" alt="">
      <form class="form-inline">
        <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">Email address</label>
          <input type="text" class="form-control" id="exampleInputEmail3" placeholder="search name" name="search">
        </div>
         <button type="submit" class="btn btn-default">Search</button><br>
       
      </form>
    </div>
  </header>



    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="user_index.php">Home</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="groups.html">Groups</a></li>
            <li><a href="photos.html">Photos</a></li>
            <li><a href="profile.php">Profile</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="members">
              <h1 class="page-header">Members</h1>
               <?php
                  include('dbcon.php');
                  $qu="SELECT * FROM student ";
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
                   ?>
              <div class="row member-row">
                <div class="col-md-3">
                  <a href="profile_visit.php"><img src="profile_pic/<?php echo$image_visit;?>" class="img-thumbnail" alt=""></a>
                  <div class="text-center">
                    <?php echo $profilevisit; ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <p><button class="btn btn-default btn-block"  class="open-button" onclick="openForm()">Chat</button></p>
                </div>
                
                <div class="col-md-3">
                <p><a class="btn btn-primary" href="#"><?php echo" ",$follower_count," ";?><br> follower</a></p>
                </div>
                <div class="col-md-3">
                <form method="post">
                <p><input type="submit" name="submit" value="follow" class="btn btn-primary"></p>
                <input type="hidden" name="id" value="<?php echo$profile_id;?>">
                <input type="hidden" name="count" value="<?php echo$follower_count;?>">
                </form>
                </div>
              </div>
                                <div class="chat-popup" id="myForm">
                                <form action="/action_page.php" class="form-container">
                                <h1>Chat</h1>

                                <label for="msg"><b>Message</b></label>
                                <textarea placeholder="Type message.." name="msg" required></textarea>

                                <button type="submit" class="btn">Send</button>
                                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
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
                     $i++;
                     }
                     ?>
                <?php
                if(isset($_POST['submit']))
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
                ?>

            </div>
          </div>
          <div class="col-md-4">
            
                <div class="clearfix"></div>
               
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">Latest Groups</h3>
              </div>
              <div class="panel-body">
                <div class="group-item">
                  <img src="img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group One</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <div class="group-item">
                  <img src="img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group Two</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <div class="group-item">
                  <img src="img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group Three</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <a href="#" class="btn btn-primary">View All Groups</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>Alexander Ritik Copyright &copy, 2019</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
