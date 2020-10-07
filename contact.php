<?php
    session_start();
?>
<html ng-app="notesApp" >
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="./css/styles.css">

        <?php
            include('header.php');
        ?>

       <div ng-controller="MainCtrl as ctrl">
        <form id="ip" ng-submit="ctrl.submit()" name="myForm" onsubmit="return validateForm()">
           <fieldset>
		   
               <legend>Info</legend>
			   <center>
                First Name <input type="text" class='contactSubmit' ng-model="ctrl.user.name" required>

                Last Name <input type="text" class='contactSubmit'>

                Email <input type="email" class='contactSubmit' ng-model="ctrl.user.email" required>
                Address <textarea class='contactSubmit'></textarea>
   
                Query <textarea cols="40" rows="20" class='contactSubmit' ng-model="ctrl.user.query" required></textarea>

                <input type="submit" class='contactSubmit' ng-disabled="myForm.$invalid">
				
			</center>
           </fieldset>
        </form>
        </div>
        <script  src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular.js"></script>
        <script type="text/javascript">
            angular.module('notesApp', [])
            .controller('MainCtrl', [function() {
            var self = this;
            self.submit = function() {
            console.log('User clicked submit with ', self.user);
            };
            }]);
        </script>



<script>
      function validateForm() {
        
        alert("submitted sucessfully!");

      }

    </script>
    </body>
</html>
