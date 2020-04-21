<!DOCTYPE html>
<html>

<body>


<head>
  <?php session_start(); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRAVELLER</title>
</head>

<style>
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background: #007bff;
  background: linear-gradient(to right, white, grey);
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-img-left {
  width: 45%;
  /* Link to your background image using in the property below! */
  background: scroll center url('decoration/img/home-bg.jpg');
  background-size: cover;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}
</style>

<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">

          <div class="card-img-left d-none d-md-flex">
           <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" action="new_user.php" id="submitform" action="error.php" method="POST">
              
              <div class="form-label-group">
                <input type="text" id="inputUserame" class="form-control" name="name" placeholder="Username" required autofocus>
                <label for="inputUserame">Username</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required>
                <label for="inputEmail">Email address</label>
                <span id="availability" ></span>
              </div>
              
         

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              
             
              
              <div class="form-label-group">
                <input type="text" id="number" class="form-control" placeholder="phone number" name="phone" required>
                <label for="number">Phone Number</label>
              </div>
              
              <div class="form-label-group">
                <input type="text" id="inputabout" class="form-control" name="about" placeholder="About your taste" required>
                <label for="inputtaste">About</label>
              </div>
               
              

              <input class="btn btn-lg btn-primary btn-block text-uppercase"  name="submit" id="submit" value="submit" type="submit">
              </form>
              <hr>
              <a class="d-block text-center mt-2 small" href="index.php">Sign In</a>
            
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verification code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="verifyblock">
        <!-- <div class="spinner-border text-primary"  style="width: 5rem; height: 5rem;" role="status">
  <span class="sr-only">Sending OTP...</span>
</div> -->
        <form id="otp" method="POST" >
            <div class="form-group form-group-lg">
              <input id="verifyCode" type="text" align="text-center" class="form-control" name="verifyCode" required>
              <br>
             <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          
        </form>
      
      </div>
      <div id="givecreateid" class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<!-- created new id notification -->
<!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your ID is succesfully created on Traveller : The social website
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-primary">login </a>
      </div>
    </div>
  </div>
</div> -->
<!-- closing of notification of id -->

</body>
</html>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script>
  $(document).ready(function(){
      let newdata;
      let output,email;
        //console.log('hello');
        $('#inputEmail').blur(function(){
               email=$(this).val();
              //console.log(email)
              $.ajax({
                url:"checkemail.php",
                method:"POST",
                data:{email:email},
                dataType:"json",
                success:function(data)
                  {
                   newdata =data;
                   output='';
                   $('#availability').html(output);
                    //console.log(newdata)
                    if(data.check==1)
                    {
                   output +=`<li id="licheck" class="text-danger" >email already found </li>`;
                    }
                    else{
                    output +=`<li id="licheck" class="text-success">email availabile</li>`;
                    }
                    $('#availability').html(output);

                    $('#licheck').on('click',function(){
                    $('span li').fadeOut({
                      duration:1000
                    })

                    })
                  }
              });
        });
 
 $('#submitform').on('submit',function(e){  
   //console.log("submit"); 
   e.preventDefault();

   
   if(newdata.check==1)
   {
   output =`<li class="text-danger" >email already found </li>`;
   $('#availability').html(output);
   e.preventDefault();
   $('#inputEmail').val(" ")
   }
   
   else
   {
    $('#myModal').modal('show');
    let checkemail=" ";
          $.ajax({
            url:'sendEmail.php',
             method:"POST",
             data:{email:email},
             dataType:"json",
             success:function(data){
              if(data.check==1)
              {
                // console.log("otp is sent");
        //        $('#verifyblock').html(`<form id="otp" method="POST" >
        //     <div class="form-group form-group-lg">
        //       <input id="verifyCode" type="text" align="text-center" class="form-control" name="verifyCode" required>
        //       <br>
        //      <input type="submit" class="btn btn-primary" value="Submit">
        //     </div>
          
        // </form>`);
          checkemail+=`<div class="alert alert-alert" role="alert">Otp is sent</div>`
              
              }
              else
              {
                checkemail+=`<div class="alert alert-alert" role="alert">send otp error</div>`
              }
              $('#givecreateid').css("display", "block");
              $('#givecreateid').html(checkemail).fadeOut(5000);

             }
          
          })
           // console.log("new email id");
   }

   });


  $('#otp').on('submit',function(e){
           e.preventDefault();
           
           // console.log('submitted otp');
           let otp= $('#verifyCode').val();
           console.log(otp);
              $.ajax({
                  url:"checkotp.php",
                  method:"POST",
                  data:{otp:otp},
                  dataType:"json",      
                  success:function(data)
                  { 
                    console.log(data);
                    if(data.check==1)
                    {
                        // console.log("id is creating");
                        let email=$('#inputEmail').val();
                        let name=$('#inputUserame').val();
                        let password=$('#inputPassword').val();
                        let phoneno=$('#number').val();
                        let about=$('#inputabout').val();
                        // console.log(name,email,password,phoneno,about);
                        $.ajax({
                        url:"otp.php",
                        method:"POST",
                        data:{name:name,password:password,phoneno:phoneno,email:email,about:about},
                        dataType:"text",      
                        success:function(data)
                        { 
                        // console.log("created id")
                        $('#inputEmail').val("");
                        $('#inputUserame').val("");
                        $('#inputPassword').val("");
                        $('#number').val("");     
                        $('#inputabout').val("");                          
                        }
                        })
                    $('#verifyblock').html(`<tr><th><div class="spinner-grow text-success" role="status"><span class="sr-only">Loading...</span></div></th><th><h4 style="color:red">Your Id is created</h4></th><th><div class="spinner-grow text-success" role="status"><span class="sr-only">Loading...</span></div></th></tr>`);
                    }
                    else
                    {
                      $('#givecreateid').css("display", "block");
                       $('#givecreateid').html('<div class="alert alert-primary" role="alert">Oops Otp is wrong</div>').fadeOut(8000);
                    }
               
                  }

              })
                      })

  });
</script>
