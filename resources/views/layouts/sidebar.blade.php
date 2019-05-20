<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
            
<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">
            <span>     
                @if(!empty(Auth::user()->profile_photo))
                    <img alt="image" class="img-circle" 
                    src="{{asset('storage')}}/{{Auth::user()->profile_photo}}"
                    width="120" height="120"/>        
                @else
                    <img alt="image" class="img-circle" 
                    src="{{asset('img/profile_small.jpg')}}">
                @endif
            </span>

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
            <span class="block m-t-xs">
                <strong class="font-bold">{{Auth::user()->name}}</strong>
            <b class="caret"></b>
            </span>
            </span> 
        </a>

            <ul class="dropdown-menu animated fadeInRight m-t-xs">
               
            <li><a href="update_profile">Profile</a></li>
                 
                <li class="divider"></li>
                <li><a href="logout">Logout</a></li>
            </ul>
    </div>
            <div class="logo-element">
                Nprodax
            </div>       
            <li>
                <a href="{{ url('profile') }}">
                <i class="fa fa-id-card"></i>Profile</a>
            </li>

            @if(Auth::user()->role=='Employee')

               <li>
                    <a href="leave"><i class="fa fa-plus-square"></i>
                     <span class="nav-label"></span>Request for leaves</a>
                </li> 
                
                <li>
                    <a href="showLeaveDetails"><i class="fa fa-wpforms"></i> <span class="nav-label"></span>Leave Details</a>
                </li>
                
               <!-- <li>
                    <a href="salary_details"><i class="fa fa-money"></i> <span class="nav-label"></span>Salary Details </a>
                </li> -->
                
                <li>
                    <a href="event"><i class="fa fa-birthday-cake"></i> <span class="nav-label"></span>Event Request </a>
                </li>

                <li>
                    <a href="event_details"><i class="fa fa-envelope-open-o"></i> <span class="nav-label"></span>Event Details </a>
                </li>

                <li>
                    <a href="holiday"><i class="fa fa-calendar"></i> <span class="nav-label"></span>Calendar </a>
                </li>
                
                <li>
                    <a href="complaints" ><i class="fa fa-file-text-o"></i> <span class="nav-label"></span>Complaints </a>
                </li>
                
                <li>
                    <a href="promotion"><i class="fa fa-handshake-o"></i> <span class="nav-label"></span>Request for Promotion</a>
                </li>

                <li>
                    <a href="{{ url('promotion_status') }}">
                    <i class="fa fa-handshake-o"></i> 
                    <span class="nav-label"></span>Promotion Status</a>
                </li>
                
                <li>
                    <a href="{{ url('resignation') }}"><i class="fa fa-warning"></i> <span class="nav-label"></span> Request for Resignation </a>
                </li>

                 <li>
                    <a href="{{ url('resignation_status') }}">
                        <i class="fa fa-warning"></i> 
                        <span class="nav-label"></span>Resignation Status</a>
                </li> 
                 
                @endif

                 @if(Auth::user()->role == 'Admin' ||Auth::user()->role == 'EscalationManager' )

                 <li style="list-style: none">
                    <a href="getleave_details">
                        <i class="fa fa-wpforms"></i>
                        <span class="nav-label">     
                        </span> Leave Details </a>       
                </li>
                <li>
                    <a href="{{ url('admin_dashboard') }}" ><i class="fa fa-plus-square"></i>
                     <span class="nav-label"></span>Employee Details</a>
                </li>
                <li>
                    <a href="{{ url('showHolidays') }}">
                    <i class="fa fa-plus-square"></i>
                     <span class="nav-label"></span>Holiday</a>
                </li>
                <li>
                    <a href="{{ url('event_details') }}" ><i class="fa fa-birthday-cake"></i>
                     <span class="nav-label"></span>Event Requests</a>
                </li>
                <li>
                    <a href="{{ url('promotion_details') }}">
                    <i class="fa fa-handshake-o"></i> 
                    <span class="nav-label"></span>Promotion Requests</a>
                </li>

                <li>
                    <a href="{{ url('resignation_details') }}">
                    <i class="fa fa-warning"></i> 
                    <span class="nav-label"></span>Resignation Requests </a>
                </li>
                <!--<li>
                    <a href="complaints" ><i class="fa fa-edit"></i>
                     <span class="nav-label"></span>Complaints</a>
                </li>-->
                 @endif

                @if(Auth::user()->role=='EscalationManager')
                    <li>
                    <a href="showComplaints" ><i class="fa fa-edit"></i>
                     <span class="nav-label"></span>Complaints</a>
                    </li>
                @endif

                @if(Auth::user()->role=='Admin')
                    <li>
                    <a href="complaints" ><i class="fa fa-edit"></i>
                     <span class="nav-label"></span>Complaints</a>
                    </li>
                @endif
            </ul>  
        </div>
    </nav>
</div>
    