var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map1'), {
    center: {lat: 50.6712, lng: 45.8269},
    zoom: 7
  });
}
google.maps.event.addDomListener(window, 'load', initMap);
