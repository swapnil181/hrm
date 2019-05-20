<!DOCTYPE html>
<html>
<head>
  <title></title>
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

</head>
<body>


<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Enter your email to receive change password link.</p>
                  <div class="panel-body">
    
                    <form id="register-form"  class="form" method="post" 
                    action="{{ url('sendForgotPasswordLink') }}">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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
</html>