
<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if (isset($_SESSION['id'])) 
{
}
else
{
  header('location:index.php');
}

?>

<?php
#for checking user is online or ogline
  include('dbcon.php');    
  $qry6=" UPDATE `student` SET login_check='1' WHERE id='$_SESSION[id]' ";   
  $result6=mysqli_query($con,$qry6);
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <style>
      .padit
      {
        padding-left: 100px;
      }
      .dot {
                height: 15px;
                width: 15px;
               position: top:20px;
                border-radius: 70%;
                display: inline-block;
                }

    html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
    </style>
  </head>

<?php
  
  //to find user details
  $query="SELECT * FROM student WHERE id='$_SESSION[id]'";
  $run=mysqli_query($con,$query);
     //$con file we used to include data base connection
  $row=mysqli_num_rows($run);
   if($row!=0)
   {     
   $go=mysqli_fetch_assoc($run);
   
   $image=$go['image'];
   }

  //to count post of user
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



   //to count following of user 
   #for following and follow in data base
   #follower_id is the one who is following
   #following id is the one who get followed
   $follower_id=0;
   $following_id=0;
   $query2="SELECT * FROM follow_unfollow WHERE   follower_id='$_SESSION[id]'";
   $run2=mysqli_query($con,$query2);
     //$con file we used to include data base connection
   $row2=mysqli_num_rows($run2);
   while($row2!=0)
   {     
   //$go1=mysqli_fetch_assoc($run2);
   $follower_id++;
   $row2--;
   }


  // for follower count in database
   $query3="SELECT * FROM follow_unfollow WHERE   following_id='$_SESSION[id]'";
   $run3=mysqli_query($con,$query3);
     //$con file we used to include data base connection
   $row3=mysqli_num_rows($run3);
   while($row3!=0)
   {     
   //$go1=mysqli_fetch_assoc($run2);
   $following_id++;
   $row3--;
   }

 ?> 
<body  class="w3-theme-l5">

  <!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <p class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Traveller LOGO</p>
  <!-- <img src="profile_pic/<?php echo$image?>" class="w3-circle" style="height:23px;width:23px" alt="Avatar"> -->
  <a href="facemash.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="message.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="notifications.php" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>

    </div>
  
  </div>
 <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"   title="LOGOUT"><i class="glyphicon glyphicon-log-out" ></i></a>



 </div>

</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="profile.php" class="w3-bar-item w3-button w3-padding-large">VIew Profile</a>
  <a href="message.php" class="w3-bar-item w3-button w3-padding-large">Message</a>
  <a href="photos.php" class="w3-bar-item w3-button w3-padding-large">Meme</a>
  <a href="quora.php" class="w3-bar-item w3-button w3-padding-large">Quora</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
</div>
<hr>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $go['name']; ?>&nbsp&nbsp&nbsp&nbsp<button  type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">edit</button></h4>

         <p class="w3-center"><img id="changeimg" src="profile_pic/<?php echo$image;?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>

         <hr>
         <tr>&nbsp&nbsp&nbsp<a class="btn btn-warning" style="padding-left: 10px" href="profile_post.php"><?php echo " ",$post_count," "; ?> <br/>post </a>&nbsp<a class="btn btn-primary" href="follower.php"><?php echo " ",$following_id," "; ?><br/> follower </a>&nbsp<a class="btn btn-success" href="following_list.php"><?php echo " ",$follower_id," "; ?><br/> following</a></tr>

         <p><br>&nbsp<i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo " ",$go['about']," "; ?></p>
         
        </div>
      </div>
      <br>

                            <div id="dataModal" class="modal fade">  
                              <div class="modal-dialog">  
                                   <div class="modal-content">  
                                        <div class="modal-header">  
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                             <h4 class="modal-title">Employee Details</h4>  
                                        </div>  
                                        <div class="modal-body" id="employee_detail">  
                                        </div>  
                                        <div class="modal-footer">  
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                        </div>  
                                   </div>  
                              </div>  
                         </div>  
                         <div id="add_data_Modal" class="modal fade">  
                              <div class="modal-dialog">  
                                   <div class="modal-content">  
                                        <div class="modal-header">  
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                             <h4 class="modal-title">Edit your details</h4>  
                                        </div>  
                                        <div class="modal-body">  
                                           
                                             <label align="Middle">profle pic</label>
                                             <input type='file' id="imageUpload" name="img" required="required" />
                                                  <p class="w3-center"><img id="profileImage" src="profile_pic/<?php echo$image;?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                                                  <div id="uploadit" style="display:none"></div>
                                               
                                                  <script >
                       
                      function fasterPreview( uploader ) {
                      if ( uploader.files && uploader.files[0] ){
                      $('#profileImage').attr('src', 
                      window.URL.createObjectURL(uploader.files[0]) );
                      $('#uploadit').css("display","block");
                      $('#uploadit').html(`<input type="submit" value="submit" class="btn btn-primary" />`);

                      }
                      }
                      $("#imageUpload").change(function(){
                      fasterPreview( this );
                      })
                      
                    </script>
                      
                                                  <br />
                                             <form method="post" id="insert_form">
                                                  <label>change your userName</label>  
                                                  <input type="text" name="name" id="name" class="form-control" />  
                                                  <br />  
                                                   
                                                  <label>About yourself </label>  
                                                  <input type="text" name="designation" id="about" class="form-control" />  
                                                   
                                                  <br />  
                                                  <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                                             </form>  
                                        </div>  
                                        <div class="modal-footer">  
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                        </div>  
                                   </div>  
                              </div>  
                         </div>  
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Your confession</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p><?php  
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
            </p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
         <div id="Demo2" class="w3-hide w3-container">
        <p>Some other text..</p>
          </div>
                                         
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small"><h3 style="color:grey">You have new message</h3><hr>
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <div id="check_new_message"></div>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">  
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Upload a image</h6>
              <form id="uploadimage" method="post" enctype="multipart/form-data" action="uploadimage.php">
                        <div class="form-group">
                          <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
                          <input type='file' id="imgInp" name="img" required="required" />
                          <div>
                          <img id="avatar" src="#" alt="your image" class="img-thumbnail" width="250" height="250" />
                          </div>
                          <script >

                          function readURL(input) {
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
                     });
                   </script>
                          <h3></h3>
                          <input type="text" id="description" size="40" style="max-width: 410px" name="description" class="form-control" placeholder="description" required="required">
                        </div>
                        <button type="submit" name="submit" value="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> &nbsp;Submit</button>
               </form><!-- 
              <form>
              <input contenteditable="true" class="w3-border w3-padding" placeholder="Status: Feeling Blue">&nbsp&nbsp&nbsp
              <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i> &nbsp;Post</button> 
              </form>            -->
            </div>
          </div>
        </div>
      </div>
      
      
<?php 

#for following and follow in data base
   #follower_id is the one who is following
   #following id is the one who get followed
   
   $following_id=0;
   $query2="SELECT * FROM follow_unfollow WHERE   follower_id='$_SESSION[id]'";
   $run2=mysqli_query($con,$query2);
     //$con file we used to include data base connection
   $row2=mysqli_num_rows($run2);
   $row3=$row2;
   while($row2!=0)
   {     
   $go2=mysqli_fetch_assoc($run2);
   $following_id++;
   $followed_id[$row2]=$go2['following_id'];
   $row2--;
   
   }

   $count=1;
   while($row3>0)
    {
       $get_id=$followed_id[$row3];

       $query1="SELECT * FROM post WHERE  id_by='$get_id'";
       $run1=mysqli_query($con,$query1);
       $row1=mysqli_num_rows($run1);
       while($row1!=0)
       {     
       $go123=mysqli_fetch_assoc($run1);
       $id_ofpost[$count]=$go123['id'];
       $count++;
       $row1--;
           }
    
   $row3--;
   }


   $query154="SELECT * FROM post WHERE  id_by='$_SESSION[id]'";
       $run154=mysqli_query($con,$query154);
       $row154=mysqli_num_rows($run154);
       while($row154!=0)
       {     
       $go123=mysqli_fetch_assoc($run154);
       $id_ofpost[$count]=$go123['id'];
       $count++;
       $row154--;
           }
    





   $count1=$count--;

   rsort($id_ofpost);
   $count1=$count1-2;
   
   $tocheck=0;
   while ($tocheck<=$count1) 
  {
    $query1="SELECT * FROM post WHERE  id='$id_ofpost[$tocheck]'";
        $run1=mysqli_query($con,$query1);
   $row1=mysqli_num_rows($run1);
   while($row1!=0)
   {     
   $go1=mysqli_fetch_assoc($run1);
   $unique_id_of_post=$go1['id'];
   $id_of_poster=$go1['id_by'];
   $image_by_id=$go1['image'];
   $comment_post=$go1['comment'];
   $time_of_upload=$go1['time'];
   $post_like=$go1['post_like'];
  
  
            


   $query8="SELECT * FROM student WHERE id='$id_of_poster'";
   $run8=mysqli_query($con,$query8);
     //$con file we used to include data base connection
  $row8=mysqli_num_rows($run8);
   if($row8!=0)
   {     
   $go8=mysqli_fetch_assoc($run8);
   
   $name_of_id=$go8['name'];
   $image_of_id=$go8['image'];
  
?>
   <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <a href="profile_visit.php?var=<?php echo $id_of_poster;?>"><img src="profile_pic/<?php echo$image_of_id;?>" style="max-width: 50px;max-height: 40px;" alt="" class="w3-left w3-circle w3-margin-right" style="width:60px"></a>
        
        <a href="profile_visit.php?var=<?php echo $id_of_poster;?>"><p><?php echo$name_of_id;?> : posted a pic</p><br></a>
        <span class="w3-right w3-opacity"><?php echo$time_of_upload;?></span>
        <hr class="w3-clear">
        
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="post/<?php echo$image_by_id;?>" style="width:100%"  class="w3-margin-bottom">
            </div>
          </div>
          <p><?php echo$comment_post;?></p>
          
          
         <input name="<?php echo $unique_id_of_post; ?>" type="hidden" value="<?php echo $unique_id_of_post; ?>">
         <input name="<?php echo $unique_id_of_post; ?>post" data="to_get_id_of_post" type="hidden" value="<?php echo $id_of_poster; ?>">

          <button id="<?php echo $unique_id_of_post;?>" name="changeclass" value="like" class="w3-button w3-theme-d1  w3-margin-bottom fa fa-thumbs-up" style="min-width: 80px;min-height: 38.2px">&nbsp<span id="<?php echo $unique_id_of_post; ?>no_of_like"><?php echo$post_like;?></span></button>
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> &nbsp;Comment</button>
          
      
      </div>
<?php   
   
}
$row1--;
   }

   $tocheck++;

  }   
?>      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <style >
            .ul{
              background-color: #eee;
              cursor: pointer; 
            }
            .li{
              padding: 12px;
            }
          </style>
         <h2> Search</h2>
      <input  style="max-height:30px;margin-top: 15px;margin-bottom: 15px;border: solid 2px grey;color: blue" type="text" id="search" placeholder="Search on Traveller" aria-label="Search">
       <div id="searchMemeber"></div>
        </div>
      </div>
      <br>
      
      <div id="yourDiv" class="w3-card w3-round w3-white w3-center" style="overflow: auto;  max-height: 260px;min-width: 200px;">
        <h3 style="color: grey;">Online-Offline</h3>
        <div id="online_offline" style="font-size: 10px"></div>
          
      </div>
      <br>
      
     
      </div>
      <br>
      
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer>
      <div class="container">
        <p>Alexander Ritik Copyright &copy, 2019</p>
      </div>
    </footer>


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>




<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
  $(document).ready(function(){

    fetch_message_user();
    function fetch_message_user(){
      $.ajax({
             url:"online_offline.php",
             method:"POST",
             dataType:"text",
             success:function(data){
             $('#online_offline').html(data)
             }
            })  
     }
   
   check_new_message();
 function check_new_message(){
    $.ajax({
         url:"check_new_message.php",
         method:"POST",
         dataType:"text",
         success:function(data){
         // console.log(data);
         $('#check_new_message').html(data)
          if(data=='')
          {
            $('#check_new_message').html('<h4>no new message</h4>')
          }

         }
        }) 
   }



   $('button[name="changeclass"]').on('click',function()
   {
          let id=this.id;
          console.log(id)
          let check_like=$('#'+id).val();
          console.log(check_like);

          let id_of_posted_once=$('input[name="'+id+'post"]').val();
          let id_of_post=$('input[name="'+id+'"]').val();
          console.log("id_of_posted_once",id_of_posted_once,"id_of_post",id_of_post)
          if(check_like=="like")
          {
          $.ajax({     
             url:"insert_like.php",
             method:"post",
             data:{id_of_posted_once:id_of_posted_once,id_of_post:id_of_post},
             dataType:"text",
             success:function(data){
             $('#'+id).toggleClass('fa-thumbs-up fa-thumbs-down');
              console.log("inserted "+data)
              $('#'+id).val("unlike");
               fetch_like(id);
             }
            })
          }
          else
          {
          $.ajax({     
             url:"insert_unlike.php",
             method:"post",
             data:{id_of_posted_once:id_of_posted_once,id_of_post:id_of_post},
             dataType:"text",
             success:function(data){
             $('#'+id).toggleClass('fa-thumbs-down fa-thumbs-up');
              console.log("unlike "+data)
              $('#'+id).val("like");
               fetch_like(id);
             }
            }) 
          }
  

   })

function fetch_like(id)

{

    console.log("fetxh like"+id);
    $.ajax
          ({     
             url:"fetch_like.php",
             method:"post",
             data:{id_of_post:id},
             dataType:"text",
             success:function(data){
            $('#'+id+'no_of_like').text(data);
              console.log("inserted "+data)
               //fetch_like();
             }
            })
      } 





  $('#uploadimage').on('submit',function(e){
  console.log("upload image");
    //e.preventDefault(); 
   $('imgInp').val("");
    $('description').val("");

  })


$('#insert_form').on('submit',function(e){
  e.preventDefault();
  let name=$('#name').val();
  let about=$('#about').val();
  
  $.ajax({
    url:"update.php",
    method:"post",
    data:{name:name,about:about},
    success:function(data){
      console.log("updated",data);
    }
  })

})




  $('#search').on('input',function(){
    let query=$(this).val();
    if(query!='')
    {
     $.ajax({
      url:'searchMemeber.php',
      method:"post",
      data:{query:query},
      success:function(data){
        $('#searchMemeber').fadeIn();
        $('#searchMemeber').html(data);
      }
     })
    }
    else if(query=='')
    {
      $('#searchMemeber').fadeOut();
    }
    else
    {
       $('#searchMemeber').fadeOut();
    }
  })

$(document).on('click','li',function(){

  $('#search').val($(this).text());
  $('#searchMemeber').fadeOut();

})


   setInterval(function(){
  //fetch_like()
  fetch_message_user()
    check_new_message()
   } ,5000)

  



  })

</script>