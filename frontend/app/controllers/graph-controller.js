app.controller('GraphController', ['$scope','$http', function ($scope,$http) {
  'use strict';

  $scope.labels1 = [];
  $scope.data1 = [];
  $scope.data = [];
  $scope.temp = {};
  $scope.tempAir = [];
  $scope.tempMoistureAir = [];
  $scope.tempMoistureGround = [];
  $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];


  $http({
  method: 'GET',
  url: '/backend/public/pegaTodasMedidasComImagens'
}).then(function successCallback(response) {

    $scope.data = response.data;


    for (var i = 0; i < $scope.data.length; i++) {

      $scope.labels1.push($scope.data[i].date);
      $scope.tempAir.push($scope.data[i].temperature);
      $scope.tempMoistureAir.push($scope.data[i].moisture);
      $scope.tempMoistureGround.push($scope.data[i].humidity);
    }

    $scope.data1.push($scope.tempAir);
    $scope.data1.push($scope.tempMoistureAir);
    $scope.data1.push($scope.tempMoistureGround);

    console.log($scope.data1[0]);
    console.log($scope.data1[1]);
    console.log($scope.data1[2]);


    $scope.datasetOverride1 = [
      {
        label: 'Umidade do Solo (%)',
        borderWidth: 3,
        type: 'line'
      },
      {
        label: 'Umidade do Ar (%)',
        borderWidth: 3,
        hoverBackgroundColor: 'rgba(13,255,156,0.4)',
        hoverBorderColor: 'rgba(13,255,156,1)',
        type: 'line'
      },
      {
        label: 'Temperatura (C°)',
        borderWidth: 3,
        hoverBackgroundColor: 'rgba(255,99,132,0.4)',
        hoverBorderColor: 'rgba(255,99,132,1)',
        type: 'line'
      }
    ];

  }, function errorCallback(response) {
    alert('call the jao');
  });
  // temperatura do ar
  // umidade do ar
  // umidade do solo

}]);
