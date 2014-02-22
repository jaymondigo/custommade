DashApp.controller('mainCtrl', ['$scope', '$state',
    function($scope, $state) {
        $scope.$on('$locationChangeStart', function(scope, next, current) {
            reloadScripts($('base').attr('href') + '/assets/plugin.js');
        });
        $scope.state = $state;
        $scope.navs = {
            activites: {
                state: 'buyer.index',
                label: 'Activities',
                icon: 'icon-globe'
            },
            projects: {
                state: 'buyer.projects',
                label: 'Projects',
                icon: 'icon-file'
            },
            favorites: {
                state: 'buyer.favorites',
                label: 'Favorites',
                icon: 'icon-heart'
            },
            reviews: {
                state: 'buyer.reviews',
                label: 'Reviews',
                icon: 'icon-thumbs-up'
            }
        };
    }
])
//maker controllers
.controller('makerCtrl', ['$scope',
    function($scope) {}
])
//buyer controllers
.controller('buyerCtrl', ['$scope', '$templateCache',
    function($scope, $templateCache) {
        $templateCache.put('sidebar-view', JST[path + 'buyer/sidebar']);
    }
]).controller('ListProjectCtrl', ['$scope',
    function($scope) {}
]).controller('NewProjectCtrl', ['$scope', '$templateCache', 'Project',
    function($scope, $templateCache, Project) {
        $scope.$parent.navs.projects.childNavs = [{
            state: 'buyer.new_project',
            label: 'New',
            icon: 'icon-pencil'
        }];
        $scope.project = Project.get({
            id: 'create'
        });

        $scope.hasPhotos = false;
        
        $scope.create = function(project){
            project.$save();
        }
    }
])