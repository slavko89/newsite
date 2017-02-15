	var geocoder;
	var map;
	var mark;
	var latlng;
	var markers = [];
	var locations = [];
	var bermudaTriangle = "";
	var poly;
	var coordinate = {lat:40.24124234, lng:23.34324234};
	
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var latlng = {lat:49.92293545449574, lng:25.345458984375};
		var mapOptions = {
		  zoom: 10,
		  center: latlng
		};
			
		map = new google.maps.Map(document.getElementById("map_poster"), mapOptions);
		 var mark = new google.maps.Marker({
			position: latlng,
			map: map
			});
		
	};

	function drawPoligon(){
		locations = [];
		deleteMarkers();
		if(bermudaTriangle != ""){
			bermudaTriangle.setMap(null); 
		}
		google.maps.event.addListener(map, 'click', function(event) {
		locations.push({lat:event.latLng.lat(), lng:event.latLng.lng()});
		tringl();
		
		bermudaTriangle.addListener('click', function (event) {
        if (mark && mark.setPosition) {
          mark.setPosition(event.latLng);
          } else {
          mark = new google.maps.Marker({position: event.latLng, map:map});
            }
  
    });		
		});
	}
	function addMarker(location) {
	
		var image = {
			url: 'image/dot.png',
			scaledSize: new google.maps.Size(5, 5)
		}
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			icon:image
		});
		markers.push(marker);
		locations.push({lat:location.lat(), lng:location.lng()});
		tringl();
		
	}

	function tringl(){
		if(bermudaTriangle != ""){
			bermudaTriangle.setMap(null); 
		}
		bermudaTriangle = new google.maps.Polygon({
			map:map,
			paths: locations,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#FF0000',
			fillOpacity: 0.35
		  });
			
		  
	}
	
	
	
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



	
