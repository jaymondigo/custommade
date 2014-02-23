//initializations
currentUser = JSON.parse($('script[user]').attr('user'));
path = 'dashboard/partials/';
baseUrl = $('base').attr('href');
var index = 0;
 
window.reloadScripts = function(src) {
    $('[src="' + src + '"]').remove();
    $('#flot-default-styles').remove();
    var scriptElement = document.createElement('script');
    scriptElement.type = 'text/javascript';
    scriptElement.src = src;
    document.getElementsByTagName('head')[0].appendChild(scriptElement);
} 
window.DashApp = angular.module('dash_app', ['ui.router', 'ngResource', 'ngSanitize']).config(['$stateProvider', '$urlRouterProvider', '$locationProvider',
    function($stateProvider, $urlRouterProvider, $locationProvider) {
        $locationProvider.html5Mode(true);
        baseRoute = '/member/'
        if (currentUser.is_buyer == 1 && currentUser.is_maker == 1) {
            $urlRouterProvider.otherwise(baseRoute + 'buyer/index');
            $stateProvider.state('buyer', {
                template: JST[path + 'buyer/base']
            }).state('maker', {
                url: baseRoute + 'maker',
                template: JST[path + 'maker/base']
            });
        } else if (currentUser.is_buyer == 1) {
            $urlRouterProvider.otherwise(baseRoute + 'buyer/index');
            $stateProvider.state('buyer', {
                controller: 'buyerCtrl',
                template: JST[path + 'buyer/base']
            });
        } else if (currentUser.is_maker == 1) {
            $urlRouterProvider.otherwise(baseRoute + 'maker/index');
            $stateProvider.state('maker', {
                url: baseRoute + 'maker',
                controller: 'makerCtrl',
                template: JST[path + 'maker/base']
            });
        }
        $stateProvider
            .state('logout',{
                url: 'session/logout',
                controller:  function(){
                    console.log(baseUrl+'/session/logout');
                    document.location.href = baseUrl+'/session/logout';
                }
            })
            .state('buyer.index', {
                url: baseRoute + 'buyer/index',
                template: JST[path + 'buyer/index'],
                controller: 'buyerCtrl',
            })
            .state('buyer.projects', {
                url: baseRoute + 'buyer/projects',
                template: JST[path + 'buyer/project/_list'],
                controller: 'ListProjectCtrl'
            })
            .state('buyer.new_project', {
                url: baseRoute + 'buyer/create-project',
                template: JST[path + 'buyer/project/_new'],
                controller: 'NewProjectCtrl'
            })
            .state('buyer.edit_project', {
                url: baseRoute + 'buyer/edit-project/:id',
                template: JST[path + 'buyer/project/_edit'],
                controller: 'EditProjectCtrl'
            })
            .state('buyer.view_project',{
                url: baseRoute + 'buyer/project/:id',
                template: JST[path + 'buyer/project/_view'],
                controller: 'ViewProjectCtrl'
            })
            .state('buyer.favorites', {
                url: ''
            }).state('buyer.reviews', {
                url: ''
            })
            .state('buyer.preview_project', {
                url: baseRoute+'buyer/preview-project/:id',
                template: JST[path + 'buyer/project/_preview'],
                controller: 'PreviewProjectCtrl'
            });
    }
]); 
