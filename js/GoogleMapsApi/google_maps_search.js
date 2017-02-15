	var geocoder;
	var map;
	var latlng = [];
	var markerIcon = [];
	var markerImg = [];
	var locations = [];
	var title = [];
	var infoWindow;
	var infoWindowContent = [];
	var img = [];
	var animal = [];
	var animal_breed = [];
	var markerClusterIco;
	var markerClusterImg;
	var circle = [];
	var l = [];
	var bermudaTriangle = "";
	
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var lat = 50.19712193146678;
		var lng = 23.76321315765381;
		var latlng = {lat:lat, lng:lng};
		var mapOptions = {
		  zoom: 6,
		  center: latlng
		};
		
		infoWindow = new google.maps.InfoWindow({maxWidth: 300});
		map = new google.maps.Map(document.getElementById("map"), mapOptions);
		ajaxSend();	
		
		for(var i = 0; i<locations.length; i++){
			setMarkerIcon(locations[i],title[i],infoWindowContent[i],i+1);
			setMarkerImg(locations[i],img[i],i);
		}
	
		setCluster();
	}
	
	
	//	Ajax запит, берем дані з БД
	function ajaxSend(){
		var ajax = $.ajax({
			url: "/ajax/map-marker.php",
			type: "POST",
			dataType: 'json',
			async: false,
			success: function(result){
					var data;
					var d;
					for(var i = 0; i<result.length; i++){	
						data= new Date(result[i]['date'] * 1000);	
						d = ('0' + data.getDate()).slice(-2) + '-' +('0' + (data.getMonth() + 1)).slice(-2) + '-' + data.getFullYear();
						img[i] = result[i]['image'];
						if(result[i]['image'] == "null"){
							resImg = "noimage.jpg";
						}else{
							resImg = result[i]['image'];
						}
						locations[i] = {lat:parseFloat(result[i]['lat']), lng:parseFloat(result[i]['lng'])};
						title[i] = result[i]['title'];
						animal[i] = result[i]['animal_id'];
						animal_breed[i] = result[i]['breed_id'];
						infoWindowContent[i] = 	'<div id="info_content" class="info_content">' + 
												'<center><h4><a href="http://mysite.loc/posterView?id=' + result[i]['id'] + '&user_id=' + result[i]['user_id'] + '">' + result[i]['title'] +'</a></h4></center>' +
												'<div id="animal_foto" class="animal_foto">' +
												'<a href="http://mysite.loc/posterView?id=' + result[i]['id'] + '&user_id=' + result[i]['user_id'] + '">' +
												'<img src="image/Data/upload/' + resImg + '" width=100% height=100%></a>' +
												'</div>' +
												'<div id="animal_info" class="animal_info">' +
												'<span style="color:#003aa7; font-weight: bold">Вид:     </span>'+ result[i]['animal_id'] +'<br/>'+
												'<span style="color:#003aa7; font-weight: bold">Порода:     </span>'+ result[i]['breed_id'] +'<br/>'+
												'<span style="color:#003aa7; font-weight: bold">Назва:     </span>'+ result[i]['name'] +'<br/>'+
												'<span style="color:#003aa7; font-weight: bold">Адреса:    </span>'+ result[i]['address'] +'<br/>'+
												'<span style="color:#003aa7; font-weight: bold">Дата:    </span>'+ d +'<br/>'+
												'</div>' +
												'</div>';
					}
			}			
		});
		
	}
	
	// Добавляєм маркер icon
	function setMarkerIcon( location, title, infoWindowContent,zIndex ) {
		var image = {
			url: 'image/map-marker-2.png',
			scaledSize: new google.maps.Size(45, 60)
		}
		
		var marker = new google.maps.Marker({
			category: animal,
			position: location,
			title: title,
			icon:image,
			zIndex:zIndex
		});
		
		google.maps.event.addListener(marker, 'click', function() {
			infoWindow.setContent(infoWindowContent);
			infoWindow.open(map, this);
			map.setCenter(location);
			map.setZoom(12);
		});
		
		markerIcon.push(marker);
	}
	
	
	//Добавляєм маркер image
	function setMarkerImg(location,img,zIndex){
		var image = {
			url:'image/Data/upload/' + img,
			scaledSize: new google.maps.Size(30, 30),
			size: new google.maps.Size(100, 100),
			origin: new google.maps.Point(0, 0),
			anchor: new google.maps.Point(15, 52)
		}
		var marker = new google.maps.Marker({
			position: location,
			category: animal,
			icon:image,
			zIndex:zIndex
		});
		markerImg.push(marker);
	}
	
	
	// Фільтер вид + порода
	function filterMarkerAnimal (valSelect, nameSelect ) {
		var arrAnimal = [];
		if(nameSelect == 'animal'){
			arrAnimal = animal;
		}else if(nameSelect = 'animal_breed'){
			arrAnimal = animal_breed;
		}
		for (var i = 0; i < circle.length; i++) {
			circle[i].setMap(null);
		}
		if(bermudaTriangle != ""){
			bermudaTriangle.setMap(null); 
		}
		circle = [];
		deleteMarkers();
		markerClusterIco.clearMarkers(null);
		markerClusterImg.clearMarkers(null);
		
				
		for (i = 0; i < locations.length; i++) {
			if(arrAnimal[i] == valSelect){
				setMarkerIcon(locations[i],title[i],infoWindowContent[i],i+1);
				setMarkerImg(locations[i],img[i],i);
			} else if(valSelect == ""){
				setMarkerIcon(locations[i],title[i],infoWindowContent[i],i+1);
				setMarkerImg(locations[i],img[i],i);
			}
		}
		setCluster();	
	}	

	function filterMarkerCircle(radius, address){
		if(bermudaTriangle != ""){
			bermudaTriangle.setMap(null); 
		};
		l = [];
		deleteMarkers();
		markerClusterIco.clearMarkers(null);
		markerClusterImg.clearMarkers(null);
		var locationsInCircle = [];
		if(radius >= 1 && radius < 25){
			setSoom = 10;
		}else if(radius >= 25 && radius <50){
			setSoom = 8;
		}else if(radius >= 50 && radius <100){
			setSoom = 7;
		}else if(radius >= 100 && radius <= 200){
			setSoom = 6;
		}else setSoom = 3;
		
		geocoder.geocode({'address': address}, function(results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			map.setZoom(setSoom);
			var latlng = results[0].geometry.location;
			var p2 = {lat:latlng.lat(), lng:latlng.lng()};
			for(var i = 0; i<locations.length; i++){
				var p1 = {lat:locations[i].lat, lng:locations[i].lng};
				if(getDistance (p1, p2) < radius*1000){
					locationsInCircle[i] = locations[i];
				}
			}
			setMarkerInCircle (locationsInCircle);
			circleOptions = {
				center: latlng,
				fillColor: "#00AAFF",
				fillOpacity: 0.5,
				strokeColor: "#FFAA00",
				strokeOpacity: 0.8,
				strokeWeight: 2,
				clickable: false,
				radius: radius*1000
			}
			for(var i=0; i<circle.length; i++){
				circle[i].setMap(null);
			}
			
			setCircle= new google.maps.Circle(circleOptions);
			setCircle.setMap(map);
			circle.push(setCircle);
			} else {
			  alert('Geocode was not successful for the following reason: ' + status);
			}
		});	
	}
	
	function setMarkerInCircle (locationsInCircle) {
		
		
		for (i = 0; i < locations.length; i++) {
			for(j = 0; j<locationsInCircle.length; j++){
				if(locations[i] == locationsInCircle[j]){
					setMarkerIcon(locations[i],title[i],infoWindowContent[i],i+1);
					setMarkerImg(locations[i],img[i],i);
				} else if(locationsInCircle == ""){
					setMarkerIcon(locations[i],title[i],infoWindowContent[i],i+1);
					setMarkerImg(locations[i],img[i],i);
				}
			}
		}
		setCluster();
	}	
	// Малює полігон
	function drawPoligon(){
			for(var i=0; i<circle.length; i++){
				circle[i].setMap(null);
			}
			if(bermudaTriangle != ""){
				bermudaTriangle.setMap(null); 
			}
			deleteMarkers();
			markerClusterIco.clearMarkers(null);
			markerClusterImg.clearMarkers(null);
		l = [];
		
		
		
		
		google.maps.event.addListener(map, 'rightclick', function(event) {
			l.push({lat:event.latLng.lat(), lng:event.latLng.lng()});
			tringl();
		});
		
		
	}
	//Створює полігон
	function tringl(){
		deleteMarkers();
		markerClusterIco.clearMarkers(null);
		markerClusterImg.clearMarkers(null);		
		if(bermudaTriangle != ""){
			bermudaTriangle.setMap(null); 
		}
		bermudaTriangle = new google.maps.Polygon({
			map:map,
			paths: l,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#FF0000',
			fillOpacity: 0.35
		  });
		   for(var i = 0; i<locations.length; i++){
			myLatLng = new google.maps.LatLng(locations[i]); 
			if(google.maps.geometry.poly.containsLocation(myLatLng, bermudaTriangle)){
					setMarkerIcon(locations[i],title[i],infoWindowContent[i],i+1);
					setMarkerImg(locations[i],img[i],i);
			}
			
		  }
		  setCluster();
		 
		
		  	  
	}

	
	// Функція видалення усіх маркерів - .. - 
	function deleteMarkers() {
		clearMarkers();
		markerIcon = [];
		markerImg = [];
	}
	function clearMarkers() {
		setMapOnAll(null);
	}
	function setMapOnAll(map) {
		for (var i = 0; i < markerIcon.length; i++) {
			markerIcon[i].setMap(map);
			markerImg[i].setMap(map);
		}
	}
	
	
	// Функція повертає відстань між двома точками
	function getDistance (location1, location2) {
			var rad = function(x) {
				return x * Math.PI / 180;
			};
		  var R = 6378137; // Earth’s mean radius in meter
		  var dLat = rad(location2.lat - location1.lat);
		  var dLong = rad(location2.lng - location1.lng);
		  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
			Math.cos(rad(location1.lat)) * Math.cos(rad(location2.lat)) *
			Math.sin(dLong / 2) * Math.sin(dLong / 2);
		  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
		  var d = R * c;
		  return d; // returns the distance in meter
	};
	
	//Группування маркерів
	function setCluster(){
		markerClusterIco = new MarkerClusterer(map, markerIcon,{
			imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
			maxZoom: 10,
			gridSize: 20,
			styles: null
		});
		
		markerClusterImg = new MarkerClusterer(map, markerImg,{
			imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
			maxZoom: 10,
			gridSize: 20,
			styles: null
		});			
	}
	
	

	


