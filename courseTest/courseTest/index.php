<!doctype html>
<html lang="en" ng-app="APP">
	<head>
		<title>Enspark Course</title>
		<!-- jQuery -->
		<script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery-ui-1.10.4.js" type="text/javascript"></script>
        <!-- jquery-ut-css -->
        <link href="css/jquery-ui-1.10.4.css" rel="stylesheet/less" type="text/css"/>
		
		<!-- Angular JS -->
		<script src="js/angular-1.0.0rc6.min.js" type="text/javascript"></script>

		<!-- Greensocks for Javascript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.4/TweenMax.min.js"></script>		

		<!-- custom -->
		<script src="js/controller.js" type="text/javascript"></script>
       
        <!-- 
        <script src="powerfulPresentation/js/00_020.js" type="text/javascript"></script>
        -->
		
		<!-- Custom CSS -->
		<link href="css/style.less" rel="stylesheet/less" type="text/css"/>
		<!-- LESS CSS -->
		<script src="js/less-1.4.1.min.js" type="text/javascript"></script>

		<meta name="viewport" content="width=device-width" />	
        
        <div id="cssHolder"></div>

	</head>
	<body ng-controller="playerCtrl">
		<div id="player">
			<div id="container">
                 <div id="content">
					<div ng-view></div>
				</div><!-- content -->
                 <div id="header">
					<h1>{{pageTitle}}</h1>
				</div><!-- header -->
               <div id="leftColumn"></div>
               <div id="rightColumn"></div>
				<div id="footer">
					<div id="nav">
						<div class="play-and-pause">
							<div class="play_btn" ng-click="play_click()"></div>
							<div class="pause_btn" ng-click="pause_click()"></div>
						</div><!-- play-and-pause -->

						<div class="reload_btn" ng-click="reload_click()"></div>
						
						<div class="back">
							<div class="back-enabled" ng-click="changePage('back')"></div>
						</div>
						
						<p class="pageCounter">{{currentPageNum}} / {{pageCount}}</p>
					
						<div class="next">
							<div class="next-enabled" ng-click="changePage('next')"></div>
						</div>
					</div><!-- nav -->
				</div><!-- footer -->
               
			</div><!-- container -->
		</div><!-- player -->
        <audio id="audio">
  			<source src="{{audio}}" type="audio/mpeg">
  			Your browser does not support the audio tag.
		</audio>
	</body>
</html>

