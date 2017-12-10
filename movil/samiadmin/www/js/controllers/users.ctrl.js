angular.module('users.ctrl', [])

    .controller('UsersCtrl', function($scope, $ionicHistory, $timeout, $ionicModal, User, $ionicPopup, $state, $ionicLoading){

	$scope.loginData = {};
	
	$scope.user = JSON.parse(window.localStorage.getItem("user_session"));

	console.log($scope.user);
	
	$ionicModal.fromTemplateUrl('templates/login.html', {
	    scope: $scope,
	    animation: 'slide-in-up',
	    backdropClickToClose: false,
	    hardwareBackButtonClose: false
	}).then(function(modal) {
	    $scope.modal = modal;

	    if($scope.user == null){
		$scope.modal.show();	
	    }else{
		$scope.modal.hide();
	    }
	});

	// LOGIN
	$scope.login = function(){
	    
	    window.localStorage.clear();
	    $ionicHistory.clearCache();
	    $ionicHistory.clearHistory();
	    $ionicLoading.show({
		template: '<ion-spinner></ion-spinner> <br/> Iniciando sesión...'
	    });
	    
	    User.login($scope.loginData).then(function(data){
		$ionicLoading.hide();
		if(data.status == "200"){

		    var user = data.user;
		    var user_id = data.user.id;
		    
		    window.localStorage.setItem("user_session",  JSON.stringify(user));
		    
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
	};

	//LOGOUT
	$scope.signout = function() {
	    $timeout(function () {
		window.localStorage.clear();
		$ionicHistory.clearCache();
		$ionicHistory.clearHistory();

		$ionicHistory.nextViewOptions({
		    disableBack: true
		});
		
		$state.go('app.profile', {}, {reload: true});
		
	    }, 200)
	};
    })
