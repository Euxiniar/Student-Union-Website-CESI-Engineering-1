<html>
    <head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="../assets/css/footer.css">
    </head>
    <body>
    <!-- Footer -->

	<?php
	if(isset($_COOKIE['accept_cookie'])) {
		$showcookie = false;
	 } else {
		$showcookie = true;
	 }
	 
	?>
	<?php if($showcookie) { ?>
		<div class="cookie-alert">
		En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies pour vous proposer des contenus et services adaptés à vos centres d’intérêts.<br /><a href="../common/accept_cookie.php">OK</a>
		</div>
	<?php } ?>

	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4 ml-auto">
					<h5>Liens rapides</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="../connected/home.php"><i class="fa fa-angle-double-right"></i>Accueil</a></li>
						<li><a href="../store/"><i class="fa fa-angle-double-right"></i>Boutique</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 ml-auto ml-auto">
					<h5>CESI Exia</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.cesi.fr/"><i class="fa fa-angle-double-right"></i>Le CESI</a></li>
						<li><a href="https://www.cesi.fr/travailler-chez-cesi/"><i class="fa fa-angle-double-right"></i>Recrutement</a></li>
						<li><a href="../legal/"><i class="fa fa-angle-double-right"></i>Mentions légales</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.facebook.com/CESIingenieurs/?ref=br_rs"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/GroupeCESI"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/campus_cesi/"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="https://www.linkedin.com/company/groupe-cesi/"><i class="fa fa-linkedin-in"></i></a></li>
						<li class="list-inline-item"><a href="https://www.youtube.com/user/groupecesi1/" target="_blank"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
				<hr/>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.cesi.fr/" target="_blank">CESI.Exia</a></p>
				</div>
				<hr/>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->
    </body>
</html>