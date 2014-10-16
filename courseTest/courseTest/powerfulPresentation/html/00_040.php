<script>
//selector is jquery

function inputFocus(i)
{
	console.log("This is something really important so I am saying it here, and it is long so that I will definitely notice it!!");
   	if(i.value == i.defaultValue)
	{ 
		i.value="";
	}
	else if(i.value == "")
	{
		i.value = i.defaultValue;
	}
}
	

function Ctrl_00_040($scope,playFactory){
	$scope.textA = $scope.getXMLNode("textA",1);
	$scope.textB = $scope.getXMLNode("textB",1);
	$scope.textC = $scope.getXMLNode("textC",1);
	$scope.textD = $scope.getXMLNode("textD",1);
	$scope.textE = $scope.getXMLNode("textE",1);
	$scope.textF = $scope.getXMLNode("textF",1);
	$scope.textG = $scope.getXMLNode("textG",1);
	$scope.textH = $scope.getXMLNode("textH",1);
	
	var pageLoadCounter = 0;
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	var pageLoadArray = [textA,textB,s1_a,textC,s1_b,textD,s1_c,textH];
	
	//load transition
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","powerfulPresentation/transitions/00_040.xml",false);
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
			for(var j = 0; j < tempArray.length; j++)
			{
				var nodeValue = xmlTransitionEventArray[i].getElementsByTagName("instance")[j].childNodes[0].nodeValue;
				var delayTime = tempArray[j].attributes.getNamedItem("delay").value;
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
	
	function sendInfo()
	{
		
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
	width: 800px;
	left: 88px;
	top: 66px;
}

p.bodyText{
	font-size: 16px;
	color: #777777;
	text-align: left;
	width: 800px;
}

p#textA{
	position: absolute;
	left: 65px;
	top: 120px;
	height: 50px;
	text-align: left;
	font-size: 225%;
	color: #454545;
	margin: 0px;
}
p#textB{
	position: absolute;
	left: 65px;
	top: 190px;
	text-align: left;
	width: 400px;
	background-color: #ECEAEA;
	height: 90px;
	padding: 5px;
	margin: 0px;
}
p#textC{
	position: absolute;
	left: 65px;
	top: 320px;
	text-align: left;
	width: 400px;
	background-color: #ECEAEA;
	height: 90px;
	padding: 5px;
	margin: 0px;
}
p#textD{
	position: absolute;
	left: 65px;
	top: 450px;
	height: 90px;
	text-align: left;
	width: 400px;
	background-color: #ECEAEA;
	padding: 5px;
	margin: 0px;
}

#different{
	position:absolute;
	left: 100px;
	top: 500px;
	height: 50px;
	text-align: left;
	width: 400px;
		
}
p#textH{
	position: absolute;
	left: 540px;
	color: red;
	height: 50px;
	text-align: left;
	top: 540px;
	font-size: 12px;
	width: 500px;
	font-weight: bold;	
}
img#img2{
	position:absolute;
	left: 3px;
	top: 345px;
	width:1016px;
	height:138px;
}
	
img#img3{
	position:absolute;
	left: 100px;
	top: 250px;
}
	
img#img4{
	position:absolute;
	left: 575px;
	top: 250px;
}
	
.textInput{
	resize:none;
	width: 400px; 
	height:90px; 
	border:3px solid #c1c1c1; 
}
	
#s1_a{
	position: absolute;
	top: 190px;
	left: 540px;
}
	
#s1_b{
	position:absolute; 
	top: 320px;
	left:540px; 
}
	
#s1_c{
	position:absolute; 
	top:450px; 
	left:540px; 
}
</style>
<p class="bodyText" id="textA">{{textA}}</p>
<p class="bodyText" id="textB">{{textB}}</p>
<p class="bodyText" id="textC">{{textC}}</p>
<p class="bodyText" id="textD">{{textD}}</p>
<form class="self_assessment_form" method="post" onSubmit="return sendInfo()">
	<td><textarea class="textInput" id="s1_a" name="s1_a" onfocus="inputFocus(this)" onblur="inputFocus(this)">{{textE}}</textarea></td>
    <td><textarea class="textInput" id="s1_b" name="s1_b" onfocus="inputFocus(this)" onblur="inputFocus(this)">{{textF}}</textarea></td>
    <td><textarea class="textInput" id="s1_c" name="s1_c" onfocus="inputFocus(this)" onblur="inputFocus(this)">{{textG}}</textarea></td>
</form>

<p class="bodyText" id="textH">{{textH}}</p>
