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
window.DashApp = angular.module('dash_app', ['ui.router', 'ngResource', 'ngSanitize', 'ui.bootstrap'])
    .config(['$stateProvider', '$urlRouterProvider', '$locationProvider',
        function($stateProvider, $urlRouterProvider, $locationProvider) {
            $locationProvider.html5Mode(true);
            baseRoute = '/member/'
            if (currentUser.is_buyer && currentUser.is_maker) {
                $urlRouterProvider.otherwise(baseRoute + 'buyer/index');
                $stateProvider.state('buyer', {
                    template: JST[path + 'buyer/base']
                }).state('maker', {
                    url: baseRoute + 'maker',
                    template: JST[path + 'maker/base']
                });
            } else if (currentUser.is_buyer) {
                $urlRouterProvider.otherwise(baseRoute + 'buyer/index');
                $stateProvider.state('buyer', {
                    controller: 'buyerCtrl',
                    template: JST[path + 'buyer/base']
                });
            } else if (currentUser.is_maker) {
                $urlRouterProvider.otherwise(baseRoute + 'maker/index');
                $stateProvider.state('maker', {
                    url: baseRoute + 'maker',
                    controller: 'makerCtrl',
                    template: JST[path + 'maker/base']
                });
            }

            $stateProvider
                .state('logout', {
                    url: 'user/logout',
                    controller: function() {
                        document.location.href = baseUrl + '/user/logout';
                    }
                })
                .state('buyer.profile', {
                    url: baseRoute + 'buyer/profile',
                    template: JST[path + 'buyer/profile/_index'],
                    controller: 'IndexProfileCtrl'
                })
                .state('maker.profile', {
                    url: baseRoute + 'maker/profile',
                    template: JST[path + 'maker/profile/index'],
                    controller: 'IndexProfileCtrl'
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
                .state('buyer.view_project', {
                    url: baseRoute + 'buyer/project/:id/:slug',
                    template: JST[path + 'buyer/project/_view'],
                    controller: 'ViewProjectCtrl'
                })
                .state('buyer.favorites', {
                    url: baseRoute + 'buyer/favorites',
                    template: JST[path + 'buyer/project/favorites'],
                    controller: 'ListFavoritesCtrl'
                }).state('buyer.reviews', {
                    url: ''
                })
                .state('buyer.preview_project', {
                    url: baseRoute + 'buyer/preview-project/:id',
                    template: JST[path + 'buyer/project/_preview'],
                    controller: 'PreviewProjectCtrl'
                })
                .state('buyer.search_projects', {
                    url: baseRoute + 'search/q/:search_entry',
                    template: JST[path + 'buyer/search/_results'],
                    controller: 'SearchCtrl'
                })
        }
    ])
    .config(function($httpProvider) {
        //add a transformRequest to preprocess request
        $httpProvider.defaults.transformResponse.push(function(res) {
            //resolving $rootScope manually since it's not possible to resolve instances in config blocks
            if (typeof res.alert != 'undefined') {
                $('notification').attr('type', res.alert.type);
                $('notification .message-description').html(res.alert.message);

                $('notification').show();
                setTimeout(function() {
                    $('notification').hide();
                }, 5000);

            } else
                return res;
        });
    });