angular.module('maps.ctrl', [])
    .controller('MapsCtrl', function($scope, $state, $cordovaGeolocation, $ionicPopup, $ionicLoading, $ionicHistory, $state, $ionicModal) {
	$scope.data = {};
	$scope.modal;
	
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
		
		var mapOptions = {
		    center: latLngOrigin,
		    zoom: 17,
		    disableDefaultUI: true,
		    //mapTypeId: google.maps.MapTypeId.ROADMAP,
		    mapTypeControl: false,
		    streetViewControl: false,
		    rotateControl: false
		};
		
		$scope.map = new google.maps.Map(document.getElementById("map"), mapOptions);


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

	}
	
    });
