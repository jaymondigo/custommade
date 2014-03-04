DashApp.factory('Project', ['$resource',
    function($resource) {
        return $resource(baseUrl + '/project/:id', null, {
            'update': {
                method: 'PUT'
            }
        });
    }
])
    .factory('User', ['$resource',
        function($resource) {
            return $resource(baseUrl + '/user/:id', null, {
                'update': {
                    method: 'PUT'
                }
            });
        }
    ])
    .factory('Search', ['$resource',
        function($resource) {
            return $resource(baseUrl + '/search/raw-data?q=:q', null, {
                'update': {
                    method: 'PUT'
                }
            });
        }
    ])