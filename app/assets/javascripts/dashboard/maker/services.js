App.factory('data', ['db',function(db){
		var materials = db({'url' : 'materials'}).query();
		var suppliers = db({'url' : 'suppliers'}).query();
 		return {
 				'materials':materials,
 				'suppliers' : suppliers
 				}; 
	}
]);  