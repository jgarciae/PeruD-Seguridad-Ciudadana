angular.module('report.srv', [])

    .factory('Report', function($http, $q, Config) {
	return {
            send: function(data) {
		
		var deferred = $q.defer();
		var promise = deferred.promise;
		
		var link = Config.API_REPORT_SEND;

		var config = {
		    headers : {
			'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
		    }
		}

		$http.post(link, data).then(function(response){
		    deferred.resolve(response.data);
		}, function(errResponse){
		    deferred.reject(errResponse);
		});

		return promise;
            },

	    getRatio: function(data) {
		
		var deferred = $q.defer();
		var promise = deferred.promise;
		
		var link = Config.API_REPORT_GET_RATIO;

		var config = {
		    headers : {
			'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
		    }
		}
		
		$http.post(link, data).then(function(response){
		    deferred.resolve(response.data);
		}, function(errResponse){
		    deferred.reject(errResponse);
		});

		return promise;
            }

	}
    })
