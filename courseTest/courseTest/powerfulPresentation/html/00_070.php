<script>

function Ctrl_00_070($scope, playFactory){
	console.log("1");
	$scope.textA = $scope.getXMLNode("textA",1);
	console.log("1.1");
	$scope.textB = $scope.getXMLNode("textB",1);
	console.log("1.2");
	$scope.textC = $scope.getXMLNode("textC",1);
	console.log("1.3");
	$scope.textD = $scope.getXMLNode("textD",1);
	console.log("1.4");
	$scope.textE = $scope.getXMLNode("textE",1);
	console.log("1.5");
	$scope.textF = $scope.getXMLNode("textF",1);
	console.log("1.6");
	$scope.textG = $scope.getXMLNode("textG",1);
	console.log("1.7");
	$scope.textH = $scope.getXMLNode("textH",1);
	console.log("1.8");
	$scope.imgA = $scope.getXMLNode("imgA",1);
	console.log("1.9");
	$scope.imgB = $scope.getXMLNode("imgB",1);
	console.log("1.91");
	$scope.imgC = $scope.getXMLNode("imgC",1);
	console.log("2");
	var pageLoadCounter = 0;
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	var pageLoadArray = [textA,textB,textC,textD,textE,textF,textG,imgA,imgB];
	//load transition
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","HealthyPractices/transitions/00_070.xml",false);
	newXmlhttp.send();
	transitionsXMLDoc = newXmlhttp.responseXML; 
	// Get event nodes
	var xmlTransitionEventArray = transitionsXMLDoc.getElementsByTagName("event");
	
	for(var i = 0; i < tempAudioArray[0].length; i++)
	{
		audioArray.push(tempAudioArray[0][i]['innerHTML']);
	}
	console.log("3");
	alphaOut();
	loadNextContent();
	playFactory.setAudio(audioArray);
	$scope.$on('audioFinished', function(event, currentAudio) {
		console.log("number sent: " + currentAudio);
		console.log("Guess what the audio is finished with this audio piece: " + audioArray[currentAudio]);
		loadNextContent();
	});
	
	function alphaOut()
	{
		console.log("I am in alpha out");
		for(var i = 0; i < xmlTransitionEventArray.length; i++)
		{
			console.log("I am in tempFunction and this is i: " + i);
			console.log(xmlTransitionEventArray[i]);
			var tempArray = xmlTransitionEventArray[i].getElementsByTagName("instance");
			console.log(tempArray.length);
			for(var j = 0; j < tempArray.length; j++)
			{
				console.log("I am in second for loop");
				var nodeValue = xmlTransitionEventArray[i].getElementsByTagName("instance")[j].childNodes[0].nodeValue;
				console.log("1");
				var delayTime = tempArray[j].attributes.getNamedItem("delay").value;
				console.log("2");
				for(var k = 0; k < pageLoadArray.length; k++)
				{
					if(nodeValue == pageLoadArray[k].id)
					{
						console.log("I linked the nodeValue to pageLoadArray here is nodeValue: " + nodeValue);
						console.log("and here is pageLoadArray[k].id: " + pageLoadArray[k].id);
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
		pageLoadCounter++;
	}
	
}//Ctrl
</script>

<style>
	p.titleText{
		font-size: 36px;
		color: #E21717;
		text-align: left;
		text-shadow: 0.03em 0.03em 0.05em #333;
		margin: 0px;
		position: absolute;
		top: 97px;
		left: 80px;
		font-weight: bold;
	}
	
	p.bodyTextTitle{
		font-size: 22px;
		color: #3E3E3E
		text-align: left;
		left:360px;
		width: 400px;
		margin: 0px;
	}
	
	p.bodyTextBody{
		font-size: 16px;
		color: #3E3E3E;
		text-align: left;
		margin: 0px;
		left:360px;
	}
	
	
	p#textB{
		position:absolute;
		top: 160px;
		left:525px;
	}
	
	p#textC{
		position:absolute;
		left: 540px;
		top: 190px;
	}
	
	p#textD{
		position:absolute;
		top: 220px;
		left: 540px;
	}
	
	p#textE{
		position:absolute;
		left: 540px;
		top: 250px;
	}
	
	p#textF{
		position:absolute;
		left: 540px;
		top: 280px;
	}
	
	p#textG{
		position:absolute;
		top: 310px;
		left: 540px;
	}
	
	p#textH{
		position:absolute;
		top: 340px;
		left: 540px;
	}
	
	img#imgA{
		position: absolute;
		left: 75px;
		top: 140px;
		margin: 0px;
		width: 400px;
	}
	
	img#imgB{
		position: absolute;
		left: 40px;
		top: 100px;
	}
	
	img#imgC{
		position: absolute;
		top: 150px;
		left: 500px;
	}
	
</style>
<img id="imgA" ng-src="{{imgA}}"/>
<img id="imgB" ng-src="{{imgB}}"/>
<img id="imgC" ng-src="{{imgC}}"/>
<p class="titleText" id="textA">{{textA}}</p>
<p class="bodyTextTitle" id="textB">{{textB}}</p>
<p class="bodyTextBody" id="textC">{{textC}}</p>
<p class="bodyTextBody" id="textD">{{textD}}</p>
<p class="bodyTextBody" id="textE">{{textE}}</p>
<p class="bodyTextBody" id="textF">{{textF}}</p>
<p class="bodyTextBody" id="textG">{{textG}}</p>
<p class="bodyTextBody" id="textH">{{textH}}</p>