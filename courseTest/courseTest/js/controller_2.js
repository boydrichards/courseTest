if (window.XMLHttpRequest){
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
}else{
	// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.open("GET","content.xml",false);
xmlhttp.send();
xmlDoc = xmlhttp.responseXML; 




	
var app = angular.module('APP',[]).
controller('playerCtrl',['$scope','$location','$compile','$http',function($scope,$location,$compile,$http){

	$scope.setRoute = function(route){
		$location.path(route);
		console.log("location path");
	}	

	init($scope,$http);
	
	var backEnabled = false;
	var nextEnabled = true;
	$scope.changePage = function (action){
		switch(action){
			case 'next':
				if($scope.currentPageNum < $scope.pageCount){
					$scope.currentPageNum = $scope.currentPageNum + 1;
					backEnabled = true;
				}
				if($scope.currentPageNum == $scope.pageCount){
					nextEnabled = false;
				}
			break;
			case 'back':
				if($scope.currentPageNum > 1){
					$scope.currentPageNum = $scope.currentPageNum - 1;
					nextEnabled = true;
				}
				if($scope.currentPageNum == 1){
					backEnabled = false;
				}
			break;
		}//switch

		if(nextEnabled){
			$("p.next").removeClass("disabled");
		}else{
			$("p.next").addClass("disabled");
		}

		// Get current page
		$http.get('views/'+ $scope.currentPageNum +'.php').success(function(data) {
//			$scope.currentPage = data;
			$('#content').html(data);
		});
		
		if(backEnabled){
			$("p.back").removeClass("disabled");
		}else{
			$("p.back").addClass("disabled");
		}
	}//changePage
}]).
config(function($routeProvider){

	$routeProvider.
		when('/1', {
			template: '/views/1.php'
		}).
		when('/2', {
			template: '/views/2.php'
		}).
		when('/3', {
			template: '/views/3.php'
		}).
		otherwise({
			redirectTo:'/home',
			template:'views/home.php',
			controller: HomeCtrl
		});
})


function init($scope,$http){
	// Get course information
	var x = xmlDoc.getElementsByTagName("courseSetup");
	$scope.pageTitle = x[0].getElementsByTagName("title")[0].childNodes[0].nodeValue;

	// Get page nodes
	var page = xmlDoc.getElementsByTagName("page");

	// Get page count
	$scope.currentPageNum = 1;
	$scope.pageCount = page.length;
	
	// Get current page
	$http.get('views/'+ $scope.currentPageNum +'.php').success(function(data) {
		//$scope.currentPage = data;
		$('#content').html(data);
	});
}//init


function HomeCtrl($scope){
	console.log("Home");
}//HomeCtrl


function AboutCtrl($scope){
	console.log("About");
}//AboutCtrl
