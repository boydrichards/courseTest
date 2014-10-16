function Ctrl_00_010($scope){
	//selector is jquery
var $h1 = $(".pageTitle");
//javascript
TweenMax.from($h1, 1.2, {alpha:0, ease:Power1.easeInOut});
console.log("Audio Complete");
//var $img2 = $("#img2");
//TweenMax.from($img2, 1.2, {alpha:0, delay:1.5, ease:Power1.easeInOut});
	$scope.pageTitle = $scope.getXMLNode("title",1);
	$scope.img1 = $scope.getXMLNode("img",1);
	$scope.img2 = $scope.getXMLNode("img",2);
	//$scope.img3 = $scope.getXMLNode("img",3);
	//$scope.img4 = $scope.getXMLNode("img",4);
	$("#player").css("background-image","url(" + $scope.img1 + ")");
}//Ctrl

