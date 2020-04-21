 <?php
 $output =null;
 $seen=0;
 session_start();
include('dbcon.php');
$search_get_id =$_GET['id'];
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
$name_of_person=$go13['name'];
   }

$output .='<table style="position:fixed">
            <tr>
               <th>
               <h1 style="color:#C70039;padding-bottom:5px;margin-left:10px;" >'.$name_of_person.'&nbsp&nbsp</h1>
               </th>
               <th>
               <h6 style="align:left" id="typing"></h6>
               </th>
           <tr>
           </table>';


$output .='<input  type="hidden" id="talking_to" name='.$search_get_id.'  >';   
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
  
   if($send_sender_id==$search_get_id )
   {
   
   $output.='<div class="incoming_msg">
              
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>'.$message.'</p>
                  <span class="time_date">'.$time.'</span></div>
              </div>
            </div>';


      
      // echo $receiver_id,"-",$_SESSION['id'];
         if($receiver_id==$_SESSION['id'])
         {
         $qry6=" UPDATE `message` SET seen='1' WHERE id='$message_id' ";   
         $result6=mysqli_query($con,$qry6);
         }
      
   }
 if( $receiver_id==$search_get_id)
 {
 $output.='<div class="outgoing_msg">
              <div class="sent_msg">
                <p>'. $message.'</p>
                <span class="time_date">'.$time.'</span> </div>
            </div>';


 }


$row--;
}
 


$output.='<p align="left">';
          if($seen==1)
           {
            $output .="seen";
           }
           $output.='</p>';

echo $output;
?>