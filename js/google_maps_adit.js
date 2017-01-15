	var geocoder;
	var map;
	var latlng;
	
  	initialize();
	
	
	
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var lat = parseFloat(document.getElementById("latitude").value);
		var lng = parseFloat(document.getElementById("longitude").value);
		var latlng = {lat:lat, lng:lng};
		var mapOptions = {
		  zoom: 10,
		  center: latlng
		}
			
		map = new google.maps.Map(document.getElementById("map_adit"), mapOptions);
		
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			title: 'Hello World!'
		  });
		
		google.maps.event.addListener(map, 'click', function(event) {
			latlng = event.latLng;
			$('#latitude').val(latlng.lat());
			$('#longitude').val(latlng.lng());
			addMarker(event.latLng, map);
		});

	};

	function addMarker(location, map) {
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
	};

	function codeAddress() {
		var lat = document.getElementById("latitude").value;
		var lng = document.getElementById("longitude").value;
		var latlng = {lat:parseFloat(lat), lng:parseFloat(lng)};

		
		geocoder.geocode( { 'location': latlng}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			
			var marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location
			});
			$("#address").val(results[0].formatted_address);
		  } else {
			alert("Geocode was not successful for the following reason: " + status);
		  }
		});
	};



