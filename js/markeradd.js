function initMap() {
	var bangalore = { lat: 50.97, lng: 77.59 };
	var map = new google.maps.Map(document.getElementById('map-container'), {
    zoom: 8,
    center: {lat: 50.97, lng: 10.59}
  });
  var geocoder = new google.maps.Geocoder();

  document.getElementById('submit').addEventListener('click', function(event) {
    geocodeAddress(geocoder, map);
  });
  
  google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map);
        });
		
	
}

function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


  function addMarker(location, map) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
      }

google.maps.event.addDomListener(window, 'load', initMap);