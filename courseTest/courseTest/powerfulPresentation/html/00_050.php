<script>
function Ctrl_00_050($scope,playFactory){
	$scope.textA = $scope.getXMLNode("textA",1);
	$scope.textB = $scope.getXMLNode("textB",1);
	$scope.textC = $scope.getXMLNode("textC",1);
	$scope.textD = $scope.getXMLNode("textD",1);
	$scope.textE = $scope.getXMLNode("textE",1);
	$scope.textF = $scope.getXMLNode("textF",1);
	$scope.textG = $scope.getXMLNode("textG",1);
	$scope.textH = $scope.getXMLNode("textH",1);
	$scope.textI = $scope.getXMLNode("textI",1);
	$scope.textJ = $scope.getXMLNode("textJ",1);
	$scope.textK = $scope.getXMLNode("textK",1);
	$scope.textL = $scope.getXMLNode("textL",1);
	$scope.textM = $scope.getXMLNode("textM",1);
	$scope.textN = $scope.getXMLNode("textN",1);
	$scope.textO = $scope.getXMLNode("textO",1);
	$scope.textP = $scope.getXMLNode("textP",1);
	$scope.textQ = $scope.getXMLNode("textQ",1);
	$scope.textR = $scope.getXMLNode("textR",1);
	
	$scope.imgA = $scope.getXMLNode("imgA",1);
	$scope.imgB = $scope.getXMLNode("imgB",1);
	$scope.imgC = $scope.getXMLNode("imgC",1);
	$scope.imgD = $scope.getXMLNode("imgD",1);
	$scope.imgE = $scope.getXMLNode("imgE",1);
	$scope.imgF = $scope.getXMLNode("imgF",1);
	
	var pageLoadCounter = 0;
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	var pageLoadArray = [textA,textB,textC,textD,textE,textF,textG,textH,textI,textJ,textK,textL,textM,textN,textO,textP,textQ,textR,imgA,imgB,imgC,imgD,imgE,imgF];
	
	//load transition
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","powerfulPresentation/transitions/00_050.xml",false);
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
		font-size: 36px;
		color: #3E3E3E;
		text-align: left;
		width: 800px;
		left: 35px;
		top: 50px;
	}
	
	p.bodyTextTitle{
		font-size: 22px;
		color: #3E3E3E;
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
	p.bodyTextRed{
		font-size: 26px;
		color: #E21717;
		text-align: right;
		left:880px;
		text-shadow: 0.01em 0.01em 0.05em #333;
		margin: 0px;
	}
	
	p#textB{
		position:absolute;
		top: 134px;
	}
	
	p#textC{
		position:absolute;
		top: 175px;
	}
	p#textD{
		position:absolute;
		top: 200px;
	}
	
	p#textE{
		position:absolute;
		top: 225px;
	}
	
	p#textF{
		position:absolute;
		top: 250px;
	}
	
	p#textG{
		position:absolute;
		top: 275px;
	}
	
	p#textH{
		position:absolute;
		top: 375px;
	}
	
	p#textI{
		position:absolute;
		top: 406px;
	}
	
	p#textJ{
		position:absolute;
		top: 431px;
	}
	
	p#textK{
		position:absolute;
		top: 456px;
	}
	
	p#textL{
		position:absolute;
		top: 481px;
	}
	
	p#textM{
		position:absolute;
		top: 105px;
		width:100px;
		left:770px;
		color:#80807B;
		font-size: 36px;
		
	}
	
	p#textN{
		position:absolute;
		top: 420px;
		left:880px;
	}
	
	p#textO{
		position:absolute;
		top: 450px;
		left:925px;
	}
	
	p#textP{
		position:absolute;
		top: 480px;
		left:805px;
	}
	p#textQ{
		position:absolute;
		top: 510px;
		left: 920px;
	}
	
	p#textR{
		position:absolute;
		top: 540px;
		left: 815px;
	}
	
	img#imgA{
		position:absolute;
		left: 30px;
		top: 120px;
		height:250px;
	}
	
	img#imgB{
		position:absolute;
		left: 340px;
		top: 127px;
	}
	
	img#imgC{
		position:absolute;
		left: 30px;
		top: 370px;
		height:250px;
	}
	
	img#imgD{
		position:absolute;
		left: 340px;
		top: 370px;
	}
	img#imgE{
		position:absolute;
		left: 750px;
		top: 100px;
	}
	
	img#imgF{
		position:absolute;
		left: 870px;
		top: 320px;
	}
</style>
<img id="imgA" ng-src="{{imgA}}"/>
<img id="imgB" ng-src="{{imgB}}"/>
<img id="imgC" ng-src="{{imgC}}"/>
<img id="imgD" ng-src="{{imgD}}"/>
<img id="imgE" ng-src="{{imgE}}"/>
<img id="imgF" ng-src="{{imgF}}"/>

<p class="titleText" id="textA">{{textA}}</p>
<p class="bodyTextTitle" id="textB">{{textB}}</p>
<p class="bodyTextBody" id="textC">{{textC}}</p>
<p class="bodyTextBody" id="textD">{{textD}}</p>
<p class="bodyTextBody" id="textE">{{textE}}</p>
<p class="bodyTextBody" id="textF">{{textF}}</p>
<p class="bodyTextBody" id="textG">{{textG}}</p>
<p class="bodyTextTitle" id="textH">{{textH}}</p>
<p class="bodyTextBody" id="textI">{{textI}}</p>
<p class="bodyTextBody" id="textJ">{{textJ}}</p>
<p class="bodyTextBody" id="textK">{{textK}}</p>
<p class="bodyTextBody" id="textL">{{textL}}</p>
<p class="bodyTextTitle" id="textM">{{textM}}</p>
<p class="bodyTextRed" id="textN">{{textN}}</p>
<p class="bodyTextRed" id="textO">{{textO}}</p>
<p class="bodyTextRed" id="textP">{{textP}}</p>
<p class="bodyTextRed" id="textQ">{{textQ}}</p>
<p class="bodyTextRed" id="textR">{{textR}}</p>