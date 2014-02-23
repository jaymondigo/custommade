DashApp.filter('dateToISO', function() {
  return function(badTime) {
  	if(typeof badTime != 'undefined'){
	    var goodTime = badTime.replace(/(.+) (.+)/, "$1T$2Z");
	    return goodTime;
	}
  };
});