<!DOCTYPE html>
<html>


<?php 
session_start();
if (isset($_SESSION['id'])) {
$login_check=1;
}
else
{
  header('location:index.php');
}

?>


  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dobble Social Network: Profile Page</title>

    <!-- Bootstrap core CSS -->
    <link href="decoration/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="decoration/css/style.css" rel="stylesheet">
    <link href="decoration/css/font-awesome.css" rel="stylesheet">

    <!---so this is another template-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  </head>
<style >
  
  .dot
  {
   height: 25px;
   width: 25px;
   background-color: green;
   border-radius: 50%;
   display: inline-block;
  }
</style>
  <body>
<?php
  include('dbcon.php');
   $query="SELECT * FROM student WHERE id='$_SESSION[id]'";
   $run=mysqli_query($con,$query);
     //$con file we used to include data base connection
  $row=mysqli_num_rows($run);
   if($row!=0)
   {     
   $go=mysqli_fetch_assoc($run);
   
   $image=$go['image'];
   }

  #FOR POST DATABASE
   $post_count=0;
   $query1="SELECT * FROM post WHERE  id_by='$_SESSION[id]'";
   $run1=mysqli_query($con,$query1);
     //$con file we used to include data base connection
  $row1=mysqli_num_rows($run1);
   while($row1!=0)
   {     
   $go1=mysqli_fetch_assoc($run1);
   $post_count++;
   $row1--;
   }


   #for following and follow in data base
   #follower_id is the one who is following
   #following id is the one who get followed
   
   $following_id=0;
   $query2="SELECT * FROM follow_unfollow WHERE   follower_id='$_SESSION[id]'";
   $run2=mysqli_query($con,$query2);
     //$con file we used to include data base connection
   $row2=mysqli_num_rows($run2);
   while($row2!=0)
   {     
   //$go1=mysqli_fetch_assoc($run2);
   $following_id++;
   $row2--;
   }
 ?> 
  

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
            <h1>Traveller</h1>
            <li class="active"><a href="user_index.php">Home</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="groups.html">Groups</a></li>
            <li><a href="photos.php">Meme</a></li>
            <li><a href="profile.php">Profile</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="profile">
              <h1 class="page-header"><?php echo $go['name']; ?></h1>
              <div class="row">
                <div class="col-md-4">

                  <img src="profile_pic/<?php echo$image;?>" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-8">
                  <ul>
                    <li><strong>Name:</strong><?php echo $go['name']; ?></li>
                    <li><strong>Email:</strong><?php echo $go['email']; ?></li>
                    <li><strong>Boarder:</strong><?php  
                                             if($go['home']==1)
                                             {
                                              echo "Hosteller";
                                             } 
                                             else
                                             {
                                              echo "Day Scholar";
                                             }

                                             ?> </li>
                    <li><strong>State:</strong><?php echo"Uttar pradesh"; ?></li>
                    <li><strong>Branch:</strong><?php  $branch=$go['branch'];

                                                         if($branch==1)
                                                      {
                                                          echo "Computer science and engineering";
                                                      } 
                                                          else if($branch==2)
                                                      {
                                                          echo "Electronics and communication";
                                                      } 
                                                         else if($branch==3)
                                                      {
                                                          echo "electrical engineering";
                                                      } 
                                                      else  if($branch==7)
                                                        {
                                                          echo "mechanical engineering";
                                                        }   
                                                        else  if($branch==4)
                                                        {
                                                          echo "civil engineering";
                                                        }                
                                               else  if($branch==5)
                                                        {
                                                          echo "nursing";
                                                        }   

                                                        else  
                                                        {
                                                          echo "paramedial";
                                                        }                
                                              ?></li>
                    <li><strong>DOB:</strong><?php echo $go['day'];echo"/";echo $go['month'];echo"/";echo $go['year'];?></li>
                    <h4></h4>
                    <li><a class="btn btn-primary" href="profile_post.php"><?php echo " ",$post_count," "; ?><br>post</a>&nbsp&nbsp&nbsp<a class="btn btn-primary" href="follower.php"><?php echo " ",$go['follower_count']," "; ?><br>follower</a>&nbsp&nbsp&nbsp<a class="btn btn-primary" href="following_list.php"><?php echo " ",$following_id," "; ?><br>following</a></li>
                  </ul>
                </div>
              </div><br><br>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Upload a post</h3>
                    </div>
                    <div class="panel-body">
                      <form action="uploadimage.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                          <input type='file' id="imgInp" name="img" required="required" />
                          <div>
                          <img id="avatar" src="#" alt="your image" class="img-thumbnail" width="250" height="250" />
                          </div>
                          <script >function readURL(input) {
                          if (input.files && input.files[0]) {
                          var reader = new FileReader();

                          reader.onload = function(e) {
                          $('#avatar').attr('src', e.target.result);
                          }

                          reader.readAsDataURL(input.files[0]);
                          }
                          }

                          $("#imgInp").change(function() {
                          readURL(this);
          2                });</script>
                          <h3></h3>
                          <input type="text" size="40" name="description" class="form-control" placeholder="description" required="required">
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Your confession</h3>
                    </div>
                    <div class="panel-body">
                      
                        <div class="form-group">
                          <textarea class="form-control" ><?php  
                                                          $confession="You do not have a notification";
                                                          if (isset($go['confession'])) 
                                                          {
                                                           echo $go['confession']; # code...
                                                          }
                                                          else
                                                          {
                                                            echo $confession;
                                                          }
                                                          ?>

                        </textarea>
                       </div>
                        <form action="report.php" method="POST">
                        <input type="hidden" name="name" value="<?php echo$go['cp'];?>" >
                        <input type="hidden" name="name1" value="<?php echo$go['confession'];?>">
                        <input type="hidden" name="name2" value="<?php echo$go['name'];?>">
                        <input type="hidden" name="name3" value="<?php echo$go['email'];?>">
                        <button type="submit" class="btn btn-default" name="report" value="report">Report</button>
                      
               
                        </form>
                        
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Send confession</h3>
                    </div>
                    <div class="panel-body">
                      <form action="confessionpage.php" method="POST">
                        <div class="form-group">
                          <textarea class="form-control" name="message" placeholder="Send a message to correct someone"></textarea>
                          <h3></h3>
                          <input type="text" name="name" placeholder="enter the name of the user">
                        </div>
                         <input type="hidden" name="name3" value="<?php echo$go['email'];?>">
                        <button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="col-md-4">
              
              <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
              <div class="panel-heading">
              <h3 class="panel-title">Search Friends</h3>
              </div>
              <div class="panel-body">
              
              <form class="form-inline">
              <div class="form-group">
              <label class="sr-only" for="exampleInputEmail3">Email address</label>
              <input type="text" class="form-control" id="exampleInputEmail3" placeholder="search name" name="search">
              </div>
              <h4></h4> 
              <button type="submit" class="btn btn-default">Search</button><br>
              </form>
              </div>
              </div>
              </br>


              <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">My Friends</h3>
              </div>
              <div class="panel-body">
                <ul>
                  <?php
                  $qu="SELECT * FROM student ";
                  $run3=mysqli_query($con,$qu);
                  $i=1;
                  
                  while($ro=mysqli_fetch_array($run3))
                    {
                      if($i<=5)
                      {
                     $image_visit=$ro['image'];
                     $profilevisit=$ro['name'];
                     $login_check=$ro['login_check']; 
                   ?>

                  <li class="thumbnail"><img src="profile_pic/<?php echo$image_visit;?>" alt=" "></li>
                  <?php
          

                     }
                     $i++;
                     }
                     ?>

                </ul>
                <div class="clearfix"></div>
                <a class="btn btn-primary" href="#">View All Friends</a>
              </div>
            </div>
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
        <p>Alexannder Copyright &copy, 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
