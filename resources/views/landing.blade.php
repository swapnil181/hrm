<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HRM</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}"/>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>

</head>

<body id="page-top" class="landing-page no-skin-config">
@include('sweet::alert')    
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- <a class="navbar-brand" value="NPRODAX"  href="http://Nprodaxdax.com/">NPRODAX</a> -->

                    <a class="btn btn-success btn-lg" value="NPRODAX"  href="http://nprodax.com/" target="_blank">NPRODAX</a>
    
                </div>
         
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#Reg_Modal1" >Login</button>
                    </ul>
                </div>
            </div>
        </nav>
</div>

<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</section>

<div class="modal fade" id="Reg_Modal1" role="dialog" style="padding: 10px">
   <div class="modal-dialog" >
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center">Employee Login Form</h4>
      
    </div>
    
<div class="ibox-content">
    <div class="row">               
        
        <div class="alert alert-danger" style="display:none"></div>
         @if ($errors->any())
          <div class="alert alert-danger" >
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif 
         <form  id="register">
          
            <div class="form-group"><label>Email</label> 
                
                <input type="email" placeholder="Enter email" 
                    class="form-control" name="email">
            </div>
                
                <div class="form-group"><label>Password</label> 
                    <input type="password" placeholder="********" 
                    class="form-control" name="password">
                </div>
            <div>
                <button class="btn btn-sm btn-primary pull-right"
                 ><strong>Log in</strong>
                </button>
                <label> 
                    <a href="{{ url('forgot_password') }}" >Forgot Password?</a>
            </div>
        </form>
    </div>
                            
    </div>
    </div>
    </div>
    </div>
      </div>
  </div>
</div>
</div>
</div>

<section id="contact" class="gray-section contact">
    <div class="container">
        
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-5">
                <address>
                    <strong><span class="navy">Company name, Inc.</span></strong><br/>
                    Nprodax Technologies private limited,<br/>
                    Balaji Square,1-90/7,level 1,<br/>
                    Hitechcity Main Rd,Madhapur,<br/>
                Hyderabad,Telangana 500081.</br>
                    <abbr title="Phone"></abbr> 
                </address>
            </div>

            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2019 Nprodax</strong>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/wow/wow.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery-validate1.19.0.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
        });

        var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>
<script>
      $(document).ready(function(){
      
       $("#register").validate({
         
          rules: {
             email: {
                 required: true,
                 email: true
             },
             password:{
                required:true,
             }             
         },

        submitHandler:function(form) {

        var formData = $('form').serialize();
        
        // alert(formData)
        $.ajax({
            url: "{{url('login')}}",
            method: 'post',
            data:formData,
            
            success:function(res){
                if(res == "Success") {
                    
                   window.location.href = "admin_dashboard"; 

                }

                else if(res == "Employee"){
                    //  swal({
                    //  title: " Logged in Successfully!",
                    //  type: "success"
                    // });
                    window.location.href = "employee_dashboard";
                }

                else if(res =="fail"){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>'+"Password is incorrect"+'</p>');
                }

                else{
                     $.each(res.errors, function(key, value){
                     $('.alert-danger').show();
                     $('.alert-danger').append('<p>'+value+'</p>');
                        });
                }
            }
                });
            }

          });       
          });                                        
</script>
</body>
</html>
