<script>
function Ctrl_00_090($scope, playFactory){
	$scope.textA = $scope.getXMLNode("textA",1);
	$scope.textB = $scope.getXMLNode("textB",1);
	$scope.textC = $scope.getXMLNode("textC",1);
	$scope.textD = $scope.getXMLNode("textD",1);
	$scope.textE = $scope.getXMLNode("textE",1);
	$scope.textF = $scope.getXMLNode("textF",1);
	$scope.textG = $scope.getXMLNode("textG",1);
	$scope.textH = $scope.getXMLNode("textH",1);
	
	$scope.img1 = $scope.getXMLNode("imgA",1);
	$scope.img2 = $scope.getXMLNode("imgB",1);
	$scope.img3 = $scope.getXMLNode("imgC",1);
	$scope.img4 = $scope.getXMLNode("imgD",1);
	$scope.img5 = $scope.getXMLNode("imgE",1);
	$scope.img6 = $scope.getXMLNode("imgF",1);
	$scope.img7 = $scope.getXMLNode("imgG",1);
	$scope.img8 = $scope.getXMLNode("imgH",1);
	$scope.img13 = $scope.getXMLNode("imgI",1);
	$scope.img14 = $scope.getXMLNode("imgJ",1);
	
	$scope.audioA = $scope.getXMLNode("audio1",1);
	$scope.audioB = $scope.getXMLNode("audio2",1);
	$scope.audioC = $scope.getXMLNode("audio3",1);
	
	$("#player").css("background-image","url(" + $scope.img14 + ")");
		
	var pageLoadCounter = 0;
	var currentAudio = 0;
	var tempAudioArray = Array($scope.pageXML.getElementsByTagName("audio"));
	var audioArray = Array();
	var pageLoadArray = [textA,textB,textC,textD,textE,textF,img1,img2,img3,img4,img5,img6,img7,img8,img9,img10,img11,img12,img13];
	//load transition
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		newXmlhttp=new XMLHttpRequest();
	}else{
		// code for IE6, IE5
		newXmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	newXmlhttp.open("GET","HealthyPractices/transitions/00_090.xml",false);
	newXmlhttp.send();
	transitionsXMLDoc = newXmlhttp.responseXML; 
	// Get event nodes
	var xmlTransitionEventArray = transitionsXMLDoc.getElementsByTagName("event");
	
	for(var i = 0; i < tempAudioArray[0].length; i++)
	{
		audioArray.push(tempAudioArray[0][i]['innerHTML']);
	}
	
	init();
	//loadNextContent();
	playFactory.setAudio(audioArray);
	$scope.$on('audioFinished', function(event, currentAudio) {
		loadNextContent();
	});
	
	$scope.$on('allAudioComplete', function(){
		console.log("I have finished all the audio, and the page knows it.");
		afterAudio($scope);
	});
	
	
	function alphaOut()
	{
		$("#img13").hide();
		$("#textF").hide();
		$(".extraTitle").hide();
	}
	
	function loadNextContent()
	{
		var loadDelay = 0;
		var tempArray = xmlTransitionEventArray[pageLoadCounter].getElementsByTagName("instance");
		for(var j = 0; j < tempArray.length; j++)
		{
			var nodeValue = xmlTransitionEventArray[pageLoadCounter].getElementsByTagName("instance")[j].childNodes[0].nodeValue;
			var delayTime = tempArray[j].attributes.getNamedItem("delay").value;
			for(var k = 0; k < pageLoadArray.length; k++)
			{
				if(nodeValue == pageLoadArray[k].id)
				{
					//TweenMax.to(pageLoadArray[k], 0, {autoAlpha:0});
					TweenMax.to(pageLoadArray[k], .25, {autoAlpha:1, delay:delayTime, ease:Power1.easeInOut});
				}
				
			}
		}
		pageLoadCounter++;
	}//loadNextontent
	
	function init()
	{
		alphaOut();
		//unbingBtns();
	}//init
	
	function unbingBtns()
	{
		$("div.firstBtn").unbind("mouseout");
		$("div.firstBtn").unbind("mouseover");
		$("div.firstBtn").unbind("click");
		$("div.secondBtn").unbind("mouseout");
		$("div.secondBtn").unbind("mouseover");
		$("div.secondBtn").unbind("click");
		$("div.thirdBtn").unbind("mouseout");
		$("div.thirdBtn").unbind("mouseover");
		$("div.thirdBtn").unbind("click");
	}
	function afterAudio($scope)
	{
		console.log($scope.textA);
		console.log("I am in the afterAudio function");
		bindBtns($scope);
	}
	function bindBtns($scope)
	{
		pageAudio = document.getElementById("pageAudio");
		
		$( "div.firstBtn" )
	  	.mouseover(function() {
  		  $("div.setB").hide();
		  document.getElementById("textC").readOnly = true;
  		})
  		.mouseout(function() {
  		  	$("div.setB").show();
  		})
		.click(function() {
			$("#img13").show();
			$("#textF").show();
			$(".extraTitle").show();
			document.getElementById("textF").innerHTML = $scope.textF;
			document.getElementById("textG").innerHTML = $scope.textC;
			TweenLite.to(img13, 0, {left:"155px"});
			TweenLite.to(textF, 0, {left:"175px"});
			TweenLite.to(textG, 0, {left:"175px"});

			pageAudio.setAttribute('src', $scope.audioA);
			pageAudio.load();
			pageAudio.play();
			
//			TweenMax.from(img13, .0, {css:{top:"400px",left:"400px"}});
		});
	
		$( "div.secondBtn" )
  		.mouseover(function() {
  		  $("div.setD").hide();
		  document.getElementById("textC").readOnly = true;
  		})
  		.mouseout(function() {
  		  	$("div.setD").show();
  		})
		.click(function() {
			$("#img13").show();
			$("#textF").show();
			$(".extraTitle").show();
			document.getElementById("textF").innerHTML = $scope.textG;
			document.getElementById("textG").innerHTML = $scope.textD;
			TweenLite.to(img13, 0, {left:"320px"});
			TweenLite.to(textF, 0, {left:"340px"});
			TweenLite.to(textG, 0, {left:"340px"});
			pageAudio.setAttribute('src', $scope.audioB);
			pageAudio.load();
			pageAudio.play();
//			TweenMax.from(img13, .0, {css:{top:"400px",left:"400px"}});
		});
	
		$( "div.thirdBtn" )
  		.mouseover(function() {
  		  $("div.setF").hide();
		  document.getElementById("textC").readOnly = true;
  		})
  		.mouseout(function() {
  		  	$("div.setF").show();
  		})
		.click(function() {
			$("#img13").show();
			$("#textF").show();
			$(".extraTitle").show();
			document.getElementById("textF").innerHTML = $scope.textH;
			document.getElementById("textG").innerHTML = $scope.textE;
			TweenLite.to(img13, 0, {left:"485px"});
			TweenLite.to(textF, 0, {left:"505px"});
			TweenLite.to(textG, 0, {left:"505px"});
			pageAudio.setAttribute('src', $scope.audioC);
			pageAudio.load();
			pageAudio.play();
//			TweenMax.from(img13, .0, {css:{top:"400px",left:"400px"}});
		});
		
		/*
		$( "div.setD" ).mouseover(function() {
  			//$( "#log" ).append( "<div>Handler for .mouseover() called.</div>" );
			console.log("it has happened!4");
		});
	
		$( "#div.setF" ).mouseover(function() {
  			//$( "#log" ).append( "<div>Handler for .mouseover() called.</div>" );
			console.log("it has happened!6");
		});
		*/
	}
}//Ctrl
</script>
	
<style>
	p.titleText{
		position:absolute;
		font-size: 24px;
		font-weigth: bolder;
		text-shadow:.5px .5px #656161;
		color: #DB3436;
		text-align: center;
		width: 1017px;
		left: 0px;
		top: 75px;
	}
	
	p#textB{
		position:absolute;
		font-size: 16px;
		font-weigth: bolder;
		text-shadow:.5px .5px #656161;
		color: #777777;
		text-align: center;
		width: 1017px;
		left: 0px;
		top: 150px;
	}
	
	p.btnText{
		font-size: 20px;
		font-weigth: bold;
		text-shadow: 0px 0px #656161;
		color: #dedfdf;
		text-align: center;
		width: 165px;
		left: 0px;
		top: 150px;
	}
	
	p#textC{
		position:absolute;
		top: 475px;
		left: 270px;
	}
	
	p#textD{
		position:absolute;
		top: 475px;
		left: 435px;
	}
	
	p#textE{
		position:absolute;
		top: 475px;
		left: 600px;
	}
	
	div.setA #img1{
    	position:absolute;
		top: 360px;
		left: 290px;
    }
	div.setA #img7{
		position:absolute;
		top: 450px;
		left: 270px;
	}
	div.setB #img2{
    	position:absolute;
		top: 360px;
		left: 290px;
    }
	div.setB #img8{
		position:absolute;
		top: 450px;
		left: 270px;
	}
	
	
	div.setC #img3{
    	position:absolute;
		top: 360px;
		left: 455px;
    }
	div.setC #img9{
		position:absolute;
		top: 450px;
		left: 435px;
	}
	div.setD #img4{
    	position:absolute;
		top: 360px;
		left: 455px;
    }
	div.setD #img10{
		position:absolute;
		top: 450px;
		left: 435px;
	}
	
	
	div.setE #img5{
    	position:absolute;
		top: 360px;
		left: 620px;
    }
	div.setE #img11{
		position:absolute;
		top: 450px;
		left: 600px;
	}
	div.setF #img6{
    	position:absolute;
		top: 360px;
		left: 620px;
    }
	div.setF #img12{
		position:absolute;
		top: 450px;
		left: 600px;
	}
	
	div.firstBtn{
		cursor:default;
	}
	
	div.secondBtn{
		cursor:default;
	}
	
	div.thirdBtn{
		cursor:default;
	}
	
	img.btnImages{
		height: 105px;
		width: 165px;
	}
	
	img#img13{
		position:absolute;
		top: 225px;
		left: 155px;
	}
	
	p.extraTitle{
		position:absolute;
		font-size: 28px;
		font-weigth: bolder;
		color: #2E9DCA;
		text-align: left;
		width: 500px;
		left: 175px;
		top: 235px;
		padding: 0px, 0px;
		margin: 0px;
	}
	
	p#textF{
		position: absolute;
		left: 175px;
		top:255px;
		width: 360px;
		font-size: 14px;
		color: #777777;
	}
</style>
<div class="firstBtn">
	<div class="setA">
		<img class="btnImages" id="img7" ng-src="{{img7}}" ng-init="count=0"/>
        <img id="img1" ng-src="{{img1}}"/>
	</div>

	<div class="setB">
	    <img class="btnImages" id="img8" ng-src="{{img8}}"/>
        <img id="img2" ng-src="{{img2}}" ng-init="count=0"/>
	</div>
    <p class="btnText" id="textC">{{textC}}</p>
</div>

<div class="secondBtn">
	<div class="setC">
    	<img class="btnImages" id="img9" ng-src="{{img7}}"/>
        <img id="img3" ng-src="{{img3}}"/>
	</div>

	<div class="setD">
    	<img class="btnImages" id="img10" ng-src="{{img8}}"/>
        <img id="img4" ng-src="{{img4}}"/>
	</div>
    <p class="btnText" id="textD">{{textD}}</p>
</div>

<div class="thirdBtn">
	<div class="setE">
	    <img class="btnImages" id="img11" ng-src="{{img7}}"/>
        <img id="img5" ng-src="{{img5}}"/>
	</div>
	
	<div class="setF">
	    <img class="btnImages" id="img12" ng-src="{{img8}}"/>
        <img id="img6" ng-src="{{img6}}"/>
	</div>
    <p class="btnText" id="textE">{{textE}}</p>
</div>




<img id="img13" ng-src="{{img13}}"/>
<p class="titleText" id="textA">{{textA}}</p>
<p class="bodyText" id="textB">{{textB}}</p>
<p class="bodyText" id="textF">{{textF}}</p>
<p class="extraTitle" id="textG">{{textC}}</p>

<audio id="pageAudio">
	<source src="{{audioA}}" type="audio/mpeg">
	Your browser does not support the audio tag.
</audio>