<script>
function Ctrl_00_050($scope,playFactory){
	$scope.textA = $scope.getXMLNode("textA",1);
	$scope.textB = $scope.getXMLNode("textB",1);
	$scope.textC = $scope.getXMLNode("textC",1);
	$scope.textD = $scope.getXMLNode("textD",1);
	$scope.textE = $scope.getXMLNode("textE",1);
	$scope.textF = $scope.getXMLNode("textF",1);
	$scope.textG = $scope.getXMLNode("textG",1);
	$scope.img1 = $scope.getXMLNode("imgA",1);
	$scope.img2 = $scope.getXMLNode("imgB",1);
	$scope.img3 = $scope.getXMLNode("imgC",1);
	
	var pageLoadCounter = 0;
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	var pageLoadArray = [textA,textB,textC,textD,textE,textF,textG,img1,img2,img3];
	
	//load transition
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","HealthyPractices/transitions/00_050.xml",false);
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
			console.log("1");
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
		width: 800px;
		left: 88px;
		top: 66px;
	}
	
	p.bodyText{
		font-size: 16px;
		color: #777777;
		text-align: left;
		left:550PX;
		width: 400px;
		//height: 50px;
	}
	
	p#textB{
		position:absolute;
		width:800px;
		left: 88px;
		top: 100px;
		text-align: center;
		vertical-align: middle;
	}
	
	p#textC{
		position:absolute;
		color: #30a0cf;
		top: 310px;
		left:540PX;
	}
	
	p#textD{
		position:absolute;
		top: 340px;
	}
	
	p#textE{
		position:absolute;
		top: 370px;
	}
	
	p#textF{
		position:absolute;
		top: 400px;
	}
	
	p#textG{
		position:absolute;
		top: 430px;
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
		left: 15px;
		top: 100px;
	}
	
	img#img3{
		position:absolute;
		left: 800px;
		top: 120px;
	}
</style>
<img id="img1" ng-src="{{img1}}"/>
<img id="img2" ng-src="{{img2}}"/>
<img id="img3" ng-src="{{img3}}"/>

<p class="titleText" id="textA">{{textA}}</p>
<p class="bodyText" id="textB">{{textB}}</p>
<p class="bodyText" id="textC">{{textC}}</p>
<p class="bodyText" id="textD">{{textD}}</p>
<p class="bodyText" id="textE">{{textE}}</p>
<p class="bodyText" id="textF">{{textF}}</p>
<p class="bodyText" id="textG">{{textG}}</p>