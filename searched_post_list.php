<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <?php session_start(); ?>
  <body>
    <div class="container" style="margin-top: 10px">
      <h1 align="center"><a href="user_index.php">POST</a></h1>
  <div class="row">
    <?php
   include('dbcon.php');
   $search_get_id = $_GET['var'];
   $query="SELECT * FROM post WHERE id_by='$search_get_id'";
   $run=mysqli_query($con,$query);
   $row=mysqli_num_rows($run);
   while($row!=0)
   {     
   $go=mysqli_fetch_assoc($run);   
   $post_image=$go['image'];
   $comment_post=$go['comment'];
   $time_post=$go['time'];
   $time_post=explode(' ', $time_post);
   ?>
    <div class="col-md-4 equal-height"><img style="max-height:500px;background-color:#fff;width:100%;border: solid 2px grey;" src="post/<?php echo$post_image?>">
      <div class="row like-comment">
    <div class="col-md-4"><?php echo$comment_post;?>
      
    </div>
    <div class="col-md-2">likes:<?php echo$go['post_like'];?>
      
    </div>
    <p align="center"><div class="col-md-6"><?php echo$time_post[0];?>
    
  </div></p>
</div>
  </div>

    <?php
    $row--;
    }
    ?>


  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>