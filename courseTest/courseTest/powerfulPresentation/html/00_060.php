<script>
function Ctrl_00_060($scope,playFactory){
	$scope.textA = $scope.getXMLNode("textA",1);
	$scope.textB = $scope.getXMLNode("textB",1);
	$scope.img1 = $scope.getXMLNode("imgA",1);
	$scope.img2 = $scope.getXMLNode("imgB",1);
	$("#player").css("background-image","url(" + $scope.img1 + ")");
	
	var pageLoadCounter = 0;
	var pageLoadArray = [textA,textB,img2];
	//load transition
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","HealthyPractices/transitions/00_060.xml",false);
	newXmlhttp.send();
	transitionsXMLDoc = newXmlhttp.responseXML; 
	// Get event nodes
	var xmlTransitionEventArray = transitionsXMLDoc.getElementsByTagName("event");
	alphaOut();
	loadNextContent();
	
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
p.pageTitle
{
    position:absolute;
	left: 550px;
	top: 125px;
	font-size: 24px;
	color: #ffffff;
	text-align: center;
	width: 335px;
	font-style:italic;
}
p.pageContent
{
	font-size: 46px;
	color: #DB3436;
	position:absolute;
	left: 550px;
	top: 130px;
	width: 335px;
	clear: right;
	line-height:90%;
	text-align: center;
}
img#img2
{
	position:absolute;
	left: 0px;
	top: 75px;
}
</style>
<img id="img2" ng-src="{{img2}}"/>
<p class="pageTitle" id="textA">{{textA}}</p>
<p class="pageContent" id="textB">{{textB}}</p>