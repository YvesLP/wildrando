function initMap() {

  var map = new google.maps.Map(document.getElementById('maps'), {
    center: {lat: 48.4394555, lng: 1.4652520999999998 },
    zoom: 14
  	});

  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    	navigator.geolocation.getCurrentPosition(function(position) {
      	var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      	};

      	infoWindow.setPosition(pos);
      	infoWindow.setContent('Vous êtes ici');
      	map.setCenter(pos);
    	}, function() {
      	handleLocationError(true, infoWindow, map.getCenter());
    	});
  		} else {
    	// Browser doesn't support Geolocation
    	handleLocationError(false, infoWindow, map.getCenter());
  		}
  	var urlKML ='';
  	var kmlLayer = new google.maps.KmlLayer({
    url: urlKML ,
    suppressInfoWindows: true,
    map: map
  });

  kmlLayer.addListener('click', function(kmlEvent) {
    var text = kmlEvent.featureData.description;
    showInContentWindow(text);
  });

  function showInContentWindow(text) {
    var sidediv = document.getElementById('content-window');
    sidediv.innerHTML = text;
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  		infoWindow.setPosition(pos);
  		infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
}
$('.carousel').carousel();