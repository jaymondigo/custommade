window.DashApp = angular.module('dash_app', ['ui.router','ngResource','ngSanitize']);

DashApp.config(['$stateProvider', '$urlRouterProvider','$locationProvider',
	function ($stateProvider, $urlRouterProvider,$locationProvider) {
		$urlRouterProvider.otherwise('/maker');
		$locationProvider.html5Mode = true;

		// $stateProvider
		// 	.state('maker');
}]);