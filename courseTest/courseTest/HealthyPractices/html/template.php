<script>

function Ctrl_00_000($scope, playFactory){
	$scope.textA = $scope.getXMLNode("textA",1);
	$scope.img1 = $scope.getXMLNode("imgA",1);
	$scope.img2 = $scope.getXMLNode("imgB",1);
	
	var pageLoadCounter = 0;
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	var pageLoadArray = [];
	//load transition
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","HealthyPractices/transitions/00_000.xml",false);
	newXmlhttp.send();
	transitionsXMLDoc = newXmlhttp.responseXML; 
	// Get event nodes
	var xmlTransitionEventArray = transitionsXMLDoc.getElementsByTagName("event");
	
	for(var i = 0; i < tempAudioArray[0].length; i++)
	{
		audioArray.push(tempAudioArray[0][i]['innerHTML']);
	}
	
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
		position:absolute;
		font-size: 24px;
		color: #DB3436;
		text-align: center;
		width: 1019px;
		left: 0px;
		top: 66px;
	}
	
	p.bodyText{
		font-size: 19px;
		color: #777777;
		text-align: left;
		left:600PX;
		width: 400px;
		//height: 50px;
	}
	
	p#textB{
		position:absolute;
		color: #30a0cf;
		top: 310px;
		left:590px;
	}
	
	img#img1{
		position:absolute;
		left: 3px;
		top: 345px;
		width:1016px;
		height:138px;
	}
	
	img#img2{
		position:absolute;
		left: 75px;
		top: 150px;
	}
	
</style>
<img id="img1" ng-src="{{img1}}"/>
<img id="img2" ng-src="{{img2}}"/>
<p class="titleText" id="textA">{{textA}}</p>
