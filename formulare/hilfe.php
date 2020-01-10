<!DOCTYPE html>
<html>
  <head>
	<title>MusikWolke 7 | Hilfe</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/hilfe.css">
		<!-- Bootstrap Anfang -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Bootstrap Ende // CSS ¸berschreiben: command:value !important" // -->
	</head>
	<body>
	<div id="ueberschrift" class="text-center">
		<h1>Hilfe</h1>
	</div>
	<div id="button" class="row">
		<br><br><br><br>
		<div class="hidden-xs hidden-sm"></div>
		<div class="col-md-2 "></div>
		<div class="col-md-3 text-center"><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#kontakt" data-whatever="@kontakt">Kontakt</button></div>
		<div class="col-md-2 text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#faq" data-whatever="@faq">FAQ</button></div>
		<div class="col-md-3 text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#copyrights" data-whatever="@copyrights">AGB</button></div>
		<div class="col-md-2"></div>	
	</div>
	<br><br><br><br>
	<div class="info text-center">
		<h1>Info</h1>
		<div class="col-md-12">Du hast Verbesserungsvorschl&#xe4;ge oder m&#xf6;chtest uns beim weiter Entwickeln helfen? Dann erstelle unter <b>"Kontakt"</b> ein Ticket.</div>
		<br><div class="col-md-12">Sende uns eine E-Mail an <b>"support@invode.de"</b> falls das Kontaktformular nicht funktionieren sollte.</div>
		<br><div class="col-md-12"></div>
	</div>
	<br>
	<!-- Modal Kontakt -->
	<div class="modal fade" id="kontakt" tabindex="-1" role="dialog" aria-labelledby="kontakt">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Schlieﬂen"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="kontakt">Kontakt</h4>
		  </div>
		  <div class="modal-body">
			<?php
				include '../formulare/kontakt.php';
			?> 
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&beta;en</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Modal FAQ -->
	<div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="kontakt">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Schlie&beta;en"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="faq">FAQ</h4>
		  </div>
		  <div class="modal-body">
			<?php
				include '../formulare/faq.php';
			?> 
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&beta;en</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Modal Copyrights -->
	<div class="modal fade" id="copyrights" tabindex="-1" role="dialog" aria-labelledby="copyrights">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Schlieﬂen"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="copyrights">AGB</h4>
		  </div>
		  <div class="modal-body">
	 		<?php
				include '../formulare/copyrights.php';
			?> 
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Schlieﬂen</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Footer -->
	<div class="text-center hidden-lg hidden-md">
		<a href="/index.php">Zur&#xfc;ck zum Login</a> |
		<a href="/musiccloud/index.php">Home</a>
	</div>	
		<div class="col-xs-12 text-center footer hidden-xs hidden-sm">
			<a href="/index.php">Zur&#xfc;ck zum Login</a> |
			<a href="/musiccloud/index.php">Home</a>
			<br>Designed by Markus and Function by Z0mGr0HD
			<br>&copy 2016 All rights reserved
		</div>
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird f¸r Bootstrap JavaScript-Plugins benˆtigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
	</body>
</html>
