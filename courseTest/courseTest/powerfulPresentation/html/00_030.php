<script>
/*
TweenMax.from(textA, .25, {alpha:0, ease:Power1.easeInOut});
TweenMax.from(textB, .25, {alpha:0, delay:.25, ease:Power1.easeInOut});
TweenMax.from(textB1, .25, {alpha:0, delay:.5, ease:Power1.easeInOut});
TweenMax.from(textB2, .25, {alpha:0, delay:.75, ease:Power1.easeInOut});
*/
function Ctrl_00_030($scope,playFactory){
	$scope.textA = $scope.getXMLNode("textA",1);
	$scope.textB = $scope.getXMLNode("textB",1);
	$scope.textB1 = $scope.getXMLNode("textB1",1);
	$scope.textB2 = $scope.getXMLNode("textB2",1);
	$scope.textC = $scope.getXMLNode("textC",1);
	$scope.textD = $scope.getXMLNode("textD",1);
	$scope.textE = $scope.getXMLNode("textE",1);
	$scope.textF = $scope.getXMLNode("textF",1);
	$scope.textG = $scope.getXMLNode("textG",1);
	$scope.img1 = $scope.getXMLNode("imgA",1);
	$scope.img2 = $scope.getXMLNode("imgB",1);
	$scope.playFactory = playFactory;
	
	var pageLoadCounter = 0;
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	var pageLoadArray = [textA,textB,textB1,textB2,textC,textD,img1,textE,textF,img2,textG];
	
	//loading xml
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","HealthyPractices/transitions/00_030.xml",false);
	newXmlhttp.send();
	transitionsXMLDoc = newXmlhttp.responseXML; 

	// Get nodes
	var xmlTransitionEventArray = transitionsXMLDoc.getElementsByTagName("event");

	for(var i = 0; i < tempAudioArray[0].length; i++)
	{
		audioArray.push(tempAudioArray[0][i]['innerHTML']);
	}
	//tempFunction();
	alphaOut();
	loadNextContent();
	playFactory.setAudio(audioArray);
	$scope.$on('audioFinished', function(event, currentAudio) {
		//console.log("number sent: " + currentAudio);
		//console.log("Guess what the audio is finished with this audio piece: " + audioArray[currentAudio]);
		loadNextContent();
	});
	function alphaOut()
	{
		console.log("I am in alpha out");
		for(var i = 0; i < xmlTransitionEventArray.length; i++)
		{
			//console.log("I am in tempFunction and this is i: " + i);
			//console.log(xmlTransitionEventArray[i]);
			var tempArray = xmlTransitionEventArray[i].getElementsByTagName("instance");
			for(var j = 0; j < tempArray.length; j++)
			{
				var nodeValue = xmlTransitionEventArray[i].getElementsByTagName("instance")[j].childNodes[0].nodeValue;
				var delayTime = tempArray[j].attributes.getNamedItem("delay").value;
				for(var k = 0; k < pageLoadArray.length; k++)
				{
					if(nodeValue == pageLoadArray[k].id)
					{
						TweenMax.to(pageLoadArray[k], 0, {autoAlpha:0});
					}
					
				}
			}
		}
	}
	function loadNextContent()
	{
		console.log("I am in loadNextContent");
		var loadDelay = 0;
		console.log("1");
		var tempArray = xmlTransitionEventArray[pageLoadCounter].getElementsByTagName("instance");
		console.log("2");
		for(var j = 0; j < tempArray.length; j++)
		{
			console.log("I am in forloop");
			var nodeValue = xmlTransitionEventArray[pageLoadCounter].getElementsByTagName("instance")[j].childNodes[0].nodeValue;
			console.log("1");
			var delayTime = tempArray[j].attributes.getNamedItem("delay").value;
			console.log("2");
			for(var k = 0; k < pageLoadArray.length; k++)
			{
				if(nodeValue == pageLoadArray[k].id)
				{
					//TweenMax.to(pageLoadArray[k], 0, {autoAlpha:0});
					console.log("I have found out what should be coming back and this is what it is: " + pageLoadArray[k]);
					TweenMax.to(pageLoadArray[k], .25, {autoAlpha:1, delay:delayTime, ease:Power1.easeInOut});
				}
				
			}
		}
			/*
		for(var i = 0; i < pageLoadArray[pageLoadCounter].length; i++)
		{
			TweenMax.to(pageLoadArray[pageLoadCounter][i], .25, {autoAlpha:1, delay:loadDelay, ease:Power1.easeInOut});
			//console.log(pageLoadArray[pageLoadCounter][i]);
			loadDelay += .25;
		}
		*/
		pageLoadCounter++;
	}
	
}//Ctrl
</script>

<style>
	p.titleText{
		position:absolute;
		font-size: 55px;
		color: #000000;
		text-align: left;
		vertical-align: middle;
		width: 800px;
		left: 88px;
		top: 66px;
	}
	p.bodyText{
		font-size: 20px;
		color: #000000;
		text-align: left;
		width: 800px;
		font-weight:bold;
	}
	
	p#textB{
		position:absolute;
		left: 145px;
		top: 173px;
		height: 50px;
	}
	p#textB1{
		position:absolute;
		left: 145px;
		top: 198px;
		height: 50px;
	}
	p#textB2{
		position:absolute;
		left: 145px;
		top: 223px;
		height: 50px;
	}
	
	p#textC{
		position:absolute;
		left: 94px;
		top: 253px;
		height: 50px;
		font-size: 32px;
	}
	
	p#textD{
		position:absolute;
		left: 94px;
		top: 303px;
		height: 50px;
	}
	
	img#img1
	{
		position:absolute;
		left: 260px;
		top: 300px;
	}
	
	p#textE{
		font-size:50px;
		position:absolute;
		left: 285px;
		top: 290px;
		height: 50px;
	}
	
	p#textF{
		position:absolute;
		left: 600px;
		top: 173px;
		height: 50px;
		width: 350px;
	}
	
	p#textG{
		position:absolute;
		left: 715px;
		top: 260px;
		height: 50px;
		width: 200px;
	}
	
	img#img2
	{
		position:absolute;
		left: 600px;
		top: 255px;
	}
</style>
<img id="img1" ng-src="{{img1}}"/>
<img id="img2" ng-src="{{img2}}"/>
<p class="titleText" id="textA">{{textA}}</p>
<p class="bodyText" id="textB">{{textB}}</p>
<p class="bodyText" id="textB1">{{textB1}}</p>
<p class="bodyText" id="textB2">{{textB2}}</p>
<p class="bodyText" id="textC">{{textC}}</p>
<p class="bodyText" id="textD">{{textD}}</p>
<p class="bodyText" id="textE">{{textE}}</p>
<p class="bodyText" id="textF">{{textF}}</p>
<p class="bodyText" id="textG">{{textG}}</p>