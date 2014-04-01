pubApp.directive('ensureUnique', ['$http',
    function($http) {
        return {
            require: 'ngModel',
            link: function(scope, ele, attrs, c) {
                scope.$watch(attrs.ngModel, function() {
                    $http({
                        method: 'POST',
                        url: '/user/is-unique',
                        data: {
                            'field': attrs.ensureUnique,
                            value: $(ele).val()
                        }
                    }).success(function(data, status, headers, cfg) {
                        check2 = scope.oldEmail == $(ele).val().trim();

                        if (check2)
                            ds = true;
                        else
                            ds = data.isUnique;

                        c.$setValidity('unique', ds);
                    }).error(function(data, status, headers, cfg) {
                        c.$setValidity('unique', false);
                    });
                });
            }
        }
    }
]);

pubApp.directive("passwordVerify", function() {
    return {
        require: "ngModel",
        scope: {
            passwordVerify: '='
        },
        link: function(scope, element, attrs, ctrl) {
            scope.$watch(function() {
                var combined;

                if (scope.passwordVerify || ctrl.$viewValue) {
                    combined = scope.passwordVerify + '_' + ctrl.$viewValue;
                }
                return combined;
            }, function(value) {
                if (value) {
                    ctrl.$parsers.unshift(function(viewValue) {
                        var origin = scope.passwordVerify;
                        if (origin !== viewValue) {
                            ctrl.$setValidity("passwordVerify", false);
                            return undefined;
                        } else {
                            ctrl.$setValidity("passwordVerify", true);
                            return viewValue;
                        }
                    });
                }
            });
        }
    };
});