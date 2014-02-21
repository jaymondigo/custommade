DashApp
.controller('mainCtrl', ['', function(){
	
}])
//maker controllers
.controller('makerCtrl', ['$scope', function($scope){
	
}])

//buyer controllers
.controller('buyerCtrl', ['$scope','$templateCache',
 function($scope, $templateCache){   
 	$templateCache.put('sidebar-view', JST[path+'buyer/sidebar']);  
 	$templateCache.put('content-main', JST[path+'buyer/page-index']);
 	
}])
.controller('ListProjectCtrl', ['$scope', 
	function($scope){

	}
])