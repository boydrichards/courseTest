<script>
function Ctrl_00_020($scope,playFactory){
	
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	for(var i = 0; i < tempAudioArray[0].length; i++)
	{
		audioArray.push(tempAudioArray[0][i]['innerHTML']);
	}
	$scope.playFactory = playFactory;
	playFactory.setAudio(audioArray);
	
	$scope.$on('audioFinished', function(event, currentAudio) {
		console.log("number sent: " + currentAudio);
		console.log("Guess what the audio is finished with this audio piece: " + audioArray[currentAudio]);
	});
	// Get text	
	$scope.img1 = $scope.getXMLNode("img",1);
	$scope.img2 = $scope.getXMLNode("img",2);
	$scope.img3 = $scope.getXMLNode("img",3);
	
	var pageLoadCounter = 0;
	console.log("TRAVIS LOOK AT ME");
	
	var pageLoadArray = [img1,img2,img3];
	console.dir(pageLoadArray);
	alphaOut();
	loadNextContent();
	function alphaOut()
	{
		console.log("I am in alpha out");
		for(var k = 0; k < pageLoadArray.length; k++)
		{
				TweenMax.to(pageLoadArray[k], 0, {autoAlpha:0});
		}
	}
	
	function loadNextContent()
	{
		console.log("I am in loadNextContent");
		var delayTime = 1;
		for(var k = 0; k < pageLoadArray.length; k++)
		{
			TweenMax.to(pageLoadArray[k], .25, {autoAlpha:1, delay:delayTime, ease:Power1.easeInOut});
			delayTime++;
		}
	}
}//Ctrl
</script>

<style>
	p.titleText{
		position:absolute;
		font-size: 24px;
		color: #DB3436;
		text-align: center;
		vertical-align: middle;
		width: 1014px;
		left: 0px;
		top: 100px;
	}
	p.pageText{
		font-size: 15px;
		color: #777777;
		text-align: left;
		width: 400px;
		border:solid 1px black;
		
	}
	ul{
		position:absolute;
		left: 100px;
		top: 217px;
		list-style-type: none;
		margin: 0;
		padding: 0;
	}
	img#img1
	{
		position:absolute;
		left: -15px;
		top: 200px;
		height:300px;
	}
	img#img2
	{
		position:absolute;
		left: 338px;
		top: 200px;
		height:300px;
	}
	img#img3
	{
		position:absolute;
		left: 690px;
		top: 200px;
		height:300px;
	}
	
	
</style>

<img id="img1" ng-src="{{img1}}"/>
<img id="img2" ng-src="{{img2}}"/>
<img id="img3" ng-src="{{img3}}"/>