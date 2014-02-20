window.DashApp = angular.module('dash_app', ['ui.router','ngResource','ngSanitize']);

currentUser = JSON.parse($('div[user]').attr('user'));

DashApp.config(['$stateProvider', '$urlRouterProvider','$locationProvider',
	function ($stateProvider, $urlRouterProvider,$locationProvider) {
		
		if(currentUser.is_buyer)
			$urlRouterProvider.otherwise('/buyer');
		else if(currentUser.is_maker) 
			$urlRouterProvider.otherwise('/maker');		

		path = 'dashboard/partials/';
		$stateProvider
			.state('buyer',
				{
					url:'/buyer',
					controller: 'buyerCtrl',
					template: JST[path+'buyer/index']
				})
			.state('maker',
				{
					url: '/maker',
					controller: 'makerCtrl',
					template: JST[path+'maker/index']
				});
		$locationProvider.html5Mode = true;
}]);