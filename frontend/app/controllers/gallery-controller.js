angular.module('app').controller('GalleryController', ['$scope', '$http', function ($scope,$http) {
  'use strict';

  $scope.statistics = [];

  $http({
  method: 'GET',
  url: '/backend/public/pegaTodasMedidasComImagens'
}).then(function successCallback(response) {
    $scope.statistics = response.data;
    var concatenar = 'data:image/jpeg;base64,';
      for(var i = 0; i < $scope.statistics.length;i++){

          $scope.statistics[i].image =  concatenar.concat($scope.statistics[i].image);
      }
  }, function errorCallback(response) {
    alert('call the jao');
  });



}]);
