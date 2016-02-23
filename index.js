/**
 * Created by Yacine on 19/02/2016.
 */

var myApp = angular.module('myApp', []);

myApp.controller('mainController', function($scope, $http){
    $scope.sondages = data;

    $scope.villes = [];

    $scope.user = {sexe:"option1"};

    $scope.connect = function(){
      data = {
          email:$scope.connect.email,
          password:$scope.connect.password
      };

        $http({
            method:'POST',
            url:'connection.php',
            data:data
        })
    };

    $scope.addUser = function(){
        data = {
            email:$scope.user.email,
            password:$scope.user.password,
            sexe:$scope.user.sexe,
            pseudo:$scope.user.pseudo,
            codePostal:$scope.user.codePostal,
            ville:$scope.user.ville.id,
            dateNaissance:$scope.user.dateNaissance
        };

        $http ({
            method:'POST',
            url:'script.php',
            data:data
        }).success(function(data){

        });
    }

    $scope.getVille = function(){
        //$model.user.ville $connect-> $scope.user.codePostal

        data = {
            codePostal:$scope.user.codePostal
        };

        $http({
            method:'POST',
            url:'afficherVille.php',
            data:data
        }).success( function(data_result){
            $scope.villes = data_result;
        });

    }
});

myApp.directive('afficherSondage', function(){
    return {
        templateUrl:'afficherSondage.html'
    }
});