
<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">	
	<title></title>
<style>
	li{
		list-style-type:none; 
	}
</style>	
</head>
<body>
@if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
