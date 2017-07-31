<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		.table-bordered{
			border:solid black 1px;
		}
		.alert-success{
			text-align: center;
			position: absolute;
			padding: 20px;
			top:1px;
		}
		.color{
			background: #CCCCFF;
			height: 50px;
			text-align: center;
			line-height: 50px;
			font-weight: bold;
			border-radius: 15px 15px 0px 0px;
		}
		.pagination{
			margin-top: 0px;
			margin-bottom: 0px;
		}
		.btn-primary{
			margin-top: 0px;
			margin-bottom: 0px;	
		}
		{
			text-decoration: none;
			color: black;
		}
		a, a:hover {
			text-decoration: none;
			color: black;
		}
		h3{
			text-align: right;
		}
	</style>
</head>
<body>
	<div class="container">
		<div>
		<h3>
			@include('demoValidate.notice')
			<a href="{{asset('logout')}}" class="glyphicon glyphicon-off" style="margin-left: 10px;"></a>
		</div>
		<div class="color " style="clear:both;">DANH SÁCH THÀNH VIÊN</div>
			<div class = 'wrap'>
				<table class="table table-hover table-bordered ">
			  		<thead>
			  			<tr>
			  				<th style="text-align: center;">ID</th>
			  				<th style="text-align: center;">UserName</th>
			  				<th style="text-align: center;">Fullname</th>
			  				<th style="text-align: center;">Email</th>
			  				<th style="text-align: center;">Action</th>
			  			</tr>
			  		</thead>
			  		<tbody>
					  	@foreach($users as $user)
			  			<tr>
			  				<td style="text-align: center;">{{$user->id}}</td>
			  				<td style="text-align: center;">{{$user->username}}</td>
			  				<td style="text-align: center;">{{$user->fullname}}</td>
			  				<td style="text-align: center;">{{$user->email}}</td>
			  				<td style="text-align: center;">
			  					<div style="text-align: center;"><a href="{{asset('edit/'.$user->id)}}"><span style="margin-right: 10px;color: black;"  class="glyphicon glyphicon-pencil"></span></a>
			  				   		<a onclick="return confirm('are you ready?');" href="{{asset('delete/'.$user->id)}}"><span style="color: black;"  class="glyphicon glyphicon-trash"></span></a>
			  				   </div></td>
			  			</tr>
			  			@endforeach
			  		</tbody>
				</table>
				<div>
					<div class="col-md-1" style="margin-left: -15px;" ><a class="btn btn-primary" href="{{asset('add')}}">AddUser</a></div>
					<div class="col-md-3 col-md-offset-8">{{ $users->links() }}</div>
				</div>
		</div>
	</div>
</body>
</html>
<script>
$(document).ready(function(){
        $(".alert-success").slideUp(3000);
});
</script>