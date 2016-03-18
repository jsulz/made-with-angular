(function(){

	angular.module('madeWithAngular', ['ui.router', 'ngResource', 'ngSanitize']);

	function loopController( $scope, Posts ){
		
		Posts.query(function(res){
			$scope.posts = res;
		});

	}

	//https://docs.angularjs.org/api/ngResource/service/$resource
	function Posts( $resource ) {
		return $resource( wPApp.api_url + 'posts/:ID', {
			ID: '@id',
		});
	}

	//http://angular-ui.github.io/ui-router/site/#/api/ui.router.state.$stateProvider
	function config( $stateProvider, $urlRouterProvider ){
		$urlRouterProvider.otherwise('/');
		$stateProvider
			.state( 'loop', {
				url: '/',
				controller: 'loopController',
				templateUrl: wPApp.template_directory + 'partials/loop.html'
			});

	}

	angular
		.module('madeWithAngular')
		.controller('loopController', ['$scope', 'Posts', loopController]);

	angular
		.module('madeWithAngular')
		.factory('Posts', Posts);

	angular
		.module('madeWithAngular')
		.config( config );


})();