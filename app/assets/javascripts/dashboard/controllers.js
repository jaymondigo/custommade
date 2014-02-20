DashApp.controller('mainCtrl', ['', function(){
	
}])

DashApp.controller('makerCtrl', ['$scope', function($scope){
	
}]);

DashApp.controller('buyerCtrl', ['$scope','$templateCache',
 function($scope, $templateCache){   
 	$templateCache.put('sidebar-view', JST[path+'buyer/sidebar']);  
 	$templateCache.put('content-main', JST[path+'buyer/page-index']);
 	
}]);