<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRAVELLER</title>

    <link href="decoration/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="decoration/css/style.css" rel="stylesheet">
    <link href="decoration/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<body>
	<h1 align="center" ><a href="user_index.php">Following</a></h1>
	
      <ul>
	<?php 
   $search_get_id = $_GET['var'];
   
	session_start();
   include('dbcon.php');
   $following_id=0;
   $query2="SELECT * FROM follow_unfollow WHERE   following_id='$search_get_id'";
   $run2=mysqli_query($con,$query2);
   //$con file we used to include data base connection
   $row2=mysqli_num_rows($run2);
   $row3=$row2;
   $row4=$row2;
   while($row2!=0)
   {     
   $go2=mysqli_fetch_assoc($run2);
   $following_id++;
   $followed_id[$row2]=$go2['follower_id'];
   //echo $go2['following_id'];
   $row2--;   
   }
   
   while($row3>0)
   {
   
   $get_id=$followed_id[$row3];
   //echo $get_id;
   #for get the name of one who posted the id
   $query8="SELECT * FROM student WHERE id='$get_id'";
   $run8=mysqli_query($con,$query8);
     //$con file we used to include data base connection
  $row8=mysqli_num_rows($run8);
   if($row8!=0)
   {     
   $go8=mysqli_fetch_assoc($run8);
   $following_of_id=$go8['id'];
   $name_of_id=$go8['name'];
   $image_of_id=$go8['image'];
   
   }
   //echo $_SESSION['id']," ";
   //echo $following_of_id;
   //to check wether that id is following  to session id or not
   $query12="SELECT * FROM follow_unfollow WHERE   follower_id='$_SESSION[id]' && following_id='$following_of_id'";
   $run12=mysqli_query($con,$query12);
   //$con file we used to include data base connection
   $row12=mysqli_num_rows($run12);
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
	
         
        <div class="w3-col m12">
          <hr>
                  <form method="post">
                  <p>

                  <a href="profile_visit.php?var=<?php echo $get_id ?>"><img src="profile_pic/<?php echo$image_of_id;?>" align="Center" alt="" style="height:60px;width:60px" ></a>  
                  <button class="btn btn-primary" style="background-color: green;" align="right" ><a href="profile_visit.php?var=<?php echo $get_id ?>"><?php echo $name_of_id; ?></a></button> 
                  
                  <input type="hidden" name="following_of_id" value="<?php echo$following_of_id?>">	
                  
                <?php
                  if($following_of_id!=$_SESSION['id'])
                  {
                 ?>
                  <input type="submit" id="<?php echo $get_id ?>" name="submit" value="<?php 
                  
                   if($check_the_following==1)
                   {
                   echo"unfollow";
                   } 
                   else
                   {
                    echo "follow";
                   }
                 

                  ?>" class="btn btn-primary" >
               <?php
                }
                ?>
                  </form>
                  </p> 
                          
          </div>
      
      
   <?php 
  

   $row3--;
   }

    ?>

  </ul>
</body>
</html>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
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