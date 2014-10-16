$( document ).ready(function() {
	resizePlayer();
	$( window ).resize(resizePlayer);
});


function resizePlayer(){
	///this should be where we can limit the size of the player
	var playerWidth = $("#player").outerWidth();
	var playerHeight = $("#player").outerHeight();
	
	var windowWidth = $(window).outerWidth();
	var windowHeight = $(window).outerHeight();
	
	var transformScale = '1';
	
	var windowRatio = windowWidth/windowHeight;
	var playerRatio = playerWidth/playerHeight;

	if(playerRatio > windowRatio){
		transformScale = windowWidth/playerWidth;
	}else{
		transformScale = windowHeight/playerHeight;
	}
	transformScale = transformScale.toFixed(2);
	
	var $player = $("#player");
	TweenMax.to($player, 0,	 {scaleX:transformScale, scaleY:transformScale, ease:Power1.easeInOut});
	var topMargin = ((windowHeight - playerHeight*transformScale) / 2);
		
	var leftMargin = ((windowWidth - playerWidth*transformScale) / 2);
	$player.css("margin-top",topMargin + "px");
	$player.css("margin-left",leftMargin + "px");
	$('body').css('overflow','hidden');
}//resizePlayer


if (window.XMLHttpRequest){
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
}else{
	// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.open("GET","powerfulPresentation/content.xml",false);
xmlhttp.send();
xmlDoc = xmlhttp.responseXML; 

	
// Get page nodes
var xmlPagesArray = xmlDoc.getElementsByTagName("page");


var app = angular.module('APP',[]);
var counter = 0;
app.factory('playFactory', function($rootScope){
	var playMessage = {};
	
	playMessage.setAudio = function(audioArray){
		console.log("I am in the factory");
		console.dir(audioArray);
		if(audioArray)
		{
			$rootScope.$broadcast('recieved',audioArray);
		}
		
		
	}
	playMessage.audioFinished = function(audioCounter){
		console.log("This is what is sent to me: " + audioCounter);
		$rootScope.$broadcast('audioFinished', audioCounter - 1);
	}
	
	playMessage.audioDone = function(){
		console.log("I am finished with all audio!!");
		$rootScope.$broadcast('allAudioComplete');
	}
    return playMessage;
});

function playerCtrl($scope,$routeParams,$location,$compile,$http,playFactory){
	$scope.init = function()
	{
		console.log("I am in init");
		
		$scope.changePage("load");
		$scope.audioCounter = 0;
		$scope.myAudio = document.getElementById("audio"); 
	};
	
	$scope.playFactory = playFactory;
	
	$scope.$on('recieved', function(event,audioArray) {
		$scope.audioCounter = 0;
		console.log("I have brodcasted");
		console.dir(audioArray);
		$scope.playerAudioArray = audioArray;
		console.log("This is playerAudioArray");
		console.dir($scope.playerAudioArray);
		if($scope.audioCounter == audioArray.length)
		{
			
		}else{
			$scope.loadAudio();
		}
	});
	$scope.loadAudio = function(){
		$scope.audio = "powerfulPresentation/"
		$scope.audio += $scope.playerAudioArray[$scope.audioCounter];
		$scope.audioCounter++;
		$scope.myAudio.setAttribute('src', $scope.audio);
		$scope.play_click();
	}
	
	$("#audio").bind('ended', function()
	{
		if($scope.audioCounter >= $scope.playerAudioArray.length)
		{
			playFactory.audioDone();
			//playFactory.audioFinished($scope.audioCounter);
		}else{
			playFactory.audioFinished($scope.audioCounter);
			$scope.loadAudio();
		}
	});
	$scope.play_click = function(){
		
		//$scope.pageXML.getElementsByTagName("audio")
		$scope.myAudio.play();
	};
	$scope.pause_click = function(){
		$scope.myAudio.pause();
	};
	$scope.reload_click = function(){
		myAudio.load();
		if($scope.playing){
			myAudio.play();
		}
	};


	$scope.playingChange = function(){
		if($scope.playing){
			$('.play_btn').hide();
			$('.pause_btn').show();
		}else{
			$('.play_btn').show();
			$('.pause_btn').hide();
		}
	};
	
	$scope.pageChangeButtons = function(){
		if($scope.currentPageNum != 1){
			$('.back-enabled').show();
		}else{
			$('.back-enabled').hide();
		}
		if($scope.currentPageNum < $scope.pageCount){
			$('.next-enabled').show();
		}else{
			$('.next-enabled').hide();
		}
	};
	
	// Get the xml nodes for the specific page
	$scope.getXMLNode = function(xmlNode,xmlNodeNum){
		return $scope.pageXML.getElementsByTagName(xmlNode)[xmlNodeNum-1].childNodes[0].nodeValue;
	};

	//change page by clicking the navigation next and back buttons
	$scope.changePage = function (action){
		console.log("the changePage is started");
		switch(action){
			case 'next':
				if($scope.currentPageNum < $scope.pageCount){
					$scope.currentPageNum++;
					$scope.myAudio.pause();
				}
			break;
			case 'back':
				if($scope.currentPageNum > 1){
					$scope.currentPageNum--;
				}
			break;
			case 'load':
				$scope.currentPageNum = 1;
			break;
		}//switch

		
		// chnage xml for current page
		$scope.pageXML = xmlPagesArray[$scope.currentPageNum-1];

		// change the page template
		for(var i = 0 ; i < xmlPagesArray.length ; i++){
			currentFile = xmlPagesArray[i].getElementsByTagName("view")[0].childNodes[0].nodeValue;
			if(i == ($scope.currentPageNum - 1)){
				$location.path(currentFile);
				resetPage($scope);
				//console.log("powerfulPresentation/css/'+currentFile+'.less");
				//$('#cssHolder').html('<link href="powerfulPresentation/css/'+currentFile+'.less" rel="stylesheet">');
				break;
			}
		}//for
		
		// show and hide back and next buttons
		$scope.pageChangeButtons();
	}//changePage
	
	
	
	// Get course information
	var x = xmlDoc.getElementsByTagName("courseSetup");
	$scope.pageTitle = x[0].getElementsByTagName("title")[0].childNodes[0].nodeValue;
	$scope.courseBackground = x[0].getElementsByTagName("background")[0].childNodes[0].nodeValue;

	// Initially assume that it is the first page
	$scope.currentPageNum = 1;
	$scope.pageView = '00_010';
	// Check to see if it is not the first page, if not update the page variables
	for(var i = 0 ; i < xmlPagesArray.length ; i++){
		var currentPageView = xmlPagesArray[i].getElementsByTagName("view")[0].childNodes[0].nodeValue;
		if($location.path() == "/" + currentPageView){
			$scope.currentPageNum = i+1;
			$scope.pageView = currentPageView;
			break;
		}
	}//for
	
	$scope.pageCount = xmlPagesArray.length;

	// xml for current page
	$scope.pageXML = xmlPagesArray[$scope.currentPageNum-1];

	// show and hide back and next buttons
	$scope.pageChangeButtons();
	
	$scope.playing = false;
	// show and hide play and pause buttons
	$scope.playingChange();
	$scope.init();
}




app.config(function($routeProvider){
	// Getting all of the files from the xml and creating a when statement and template for every page
	var currentFile = "";
	var firstPage = "";
	for(var i = 0 ; i < xmlPagesArray.length ; i++){
		currentFile = xmlPagesArray[i].getElementsByTagName("view")[0].childNodes[0].nodeValue;
		
		$routeProvider.when('/' + currentFile, {
				redirectTo:'/' + currentFile,
				template:'powerfulPresentation/html/' + currentFile + '.php',
				controller: 'Ctrl_' + currentFile
		});
		//$scope.currentFile = currentFile;
		/*
		$routeProvider.when('/' + currentFile, {
				redirectTo:'/' + currentFile,
				template:'powerfulPresentation/html/' + currentFile + '.html',
				controller: 'Ctrl_' + currentFile
		});
		*/
		if(i == 0){
			firstPage = currentFile;
		}
	}//for
	
	$routeProvider.otherwise({
		redirectTo:function(){
			return '/' + firstPage;
		},
		template:'views/' + firstPage + '.php',
		controller: 'Ctrl_' + firstPage
	});
});

function resetPage($scope)
{
	$("#player").css("background-image","url(" + $scope.courseBackground + ")");
}

function changeZIndex()
{
	console.log("I have made it into changeZindex");
	//var change
	console.log(document.getElementById("content").style.zIndex);
	document.getElementById("content").style.zIndex = "-1";
}