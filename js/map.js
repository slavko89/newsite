 
 
var geocoder;
var map;
var marker;
 
function initialize(){
//Определение карты
  var latlng = new google.maps.LatLng(56.329917,44.009191999999985);
  var options = {
    zoom: 15,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.SATELLITE
  };
 
  map = new google.maps.Map(document.getElementById("map_add"), options);

  marker = new google.maps.Marker({
    map: map,
    draggable: true
  });
 
}
 
$(document).ready(function() { 
 
  initialize();
 
  
});
 
