
var url = "controllers/data.php?mobile=6584366671";

var data = $.getJSON(url,function(error, data) {
	console.log(data);
	var items = [];
	$.each( data, function( key, val ) {
		console.log(key);
	});
});

console.log(data.response);