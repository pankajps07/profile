<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#dbf0f0">


<section >
  <div class="container mt-5" style="width: 500px; " align="center">
    <div class="card-deck">
      <div class="card">
        <h3 class="card-header text-center text-success">Admin Login</h3>
        <div class="card-body">
          <div ng-app="app" ng-controller="control">

   <form name="form" novalidate>
    <input type="text" name="user" ng-model="user" placeholder="Enter username" class="form-control p-2" required>
    <span class="text-danger" ng-show="form.user.$touched && form.user.$invalid || form.user.$untouched && form.user.$invalid">
    <span ng-show="form.user.$error.required" class="text-danger">The username is required.</span>
    </span>

    <input type="password" name="password" ng-model="password" placeholder="Enter password" class="form-control p-2" required=""> <br>
     <span class="text-danger" ng-show="form.password.$touched && form.password.$invalid || form.password.$untouched && form.password.$invalid">The password is required.</span>
<br>
    <button ng-disabled="form.user.$untouched && form.user.$invalid || form.password.$untouched && form.password.$invalid " class="btn btn-primary mt-2 w-50" type="submit" ng-click="onsubmit()">Login</button>
   </form>

<a href="login.php">Don't Have an Account</a>
  </div>
        </div>
      </div>
    </div>



  </div>
</section>
 <script src="assets/vendor/jquery/jquery.min.js"></script>
 <script src="assets/js/popper.min.js"></script>
 <script src="assets/js/angular.min.js"></script>
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>		
</body>
</html>

<script>
  var app=angular.module("app",[]);
  app.controller("control",function($scope,$http){
    var user=$scope.user;
   var mobile=$scope.mobile;
    var password=$scope.password;
   
    $scope.onsubmit=function(){
      $http.post("loguser.php",{'user':$scope.user,'password':$scope.password}).then(function(response){
      var res=response.data;
      if(res==1){
        alert(res);
        window.location.replace("home.php");
      }else{
        alert("no");
        }
      // location.replace("index.html");
    });
    }
  });
</script>
