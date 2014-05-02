DashApp
    .controller('mainCtrl', ['$scope', '$state', 'User', '$location', '$templateCache',
        function($scope, $state, User, $location, $templateCache) {
            $scope.$on('$locationChangeStart', function(scope, next, current) {
                reloadScripts($('base').attr('href') + '/assets/plugin.js');
            });

            $templateCache.put('sidebar-view', JST[path + 'buyer/sidebar']);

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

            $scope.alerts = [];

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
    .controller('EditProfileModalCtrl', ['$scope', '$modalInstance', 'currentUser', '$modal', '$http',
        function($scope, $modalInstance, currentUser, $modal, $http) {
            $scope.user = angular.copy(currentUser);

            $scope.cancel = function() {
                $modalInstance.dismiss('cancel');
            };

            $scope.changeAvatar = function(ds) {
                var fd = new FormData();
                //Take the first selected file
                fd.append("avatar", ds.files[0]);

                $http.post('/user/upload-avatar', fd, {
                    withCredentials: true,
                    headers: {
                        'Content-Type': undefined
                    },
                    transformRequest: angular.identity
                }).success(function(url) {
                    currentUser.avatar_url['thumb'] = url;
                    $('img.avatar').attr('src', url);
                });
            }

            $scope.update = function() {
                $modalInstance.dismiss('cancel');
                $scope.currentUser = currentUser;
                var user = $scope.user;

                var modalConfirmInstance = $modal.open({
                    template: JST[path + 'buyer/profile/_confirm'],
                    backdrop: 'static',
                    controller: function($scope, $http) {
                        $scope.verified = true;

                        // if (user.fb_id != '')
                        //     confirmation = 'fb-id';
                        // else if (user.google_id != '')
                        //     confirmation = 'google-id';
                        // else
                        confirmation = 'password';

                        $scope.confirmation = confirmation.replace('-', ' ');
                        $scope.confirm_message = 'Please verify your ' + $scope.confirmation + ' to continue';


                        $scope.cancel = function() {
                            modalConfirmInstance.dismiss('cancel');
                        }
                        $scope.verify_password = function(params) {
                            $http.post('user/verify-' + confirmation, {
                                params: params
                            }).success(function(data) {
                                if (data.verified) {
                                    user.$update();
                                    modalConfirmInstance.dismiss('cancel');
                                } else {
                                    $scope.verified = false;
                                }


                            }).error(function(verified) {
                                console.log(data);
                            });
                        }
                    }
                });
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
    ]).controller('ListFavoritesCtrl', ['$scope', 'Project',
        function($scope, Project) {
            $scope.projects = Project.query({
                params: 'favorites'
            });

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
                project.type = 'published';
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
    .controller('EditProjectCtrl', ['$scope', '$templateCache', '$location', 'Project', '$stateParams',
        function($scope, $templateCache, $location, Project, $stateParams) {

            $scope.project = Project.get({
                id: $stateParams.id
            });

            $scope.hasPhotos = false;

            $scope.update = function(project) {
                project.type = 'published';
                project.$update({
                    id: $scope.project.id
                }, function(data) {
                    $location.path(baseRoute + 'buyer/preview-project/' + data.id)
                });
            }

            $scope.saveDraft = function(project) {
                project.type = 'draft';
                project.$update({
                    id: $scope.project.id
                }, function(data) {
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
                project.$update({
                    id: project.id
                }, function(data) {
                    $location.path(baseRoute + 'buyer/projects');
                });
            }
        }
    ])
    .controller('ViewProjectCtrl', ['$scope', '$stateParams', 'Project', '$http',
        function($scope, $stateParams, Project, $http) {
            id = $stateParams.id;
            $scope.project = Project.get({
                id: id
            });

            $scope.edit = function(project) {}

            $scope.markFavorite = function(id) {
                if ($scope.project.is_favorite)
                    return false;
                $http.post('mark-favorite', {
                    project_id: id
                });
                $scope.project.is_favorite = true;
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