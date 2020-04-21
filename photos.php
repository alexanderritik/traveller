
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dobble Social Network: Photos Page</title>

    <!-- Bootstrap core CSS -->
    <link href="decoration/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="decoration/css/style.css" rel="stylesheet">
    <link href="decoration/css/font-awesome.css" rel="stylesheet">
    <link href="decoration/css/ekko-lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>

  
  <h1 style="color: black; "><b>&nbsp&nbsp&nbsp<a href="user_index.php">TRAVELLER</a></b></h1>
  <hr>
    <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Upload a meme</h3>
                    </div>
                    <div class="panel-body">
                      <form action="uploadmeme.php" method="post" enctype="multipart/form-data">
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

    <section>
           <div class="w3-row" id="myGrid" style="margin-bottom:128px">
  <div class="w3-third">
    
  </div>  
      <?php
      include('dbcon.php');
      $qu="SELECT * FROM meme ";
      $run=mysqli_query($con,$qu);

      while($ro=mysqli_fetch_array($run))
      {

      $meme_image=$ro['image'];
      $comment=$ro['comment'];
      $uploader_id=$ro['id_by'];
      $query="SELECT * FROM student WHERE id='$uploader_id'";
       $run1=mysqli_query($con,$query);
         //$con file we used to include data base connection
      $row1=mysqli_num_rows($run1);
       if($row1!=0)
       {     
       $go1=mysqli_fetch_assoc($run1);
       
       $name_of_uploader=$go1['name'];
       } 

                   ?>              


  <div class="w3-third">
  <img src="meme/<?php echo$meme_image;?>"style="max-height: 550px;max-width: 500px;">
      
   </div>


                <?php
              }
              ?>
                   
   <hr>           
</div>


            </ul>
          
    </section>   <footer>
      <div class="container">
        <p>Alexander Copyright &copy, 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="decoration/js/bootstrap.js"></script>
    <script src="decoration/js/ekko-lightbox.js"></script>
    <script>
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      }); 
      $(function () {
      $('[data-hover="tooltip"]').tooltip()
      })
    </script>
  </body>
</html>
