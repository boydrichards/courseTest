<script>
//selector is jquery
var $h1 = $(".pageTitle");
//javascript
TweenMax.from($h1, 1.2, {alpha:0, ease:Power1.easeInOut});

var $img2 = $("#img2");
TweenMax.from($img2, 1.2, {alpha:0, delay:1.5, ease:Power1.easeInOut});

function Ctrl_00_010($scope){
	$scope.pageTitle = $scope.getXMLNode("title",1);
	$scope.p1 = $scope.getXMLNode("textA",1);
	$scope.img1 = $scope.getXMLNode("img",1);
	$scope.img2 = $scope.getXMLNode("img",2);
	$("#player").css("background-image","url(" + $scope.img1 + ")");
	//$scope.img3 = $scope.getXMLNode("img",3);
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
	left: 100px;
	top: 75px;
}
</style>
<img id="img2" ng-src="{{img2}}"/>
<h2 class="pageTitle">{{pageTitle}}</h2>
<p class="pageContent">{{p1}}</p>