<script>
function Ctrl_00_020($scope,playFactory){
	
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	for(var i = 0; i < tempAudioArray[0].length; i++)
	{
		audioArray.push(tempAudioArray[0][i]['innerHTML']);
	}
	$scope.playFactory = playFactory;
	playFactory.setAudio(audioArray);
	
	$scope.$on('audioFinished', function(event, currentAudio) {
		console.log("number sent: " + currentAudio);
		console.log("Guess what the audio is finished with this audio piece: " + audioArray[currentAudio]);
	});
	// Get text	
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
}//Ctrl
</script>

<style>
	p.titleText{
		position:absolute;
		font-size: 24px;
		color: #DB3436;
		text-align: center;
		vertical-align: middle;
		width: 1014px;
		left: 0px;
		top: 100px;
	}
	p.pageText{
		font-size: 15px;
		color: #777777;
		text-align: left;
		width: 400px;
		border:solid 1px black;
		
	}
	ul{
		position:absolute;
		left: 100px;
		top: 217px;
		list-style-type: none;
		margin: 0;
		padding: 0;
	}
	ul li{
		margin:26px 0px
	}
	p#textB{
		font-size: 15px;
		color: #777777;
		text-align: left;
		position:absolute;
		left: 100px;
		top: 138px;
		width: 814px;
		text-align:left;
	}
	
	p#textC{
		position:absolute;
		left: 100px;
		top: 217px;
	}
	
	p#textD{
		position:absolute;
		left: 100px;
		top: 279px;
	}
	
	p#textE{
		position:absolute;
		left: 100px;
		top: 341px;
	}
	
	p#textF{
		position:absolute;
		left: 100px;
		top: 403px;
	}
	
	p#textG{
		position:absolute;
		left: 100px;
		top: 465px;
	}
	
	p#textH{
		position:absolute;
		left: 100px;
		top: 527px;
	}
	input{
		position:aboslute;
		left: 0px;
		top 300px;
	}
	div#slider-range-min{
		top: 400px;
margin: 0px 0px 0px 0px;
left: 100px;
	}
</style>


<p  class="titleText">{{textA}}</p>
<p id="textB">{{textB}}</p>
<ul>
    <li><p class="pageText">{{textC}}</p></li>
    <li><p class="pageText">{{textD}}</p></li>
    <li><p class="pageText">{{textE}}</p></li>
    <li><p class="pageText">{{textF}}</p></li>
    <li><p class="pageText">{{textG}}</p></li>
    <li><p class="pageText">{{textH}}</p></li>
</ul>

<!--
<p class="sliders" id="slider1">
  <label for="amount">Maximum price:</label>
  <input type="text" id="amount" style="border:10; color:red; font-weight:bold;">
</p>
 
<div id="slider-range-min"></div>
-->


