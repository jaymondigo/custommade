var base_url = getBaseURL();
    base_url = base_url.indexOf('localhost') >= 0 ? base_url+'public' : base_url;
App.config(['$routeProvider',
  function($routeProvider,$profile) { 
      $routeProvider.
        when('/', {
          templateUrl: base_url+'/assets/engineer/index.jst',
         controller: 'mainCtrl'
        })//.
    //   when('/architects', {
    //     templateUrl: '/partials/architects/_list.html',
    //     controller: arctsCtrl
    //   }).
    //   when('/engineers', {
    //     templateUrl: '/partials/engineers/_list.html',
    //     controller: engrCtrl
    //   }).
    //   when('/suppliers', {
    //     templateUrl: '/partials/suppliers/_list.html',
    //     controller: supplrCtrl
    //   }).
    //   when('/profile', {
    //     templateUrl: '/partials/dreamers/_profile.html',
    //     controller: profile
    //   }).
    //   otherwise({
    //     redirectTo: '/404'
    //  });
  }]);