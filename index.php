<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" ng-app="app" ng-controller="ctrl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <?php include "assets/csslink.php"?>
    <style>
       .loginpage{
        width: 500px;
        transform: translate(380px,150px);
       } 
    </style>
</head>

<body  >
   <section class="loginpage">
       <div class="card-deck" style="width: 500px">
           <div class="card">
            <h4 class="card-header text-primary text-center">Signup Page</h4>
               <div class="card-body">
                    <form name="form" novalidate>
    <input type="email" name="email" ng-model="email" placeholder="Enter Email" class="form-control p-2" required>
    <span class="text-danger" ng-show="form.email.$touched && form.email.$invalid || form.email.$untouched && form.email.$invalid">
    <span ng-show="form.email.$error.required" class="text-danger">The email is required.</span>
    <span ng-show="form.email.$error.email" class="text-danger">Invalid Email</span>
    </span>

     <input type="text" name="mobile" ng-model="mobile" placeholder="Enter Mobile" class="form-control p-2" required>
    <span class="text-danger" ng-show="form.mobile.$touched && form.mobile.$invalid || form.mobile.$untouched && form.mobile.$invalid">
    <span ng-show="form.mobile.$error.required" class="text-danger">The mobile is required.</span>
    </span>

    <input type="password" name="password" ng-model="password" placeholder="Enter Password" class="form-control p-2" required="">
     <span class="text-danger" ng-show="form.password.$touched && form.password.$invalid || form.password.$untouched && form.password.$invalid">The password is required.</span>
<br>
    <button ng-disabled="form.email.$untouched && form.email.$invalid || form.password.$untouched && form.password.$invalid || form.email.$error.required || form.email.$error.email " class="btn btn-primary mt-2 w-50" type="submit" ng-click="onsubmit()">Submit</button>
   </form>


<a href="login.php">Already Have an Account</a>

               </div>
           </div>
       </div>
   </section>
   <?php include "assets/jslink.php"?>
    <script src="assets/js/jquery.min.js"></script>
     <script src="assets/js/angular.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<script>
  var app=angular.module("app",[]);
  app.controller('ctrl',function($scope,$http){
    var email=$scope.email;
    var mobile=$scope.mobile;
    var password=$scope.password;
    
    $scope.onsubmit=function(){
      $http.post("signup.php",{'email':$scope.email,'mobile':$scope.mobile,'password':$scope.password}).then(function(response){
      var res=response.data;
      if(res==1){
         alert("Registered Successfully");
         window.location.replace("login.php");
      }else if(res==3){
        
          alert("Already Created");
                  

        }else{
          alert("something Went Wrong")
        }
    });
    }
  });
</script>