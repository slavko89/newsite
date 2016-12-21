function initialize() {
  var bangalore = { lat: 12.97, lng: 77.59 };
  var map = new google.maps.Map(document.getElementById('mapcont'), {
    zoom: 12,
    center: bangalore
  });

  // Ця функція викликає addMarker, коли буден нажата кнопка мишки.
  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng, map);
  });
}

// Adds a marker to the map.
function addMarker(location, map) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
  var marker = new google.maps.Marker({
    position: location,
	map: map
  });
}


google.maps.event.addDomListener(window, 'load', initialize);

s
google.maps.event.addDomListener(window, 'load', initMap);
google.maps.event.addListener(marker, 'dragend', function (event) {
    document.getElementById("latbox").value = this.getPosition().lat();
    document.getElementById("lngbox").value = this.getPosition().lng();
});



