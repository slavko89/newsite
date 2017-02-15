	var geocoder;
	var map;
	var latlng;
	var markers = [];

	function initialize() {
		geocoder = new google.maps.Geocoder();
		var lat = parseFloat(document.getElementById("latitude").value);
		var lng = parseFloat(document.getElementById("longitude").value);
		var latlng = {lat:lat, lng:lng};
		var mapOptions = {
		  zoom: 10,
		  center: latlng
		};
			
		map = new google.maps.Map(document.getElementById("map_edit"), mapOptions);
		
		addMarker(latlng);
		
		google.maps.event.addListener(map, 'click', function(event) {
			latlng = event.latLng;
			deleteMarkers();
			$('#latitude').val(latlng.lat());
			$('#longitude').val(latlng.lng());
			addMarker(event.latLng);
			codeAddress(latlng);
		});

	};

	function addMarker(location) {
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
		markers.push(marker);
	};

	function codeAddress(latlng) {
			
		geocoder.geocode( { 'location': latlng}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			
			$("#address").val(results[0].formatted_address);
		  } else {
			alert("Geocode was not successful for the following reason: " + status);
		  }
		});
	};
	
	function deleteMarkers() {
		clearMarkers();
		markers = [];
	}
	function clearMarkers() {
		setMapOnAll(null);
	}
	function setMapOnAll(map) {
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
	}




