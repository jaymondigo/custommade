currentUser = JSON.parse($('div[user]').attr('user'));
path = 'dashboard/partials/';
baseUrl = '/member/';

window.DashApp = angular.module('dash_app', ['ui.router','ngResource','ngSanitize'])

.config(['$stateProvider', '$urlRouterProvider','$locationProvider',
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

		$stateProvider
			.state('list_project', {
				url: baseUrl+'projects', 
				template: JST[path+'buyer/project/_lists'],
				controller: 'ListProjectCtrl'
			})
			.state('create_project',
			{
				url: baseUrl+'create-project',
				template: JST[path+'buyer/project/_create'],
				controller: 'NewProjectCtrl'
			})
			.state('edit_project', {
				url: baseUrl+'edit-project/:id',
				template: JST[path+'buyer/project/_edit'],
				controller: 'EditProjectCtrl'
			});

 }]);