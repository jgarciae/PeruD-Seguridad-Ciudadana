angular.module('users.ctrl', [])

    .controller('UsersCtrl', function($scope, $ionicHistory, $timeout, $ionicModal, User, $ionicPopup, $state, $ionicLoading){

	$scope.loginData = {};
	
	$scope.rusher = JSON.parse(window.localStorage.getItem("user_session"));

	console.log($scope.rusher);
	
	$ionicModal.fromTemplateUrl('templates/login.html', {
	    scope: $scope,
	    animation: 'slide-in-up',
	    backdropClickToClose: false,
	    hardwareBackButtonClose: false
	}).then(function(modal) {
	    $scope.modal = modal;

	    //if($scope.rusher == null){
		//$scope.modal.show();	
	    //}else{
		//$scope.pushNotification = { checked: $scope.rusher.active };
		$scope.modal.hide();
	    //}
	});

	// LOGIN
	$scope.login = function(){
	    
	    window.localStorage.clear();
	    $ionicHistory.clearCache();
	    $ionicHistory.clearHistory();
	    $ionicLoading.show({
		template: '<ion-spinner></ion-spinner> <br/> Iniciando sesión...'
	    });
	    
	    Rusher.login($scope.loginData).then(function(data){
		$ionicLoading.hide();
		if(data.status == "200"){

		    var rusher = data.rusher[0];
		    var rusher_id = data.rusher[0].id;
		    
		    window.localStorage.setItem("user_session",  JSON.stringify(rusher));
		    
		    $ionicHistory.nextViewOptions({
			disableBack: true
		    });
		    
		    $state.go('app.map', {}, {reload: true});
		    $scope.modal.hide();
		    
		}else{
		    var alertPopup = $ionicPopup.alert({
			title: '¡Tenemos problemas!',
			template: 'Error: ' + data.message
		    });
		}	
	    });
	}
    })
