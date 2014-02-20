window.DashApp = angular.module('dash_app', ['ui.router','ngResource','ngSanitize']);

currentUser = JSON.parse($('div[user]').attr('user'));
path = 'dashboard/partials/';
baseUrl = '/member/';

DashApp.config(['$stateProvider', '$urlRouterProvider','$locationProvider',
	function ($stateProvider, $urlRouterProvider,$locationProvider) {
		
		$locationProvider.html5Mode(true);

		if(currentUser.is_buyer==1&& currentUser.is_maker==1){
			$urlRouterProvider.otherwise(baseUrl+'buyer');

			$stateProvider
				.state('buyer',
					{
						url:baseUrl+'buyer',
						controller: 'buyerCtrl',
						template: JST[path+'buyer/base']
					})
				.state('maker',
					{
						url: baseUrl+'maker',
						controller: 'makerCtrl',
						template: JST[path+'maker/base']
					});
		}
		else if(currentUser.is_buyer==1){
			$urlRouterProvider.otherwise(baseUrl+'buyer');

			$stateProvider
				.state('buyer',
					{
						url:baseUrl+'buyer',
						controller: 'buyerCtrl',
						template: JST[path+'buyer/base']
					});
		}
		else if(currentUser.is_maker==1){
			$urlRouterProvider.otherwise(baseUrl+'maker');		
			$stateProvider
				.state('maker',
					{
						url: baseUrl+'maker',
						controller: 'makerCtrl',
						template: JST[path+'maker/base']
					});
		}
 }]);