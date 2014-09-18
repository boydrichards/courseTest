function Ctrl_00_010($scope){
	//selector is jquery
var $h1 = $(".pageTitle");
//javascript
TweenMax.from($h1, 1.2, {alpha:0, ease:Power1.easeInOut});

var $img2 = $("#img2");
TweenMax.from($img2, 1.2, {alpha:0, delay:1.5, ease:Power1.easeInOut});
	$scope.pageTitle = $scope.getXMLNode("title",1);
	$scope.p1 = $scope.getXMLNode("textA",1);
	$scope.img1 = $scope.getXMLNode("img",1);
	$scope.img2 = $scope.getXMLNode("img",2);
	$("#player").css("background-image","url(" + $scope.img1 + ")");
	//$scope.img3 = $scope.getXMLNode("img",3);
}//Ctrl

function Ctrl_00_020($scope){
	// Set factory
	$scope.messageFactory = messageFactory;
	
	// Set audio
	$scope.audio1 = $scope.getXMLNode("audio",1);
	$scope.messageFactory.changeAudio($scope.audio1);

	// Audio Complete
	$("#audio1").bind('ended', function(){
		console.log("Audio Complete");
	});

	// Get text	
	$scope.pageTitle = $scope.getXMLNode("title",1);
	$scope.p1 = $scope.getXMLNode("p",1);
	$scope.img1 = $scope.getXMLNode("img",1);
	
	var myAudio = document.getElementById("audio1"); 
}//Ctrl

function Ctrl_00_030($scope){
	
	var myAudio = document.getElementById("audio1"); 
myAudio.play(); 

var myVideo = document.getElementById("video1"); 

var $img1 = $("#img1");
var $img2 = $("#img2");
var $vid1 = $("#video1");
TweenMax.to($img2, 0, {alpha:0});

$("#audio1").bind('ended', function(){
	myVideo.play(); 
    // done playing
	TweenMax.to($img1, .25, {alpha:0, ease:Power1.easeInOut});
	TweenMax.to($img2, .25, {alpha:1, ease:Power1.easeInOut});
});

$("#video1").bind('ended', function(){
	TweenMax.to($img2, .25, {alpha:0, ease:Power1.easeInOut});
	TweenMax.to($vid1, .25, {alpha:0, ease:Power1.easeInOut});
});

$scope.pageTitle = $scope.getXMLNode("title",1);
	$scope.p1 = $scope.getXMLNode("p",1);
	$scope.p2 = $scope.getXMLNode("p",2);
	$scope.img1 = $scope.getXMLNode("img",1);
	$scope.img2 = $scope.getXMLNode("img",2);
	$scope.audio1 = $scope.getXMLNode("audio",1);
	$scope.video1 = $scope.getXMLNode("video",1);

}//Ctrl