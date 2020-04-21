<?php 
  $output=null;
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
  
   $login_check=$go8['login_check'];
   }
	
        
    $output .='<div class="w3-col m12">
              <hr>
              <tr>
                <p align="left">
                </th>
                  <span class="dot" ';
                          if($login_check==0) 
                             {
                            $output.='style="background-color:red" ';
                            }
                             else
                             {
                           $output.='style="background-color:green" ';
                             }  

      $output .='>
              </span>
              </th>
                  <a href="profile_visit.php?var='.$get_id.'"><img src="profile_pic/'.$image_of_id.' " align="Center" alt="" style="height:30px;width:30px" ></a>  
                  </th>
                  <th>
                  <a href="profile_visit.php?var='.$get_id.'"><button class="btn btn-primary" align="right" >'.$name_of_id.'</button> </a>     
                  </p> 
                  </th>
                  </tr>
                          
          </div>';
      
      
    // <a href="chat.php?var='.$get_id.'"></a>
   $row3--;
   }
   echo $output;
 ?>
