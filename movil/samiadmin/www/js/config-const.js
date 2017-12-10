angular.module('config-const',[])
    .constant('Config', {
	
	/*
	API_USER_LOGIN: 'http://localhost:1337/samiadmin.airefon.online/api/rest_users/signin.json',
	API_REPORT_SEND: 'http://localhost:1337/samiadmin.airefon.online/api/rest_reports/insert.json',
	API_REPORT_GET_RATIO: 'http://localhost:1337/samiadmin.airefon.online/api/rest_reports/get_ratio_reports.json'
	*/

	API_USER_LOGIN: 'http://samiadmin.airefon.online/api/rest_users/signin.json',
	API_REPORT_SEND: 'http://samiadmin.airefon.online/api/rest_reports/insert.json',
	API_REPORT_GET_RATIO: 'http://samiadmin.airefon.online/api/rest_reports/get_ratio_reports.json'

    });
