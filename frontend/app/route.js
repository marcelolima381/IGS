
angular.module("app").config(['$routeProvider', function($routeProvider){
  $routeProvider
    .when('/', {
        templateUrl: 'app/templates/homepage/index.html',
    })
    .when('/gallery', {
        templateUrl: 'app/templates/gallery/index.html',
        controller: 'GalleryController',
        controllerAs: 'galleryCtrl'
    })
    .when('/graph', {
        templateUrl: 'app/templates/graph/index.html',
        controller: 'GraphController',
        controllerAs: 'graphCtrl'
    })
    .when('/lastPhoto', {
        templateUrl: 'app/templates/lastPhoto/index.html',
        controller: 'lastPhotoController',
        controllerAs: 'lastPhotoCtrl'
    })
  .otherwise({redirectTo: '/'});
}]);

