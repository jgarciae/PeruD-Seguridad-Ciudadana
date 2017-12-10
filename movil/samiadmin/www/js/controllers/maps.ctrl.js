angular.module('maps.ctrl', [])
    .controller('MapsCtrl', function($scope, $state, $cordovaGeolocation, $ionicPopup, $ionicLoading, $ionicHistory, $state, $ionicModal) {
	$scope.data = {};
	$scope.modal;
	$scope.requestData = {};
	
	
	var insertedIdRequest;
	var options = {timeout: 10000, enableHighAccuracy: true};
	var geocoder = new google.maps.Geocoder();
	var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

	var originRequest;
	var destinationRequest;

	/** Lat and Lon variables **/

	var latLngOrigin;
	var latLngDestination;


	
	$scope.trip_id = window.localStorage.getItem("trip_id");

	/*alert($scope.trip_id);
	  
	  if(!$scope.trip_id == null){
	  $ionicHistory.nextViewOptions({
	  disableBack: true
	  });
	  $state.go('app.trip', {}, {reload: true});
	  }*/
	

	loadMap();

	function loadMap(){
	    $cordovaGeolocation.getCurrentPosition(options).then(function(position){
		
		directionsService = new google.maps.DirectionsService;
		latLngOrigin = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		var request = { latLng: latLngOrigin };
		var myAddress;
		var myCity;
		var myCountry;

		var styledMapType = new google.maps.StyledMapType(
		    [
			{
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#f5f5f5"
				}
			    ]
			},
			{
			    "elementType": "labels.icon",
			    "stylers": [
				{
				    "visibility": "off"
				}
			    ]
			},
			{
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#616161"
				}
			    ]
			},
			{
			    "elementType": "labels.text.stroke",
			    "stylers": [
				{
				    "color": "#f5f5f5"
				}
			    ]
			},
			{
			    "featureType": "administrative.land_parcel",
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#bdbdbd"
				}
			    ]
			},
			{
			    "featureType": "poi",
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#eeeeee"
				}
			    ]
			},
			{
			    "featureType": "poi",
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#757575"
				}
			    ]
			},
			{
			    "featureType": "poi.park",
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#e5e5e5"
				}
			    ]
			},
			{
			    "featureType": "poi.park",
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#9e9e9e"
				}
			    ]
			},
			{
			    "featureType": "road",
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#ffffff"
				}
			    ]
			},
			{
			    "featureType": "road.arterial",
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#757575"
				}
			    ]
			},
			{
			    "featureType": "road.highway",
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#dadada"
				}
			    ]
			},
			{
			    "featureType": "road.highway",
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#616161"
				}
			    ]
			},
			{
			    "featureType": "road.local",
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#9e9e9e"
				}
			    ]
			},
			{
			    "featureType": "transit.line",
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#e5e5e5"
				}
			    ]
			},
			{
			    "featureType": "transit.station",
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#eeeeee"
				}
			    ]
			},
			{
			    "featureType": "water",
			    "elementType": "geometry",
			    "stylers": [
				{
				    "color": "#c9c9c9"
				}
			    ]
			},
			{
			    "featureType": "water",
			    "elementType": "labels.text.fill",
			    "stylers": [
				{
				    "color": "#9e9e9e"
				}
			    ]
			}
		    ],
		    {name: 'Styled Map'}
		)
		
		var mapOptions = {
		    center: latLngOrigin,
		    zoom: 17,
		    disableDefaultUI: true,
		    //mapTypeId: google.maps.MapTypeId.ROADMAP,
		    mapTypeControl: false,
		    streetViewControl: false,
		    rotateControl: false,
		    mapTypeControlOptions: {
			mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
				     'styled_map']
		    }
		};
		
		$scope.map = new google.maps.Map(document.getElementById("map"), mapOptions);

		//Associate the styled map with the MapTypeId and set it to display.
		$scope.map.mapTypes.set('styled_map', styledMapType);
		$scope.map.setMapTypeId('styled_map');

		geocoder.geocode(request, function(data, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
			console.log(data);
			if (data[0] != null) {
			    myAddress = data[0].address_components[1].short_name + ' ' + data[0].address_components[0].short_name;
			    $scope.myAddress = myAddress;
			    $scope.myCity =  data[0].address_components[2].short_name;
			    $scope.myCountry = data[0].address_components[5].short_name;

			    
			} else {
			    alert("No podemos encontrar tu ubicación. Por favor prende tu GPS.");
			}
		    }
		})

		$ionicLoading.show({
		    template: '<ion-spinner></ion-spinner> Localizando'
		});
		
		//Wait until the map is loaded
		google.maps.event.addListenerOnce($scope.map, 'idle', function(){
		    
		    var marker = new google.maps.Marker({
			map: $scope.map,
			animation: google.maps.Animation.DROP,
			position: latLngOrigin,
			icon: 'http://www.nyaradzo.co.zw/images/map-marker-icon.png'
		    });

		    console.log(myAddress);
		    
		    var contentString = '<strong>' + myAddress + '</strong><br>';
		    
		    var infoWindow = new google.maps.InfoWindow({
			content: contentString
		    });
		    
		    infoWindow.open($scope.map, marker);

		    $ionicLoading.hide();
		    
		    google.maps.event.addListener(marker, 'click', function () {
			infoWindow.open($scope.map, marker);
		    });
		    
		});
		
	    }, function(error){
		console.log("Could not get location");
	    });

	};

	$scope.search = function(){
	    $scope.requestData['lat'] = latLngOrigin.lat();
	    $scope.requestData['lng'] = latLngOrigin.lng();


	}
	
    });
