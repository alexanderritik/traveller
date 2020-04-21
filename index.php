
</!DOCTYPE html>
<html>
<?php               //for avoid to login again
    session_start();
  if(isset($_SESSION['id']))
{

header('location:user_index.php');
}
 else
{
 

}
?>
<head>
  <title></title>

<body>



<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRAVELLER</title>

</head>


<style >
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('decoration/static/img/about-bg.jpg');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: auto;
  border-radius: 2rem;
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
  cursor: text;
  /* Match the input under the label */
  border: 3px solid transparent;
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

.avatar {
  position: relative; right: -160px; top: -20px;
  vertical-align: right;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  
}

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}

</style>

<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container" >
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
            <h3 class="login-heading mb-4" tyle="font-weight:bold" align="text-center" > TRAVELLER !</h3>
              
              <img src="decoration/static/img/avatar.png" alt="Avatar" class="avatar" >
              <form action="index.php" method="post" id="submitForm" >
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                  <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">show password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" id="login" type="submit" name="submit" value="submit" >Sign in</button>
                <div id="error"></div>

                <div class="text-center">
                  <a class="small" href="new_user.php">New user</a></div>
                  <a class="small" href="forgot_password.php">Forgot password?</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script >

  $(document).ready(function(){
    
  //  console.log('show passord');
    $('#customCheck1').click(function(){
  console.log(this);
     $(this).is(':checked')? $('#inputPassword').attr('type','text') : $('#inputPassword').attr('type','password');
    });
  


 let login=$('#login');
  $('#submitForm').on('submit',function(e){
    e.preventDefault();
   login.text("Connecting ..");
   let email=$('#inputEmail').val();
   let password=$('#inputPassword').val();
            $.ajax({
                  url:"login.php",
                  method:"POST",
                  data:{password:password,email:email},
                  dataType:"json",      
                  success:function(data)
                     {  
                      //console.log("checking")
                            if(data.check==0)
                            {
                              let option={
                              distance:'40',
                              time:'2',
                              direction:'left'
                              }
                              $('#inputPassword').val('');
                              $('#submitForm').effect("shake",option);
                              $('#login').text("Login");
                              $('#error').html("<span class='text-danger'>Invalid Username or Password</span>")
                              $('#error').fadeOut(5000);
                            }
                            else{
                               //console.log('good');
                               $('#login').text("Login");
                                window.location.replace('user_index.php');           
                            }
           
                      }
                  });
   
           });
 });
</script>

  


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

