function writeAddressName(latLng) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          "location": latLng
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK)
            document.getElementById("address").innerHTML = results[0].formatted_address;
          else
            document.getElementById("error").innerHTML += "Unable to retrieve your address" + "<br />";
        });
      }
 
      function geolocationSuccess(position) {
        var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        // Write the formatted address
        writeAddressName(userLatLng);
		getWeather(position.coords.latitude,position.coords.longitude);
 
        var myOptions = {
          zoom : 15,
          center : userLatLng,
          mapTypeId : google.maps.MapTypeId.HYBRID
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
        // Place the marker
        new google.maps.Marker({
          map: mapObject,
          position: userLatLng
        });
        // Draw a circle around the user position to have an idea of the current localization accuracy
        var circle = new google.maps.Circle({
          center: userLatLng,
          radius: position.coords.accuracy,
          map: mapObject,
          fillColor: 'powderblue',
          fillOpacity: 0.2,
          strokeColor: 'grey',
          strokeOpacity: 0.7
        });
        mapObject.fitBounds(circle.getBounds());
      }
	  
	  function getWeather(latitude,longitude){
  var mapOptions = {
    zoom: 11,
    center: new google.maps.LatLng(latitude,longitude)
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var weatherLayer = new google.maps.weather.WeatherLayer({
    temperatureUnits: google.maps.weather.TemperatureUnit.CELSIUS
  });
  weatherLayer.setMap(map);

  var cloudLayer = new google.maps.weather.CloudLayer();
  cloudLayer.setMap(map);
  }
 
      function geolocationError(positionError) {
        document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
      }
 
      function geolocateUser() {
        // If the browser supports the Geolocation API
        if (navigator.geolocation)
        {
          var positionOptions = {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          };
          navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
        }
        else
          document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
      }