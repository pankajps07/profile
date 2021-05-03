<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Home</title>

<?php include "assets/csslink.php"?>

<style>
	.profile
	{
		width: 300px;
		transform: translate(450px, 150px)
	}
</style>

</head>
<body ng-app="app" ng-controller="ctrl">
	<section class="profile">
		<div class="card-deck">
			<div class="card">
				<h4 class="card-header text-center text-success">Profile</h4>
				<div class="card-title" ng-repeat="x in res">
					<strong>Username:{{x.email}}</strong>
					<br>
					<strong>{{x.mobile}}</strong>
				</div>
			</div>
		</div>
	</section>


<?php include "assets/jslink.php"?>	
   <script src="assets/js/angular.min.js"></script>
</body>
</html>

<script>
var app=angular.module("app",[]);
  app.controller("ctrl",function($scope,$http){
			$http.get("display.php")
			.then(function(response){
				$scope.res=response.data;
			});

  });
</script>