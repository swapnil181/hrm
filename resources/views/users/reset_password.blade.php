<!DOCTYPE html>
<html>
<head>
  <title></title>
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
      <link href="{{asset('js/jquery-validate1.19.0.js')}}" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


</head>
<body style="background-color: lightgrey">

<div class="form-gap"></div>
<div class="container" style="margin-top: 150px;">
	<div class="row ">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h2 class="text-center">Reset password</h2>
                  <div class="panel-body">
    
                    <form id="register-form"  class="form" method="post" 
                    action="{{ url('setNewPassword') }}">
    
                      <div class="form-group">
                        <div class="input-group">
                       </div>
                       <div class="form-group">
                           <input type="password" class="form-control" placeholder="Confirm Password" id="password" name="password" required>
                           <span id="passwordMsg"></span>
                       </div>
                       <div class="form-group">
                           <input type="password" class="form-control" placeholder="Re-enter Password" id="confirm_password" name="password_confirmation" required>
                       </div>
                       <div class="form-group">
                           <input type="hidden" class="form-control" placeholder="Password" name="token" value="{{$token}}" >
                       </div>

                       </div>
                         
                         <div>
                           <input type="hidden" id="email" name="email"
                           value="{{$email}}" class="form-control">

                        </div>

                      </div>
                      <div class="form-group">
                        <input class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit" onclick="validatePassword()">
                      </div>
                      
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

</body>
<script>
  function validatePassword(){
    // alert("ok")
      var password=$('#password').val();
       // alert(password)
      var reg=/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
      if(reg.test(password)){
      // alert("true")
      return true;
      }
      else{
      // alert("truesf")
      $('#password').css("border","2px solid red");
      $('#passwordMsg').html("<p>Password should contain one uppercase char, one number, one special character and length 8 chars</p>")
      return true;
      }
    };
    $(document).ready(function(){
      $('#register-form').validate({
        rules:{
          confirm_password:{
            required:true,
          },
        }
      })
    } )
</script>
</html>


