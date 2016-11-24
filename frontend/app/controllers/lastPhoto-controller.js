angular.module('app').controller('lastPhotoController', ['$scope', '$http', function ($scope,$http) {
  'use strict';

  $scope.statistics = [];
  $scope.statistic = {};

  $http({
  method: 'GET',
  url: '/backend/public/pegaUltimaMedida'
}).then(function successCallback(response) {
    $scope.statistic = response.data;
    $scope.statistic.image = "data:image/jpeg;base64," + $scope.statistic.image;
    console.log($scope.statistic);
  }, function errorCallback(response) {
    alert('call the jao');
  });



}]);
