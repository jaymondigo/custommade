DashApp.factory('Project', ['$resource',
    function($resource) {
        return $resource(baseUrl + '/project/:id', null, {
            'update': {
                method: 'PUT'
            }
        });
    }
])