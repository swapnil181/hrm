
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>   
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        /* ... */
    </style>
</head>

<body>
    <a href="employee_dashboard" class="btn btn-danger">Employee Dashboard</a>
	<div class="container-fluid" style=" margin-top: 20px; width: 800px">

  {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
    </div>
    
</body>
</html>