<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		#wrap{
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div id = "wrap">
			<form method="post">
				{{ csrf_field() }}
			  <div class="form-group row ">    
			    <div class="col-md-6 col-md-offset-3 col-xs-6">
			   @include('demoValidate.notice')
			    	<label for="user">User</label>

			    	<input type="text" class="form-control" id="user" placeholder="User" name="user" value="@if(isset($users_edit[0]->username)) {{$users_edit[0]->username}} @endif">
			    </div>
			  </div>
			  <div class="form-group row">
				   <div class="col-md-6 col-md-offset-3 col-xs-6 ">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="Password" class="form-control col-md-1" id="exampleInputPassword1" placeholder="Password" name="pass" value="@if(isset($users_edit[0]->password)) {{$users_edit[0]->password}} @endif">
				    </div>
			  </div>
			  <div class="form-group row ">    
			    <div class="col-md-6 col-md-offset-3 col-xs-6">
			    	<label for="fullname">Fullname</label>
			    	<input type="text" class="form-control" id="fullname" placeholder="Fullname" name="fullname" value="@if(isset($users_edit[0]->fullname)) {{$users_edit[0]->fullname}} @endif">
			    </div>
			  </div>
			  <div class="form-group row ">    
			    <div class="col-md-6 col-md-offset-3 col-xs-6">
			    	<label for="exampleInputEmail1">Email address</label>
			    	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="@if(isset($users_edit[0]->email)) {{$users_edit[0]->email}} @endif">
			    </div>
			   </div>
			    <div class="form-group row ">
				  <div class="col-md-6 col-md-offset-3 col-xs-6 ">
			  		<input type="submit" class="btn btn-primary" value="edit">
			  	  </div>
			  	</div>
			</form>

		</div>
	</div>
</body>
</html>