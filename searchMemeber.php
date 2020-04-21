<?php 
include('dbcon.php');
if(isset($_POST["query"]))
{
	$output='';
	$qu="SELECT * FROM student WHERE name LIKE '%$_POST[query]%' ";
    $run=mysqli_query($con,$qu);
    $output='<ul class="list-unstyled">';
   if(mysqli_num_rows($run)>0)
   {
    while($row=mysqli_fetch_array($run))
    {
    	$output .='<a href="profile_visit.php?var='.$row["id"].'"<li>'.$row["name"].'</li></a><br>';
    }
   }
   else
   {
   	$output .='<li>no user Found</li>';
   }
}
$output .='</ul>';
echo $output;

?>