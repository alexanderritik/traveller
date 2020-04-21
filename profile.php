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

    <title>TRAVELLER</title>

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
  

  <h1 style="color: black; "><b>&nbsp&nbsp&nbsp<a href="user_index.php">TRAVELLER</a></b></h1>
  <hr>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="profile">
              <h1 class="page-header"><?php echo $go['name']; ?></h1>
              <div class="row">
                <div class="col-md-4">
                      <!--for imag e uploading with clicking in the profile upload -->
                      <style >

                      #imageUpload
                      {
                      display: none;
                      }
                      #profileImage
                      {
                      cursor: pointer;
                      }


                      </style>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                      <img id="profileImage" src="profile_pic/<?php echo$image;?>" style="max-width: 250px;max-height: 230px" class="img-thumbnail" alt=""  >
                      <form method="POST" enctype="multipart/form-data">                 
                        <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required=""  capture >
                        <input  type="submit" name="submit" value="upload" class="btn btn-primary" >
                      </form>
                      <?php
                      if(isset($_POST['submit']))
                    {
                      $image=$_FILES['profile_photo']['name'];

                      $tempname=$_FILES['profile_photo']['tmp_name'];
                      
                      $imgtype=$_FILES['profile_photo']['type'];
                      move_uploaded_file($tempname,"profile_pic/$image");
                      $query="UPDATE `student` SET image='$image' WHERE id='$_SESSION[id]' ";   
                      $run=mysqli_query($con,$query);
                      header('user_index.php');
                      }
                      ?>
                      <script >
                      $("#profileImage").click(function(e) {
                      $("#imageUpload").click();
                      });

                      function fasterPreview( uploader ) {
                      if ( uploader.files && uploader.files[0] ){
                      $('#profileImage').attr('src', 
                      window.URL.createObjectURL(uploader.files[0]) );
                      }
                      }

                      $("#imageUpload").change(function(){
                      fasterPreview( this );
                      });</script>
                </div>
                <div class="col-md-8">
                  <ul>
                    <li><strong><?php echo $go['name']; ?></strong></li>
                    <li><p>crazy about the WORLD</p></li>
                    
                    <hr>
                    <li><a class="btn btn-primary" href="profile_post.php"><?php echo " ",$post_count," "; ?><br>post</a>&nbsp&nbsp&nbsp<a class="btn btn-primary" href="follower.php"><?php echo " ",$go['follower_count']," "; ?><br>follower</a>&nbsp&nbsp&nbsp<a class="btn btn-primary" href="following_list.php"><?php echo " ",$following_id," "; ?><br>following</a></li>
                  </ul>
                </div>
              </div><HR>
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
                     });</script>
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
              <h3 class="panel-title" >Search Friends</h3>
              </div>
              <div class="panel-body">
              
              <form  action="search.php" method="GET">
              <div class="form-group">
              <label class="sr-only" for="exampleInputEmail3">NAME</label>
              <input type="text" class="form-control" id="exampleInputEmail3" name="search_name" placeholder="search name" name="search">
              </div>
              <h4></h4> 
              <button type="submit" class="btn btn-default" name="submit" value="Search">Search</button><br>
              </form>
              </div>
              </div>
              </br>


              <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">Suggestion</h3>
              </div>
              <div class="panel-body">
                <ul>
               <?php
                  $qu="SELECT * FROM student ";
                  $run3=mysqli_query($con,$qu);
                  $i=1;
                  
                  while($ro=mysqli_fetch_array($run3))
                    {
                      $rand=rand(1,2);
                      if($rand==1)
                     {
                      if($i<=8)
                      {
                     $profile_id_visit=$ro['id'];
                     $image_visit=$ro['image'];
                     $profilevisit=$ro['name'];
                     $login_check=$ro['login_check']; 
                   
                      if($profile_id_visit!=$_SESSION['id'])
                     {
                           ?>

                  <li class="thumbnail"><a href="profile_visit.php?var=<?php echo $profile_id_visit;?>"><img src="profile_pic/<?php echo$image_visit;?>" style="max-width: 50px;max-height: 30px;" alt=" " ></a></li>
                  <?php
                     }
                    

                     }
                   }
                     $i++;
                     }

                     ?>
                   </ul>
                
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
