angular.module('user.srv', [])

    .factory('User', function($http, $q, Config) {
	return {
            login: function(user) {
		
		var deferred = $q.defer();
		var promise = deferred.promise;
		
		var link = Config.API_USER_LOGIN;

		var config = {
		    headers : {
			'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
		    }
		}

		$http.post(link, user).then(function(response){
		    deferred.resolve(response.data);
		}, function(errResponse){
		    deferred.reject(errResponse);
		});

		return promise;
            }

	}
    })
