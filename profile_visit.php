<!DOCTYPE html>
<html>
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
  <body>
<table>
  <tr>
    <td>
  <h1 style="color: black; "><b>&nbsp&nbsp&nbsp<a href="user_index.php">TRAVELLER</a></b></h1>
  </td>
 
  </td>
</tr>
</table>
  <hr>


<?php
session_start();
    $serach_id = $_GET['var'];

?>
<?php
  include('dbcon.php');
   $query="SELECT * FROM student WHERE id='$serach_id'";
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
   $query1="SELECT * FROM post WHERE  id_by='$serach_id'";
   $run1=mysqli_query($con,$query1);
     //$con file we used to include data base connection
  $row1=mysqli_num_rows($run1);
   while($row1!=0)
   {     
   $go1=mysqli_fetch_assoc($run1);
   $post_count++;
   $row1--;
   }

   $query12="SELECT * FROM follow_unfollow WHERE  follower_id='$_SESSION[id]' && following_id='$serach_id'";
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

   #for following and follow in data base
   #follower_id is the one who is following
   #following id is the one who get followed
   
   $following_id=0;
   $query2="SELECT * FROM follow_unfollow WHERE   follower_id='$serach_id'";
   $run2=mysqli_query($con,$query2);
     //$con file we used to include data base connection
   $row2=mysqli_num_rows($run2);
   while($row2!=0)
   {     
   //$go1=mysqli_fetch_assoc($run2);
   $following_id++;
   $row2--;
   }

 $follower_id=0;
   $query3="SELECT * FROM follow_unfollow WHERE   following_id='$serach_id'";
   $run3=mysqli_query($con,$query3);
     //$con file we used to include data base connection
   $row3=mysqli_num_rows($run3);
   while($row3!=0)
   {     
   //$go1=mysqli_fetch_assoc($run2);
   $follower_id++;
   $row3--;
   }


 ?> 
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
                    <li><p>crazy about the WORLD</p></li>
                    
                    <hr>
                    <li><a class="btn btn-primary" href="searched_post_list.php?var=<?php echo $serach_id ?>"><?php echo " ",$post_count," "; ?><br>post</a>&nbsp&nbsp&nbsp<a class="btn btn-primary" href="searched_follower_list.php?var=<?php echo $serach_id ?>"><?php echo " ",$follower_id," "; ?><br>follower</a>&nbsp&nbsp&nbsp<a class="btn btn-primary" href="searched_follwing_list.php?var=<?php echo $serach_id ?>"><?php echo " ",$following_id," "; ?><br>following</a></li>
              <br>
                    <?php
                      if($_SESSION['id']!=$serach_id)
                   {
                      ?>
                    <form method="post" >
                    
                  
                 <p><input type="submit" id="<?php echo $serach_id; ?>" name="submit" value="<?php 
                   
                   if($check_the_following==1 )
                   {
                   echo"unfollow";
                   } 
                   else
                   {
                   echo"follow";
                   }
                   
                  ?>" class="btn btn-default btn-block" style="background-color: white;width: 250px;"></p>
                  <input type="hidden" name="id" value="<?php echo$serach_id ;?>">
                <input type="hidden" name="count" value="<?php echo" ";?>">
              
                </form>
                <?php 
              }
              ?>
                  </ul>
                </div>
              </div><br><br>
              
              
              
            </div>

          </div>
           <div class="col-md-4" >
              
              <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">Suggestions</h3>
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
                      if($i<=5)
                      {
                     $profile_id_visit=$ro['id'];
                     $image_visit=$ro['image'];
                     $profilevisit=$ro['name'];
                     $login_check=$ro['login_check']; 
                   ?>

                  <li class="thumbnail"><a href="profile_visit.php?var=<?php echo $profile_id_visit;?>"><img src="profile_pic/<?php echo$image_visit;?>" style="max-width: 70px;max-height: 50px;" alt=" " ></a></li>
                  <?php
          

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
    
    <script src="js/bootstrap.js"></script>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

      <script >
  $(document).ready(function(){
   $('form').on('submit',function(e){
    //console.log("clicked")
    e.preventDefault();
   })

   $('input[name="submit"]').on('click',function(){ 

    //console.log('You clicked button with ID:' + this.id);
     let selectedId=this.id;
     let check=$('#'+selectedId).val();
   console.log(check)
   if(check=="unfollow")
   {
     $('#'+selectedId).val("follow");
   

    $.ajax({
                url:"unfollow.php",
                method:"POST",
                data:{id:selectedId},
                dataType:"text",
                success:function(){
                console.log("deleted")
                }
    })

  }
  else 
  {
  $('#'+selectedId).val("unfollow");
  console.log("inserting")
      $.ajax({
                url:"follow.php",
                method:"POST",
                data:{id:selectedId},
                dataType:"text",
                success:function(){
               console.log("inserted")
                }
    })
  
  }



    }); 
  
    })
</script>