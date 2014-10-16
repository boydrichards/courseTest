<script>
//selector is jquery
var $h1 = $(".pageTitle");
//javascript
TweenMax.from($h1, 1.2, {alpha:0, ease:Power1.easeInOut});

//var $img2 = $("#img2");
//TweenMax.from($img2, 1.2, {alpha:0, delay:1.5, ease:Power1.easeInOut});

function Ctrl_00_010($scope){
	$scope.img1 = $scope.getXMLNode("img",1);
	$scope.img2 = $scope.getXMLNode("img",2);
	$scope.img3 = $scope.getXMLNode("img",3);
	$scope.img4 = $scope.getXMLNode("img",4);
	$scope.img5 = $scope.getXMLNode("img",5);
	$("#player").css("background-image","url(" + $scope.img1 + ")");
	//$scope.img3 = $scope.getXMLNode("img",3);
	var pageLoadCounter = 0;
	var pageLoadArray = [img2,img3,img4,img5];
	
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
		var delayTime = .25;
		for(var k = 0; k < pageLoadArray.length; k++)
		{
			TweenMax.to(pageLoadArray[k], .25, {autoAlpha:1, delay:delayTime, ease:Power1.easeInOut});
			delayTime += .25;
		}
	}
}//Ctrl


</script>

<style>
h2.pageTitle
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
	left: 540px;
	top: 40px;
	height: 30%
}
img#img3
{
	position:absolute;
	left: 540px;
	top: 250px;
	height:40px;
}
img#img4
{
	position:absolute;
	left: 540px;
	top: 295px;
	width:220px;
	
}
img#img5
{
	position:absolute;
	left: 775px;
	top: 295px;
	width:175px;
	
}
</style>

<img id="img2" ng-src="{{img2}}"/>
<img id="img3" ng-src="{{img3}}"/>
<img id="img4" ng-src="{{img4}}"/>
<img id="img5" ng-src="{{img5}}"/>
<!--
<h2 class="pageTitle">{{pageTitle}}</h2>

<p class="pageContent">{{p1}}</p>
-->