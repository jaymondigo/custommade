DashApp
    .controller('mainCtrl', ['$scope', '$state', 'User', '$location',
        function($scope, $state, User, $location) {
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

            User.get({
                    id: 'me'
                }, {},
                function(data) {
                    $scope.rawUserData = data;
                    $scope.currentUser = angular.copy($scope.rawUserData);
                });

            $scope.search = function(entry) {
                $location.path('member/search/q/' + entry);
            }

        }
    ])
    .controller('IndexProfileCtrl', ['$scope', '$templateCache', '$modal',
        function($scope, $templateCache, $modal) {
            $templateCache.put('sidebar-view', JST[path + 'buyer/sidebar']);

            //Date formats
            $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'shortDate'];
            $scope.format = $scope.formats[0];
            $scope.maxDate = new Date();

            $scope.edit = function() {
                // $scope.editActive = !$scope.editActive; 
                var modalInstance = $modal.open({
                    template: JST[path + 'buyer/profile/_edit'],
                    controller: 'EditProfileModalCtrl',
                    resolve: {
                        currentUser: function() {
                            return $scope.currentUser;
                        }
                    }
                });
            }

        }
    ])
    .controller('EditProfileModalCtrl', ['$scope', '$modalInstance', 'currentUser',
        function($scope, $modalInstance, currentUser) {
            $scope.user = angular.copy(currentUser);
            $scope.cancel = function() {
                $modalInstance.dismiss('cancel');
            };
            $scope.update = function() {
                $scope.user.$update();
                currentUser = $scope.user;
            }
        }
    ])
    .controller('makerCtrl', ['$scope',
        //maker controllers
        function($scope) {}
    ])
    .controller('buyerCtrl', ['$scope', '$templateCache',
        //buyer controllers
        function($scope, $templateCache) {
            $templateCache.put('sidebar-view', JST[path + 'buyer/sidebar']);
        }
    ])
    .controller('ListProjectCtrl', ['$scope', 'Project',
        function($scope, Project) {
            $scope.projects = Project.query();

            $scope.delete = function(project, i) {
                project.$delete({
                    id: project.id
                });
                $scope.projects.splice(i, 1);
            }
        }
    ]).controller('NewProjectCtrl', ['$scope', '$templateCache', '$location', 'Project',
        function($scope, $templateCache, $location, Project) {
            $scope.$parent.navs.projects.childNavs = [{
                state: 'buyer.new_project',
                label: 'New',
                icon: 'icon-pencil'
            }];

            $scope.project = Project.get({
                id: 'create'
            });

            $scope.hasPhotos = false;

            $scope.create = function(project) {
                project.type = 'draft';
                project.$save(function(data) {
                    $location.path(baseRoute + 'buyer/preview-project/' + data.id)
                });
            }

            $scope.saveDraft = function(project) {
                project.type = 'draft';
                project.$save(function(data) {
                    $location.path(baseRoute + 'buyer/projects');
                });
            }
        }
    ])
    .controller('PreviewProjectCtrl', ['$scope', '$location', 'Project', '$stateParams',
        function($scope, $location, Project, $stateParams) {
            id = $stateParams.id;
            $scope.project = Project.get({
                id: id
            });

            $scope.publish = function(project) {
                project.type = 'published';
                Project.update({
                    id: project.id
                }, project, function(data) {
                    $location.path(baseRoute + 'buyer/projects');
                });
            }
        }
    ])
    .controller('ViewProjectCtrl', ['$scope', '$stateParams', 'Project',
        function($scope, $stateParams, Project) {
            id = $stateParams.id;
            $scope.project = Project.get({
                id: id
            });

            $scope.edit = function(project) {

            }
        }
    ])
    .controller('SearchCtrl', ['$scope', '$stateParams', 'Search', '$templateCache',

        function($scope, $stateParams, Search, $templateCache) {

            entry = $stateParams.search_entry;
            $scope.results = Search.query({
                q: entry
            });

        }
    ])