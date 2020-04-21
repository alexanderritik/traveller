<?php 
session_start();

include('dbcon.php');

   $following_id=0;
   $query2="SELECT * FROM follow_unfollow WHERE   follower_id='$_SESSION[id]'";
   $run2=mysqli_query($con,$query2);
   //$con file we used to include data base connection
   $row2=mysqli_num_rows($run2);
   $row3=$row2;
   $row4=$row2;
   while($row2!=0)
   {     
   $go2=mysqli_fetch_assoc($run2);
   $following_id++;
   $followed_id[$row2]=$go2['following_id'];
   $row2--;   
   }

   
   while($row3>0)
   {

   $get_id=$followed_id[$row3];
   $query="SELECT * FROM message WHERE (sender_id='$get_id' and receiver_id='$_SESSION[id]') order by id desc ";
   $run=mysqli_query($con,$query);
   $row=mysqli_num_rows($run);

   if($row !=0)
   {
    $go=mysqli_fetch_assoc($run);
    $seen=$go['seen'];
    $message=$go['message'];
  $query8="SELECT * FROM student WHERE id='$get_id'";
   $run8=mysqli_query($con,$query8);
    $row8=mysqli_num_rows($run8);
   if($row8!=0)
   {     
   $go8=mysqli_fetch_assoc($run8);
   $name_of_id=$go8['name'];
   }
  if($seen==0)
  {
    echo '<p class="alert alert-primary" role="alert">'.$message.'
     by&nbsp'.$name_of_id.'<br>
';	
  }
   }
  $row3--;
}

?>