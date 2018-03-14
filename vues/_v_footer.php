<div class="footer">
	<div class="w3l_social_icons w3l_social_icons1 two">
		<ul>
			<li><a href="https://discord.gg/2JAzRT8" target="_blank" class="google_plus"><img src="images/discord.png" alt="Discord" height="auto" width="30px"/></a></li>
			<li><a href="https://www.facebook.com/FrenchAnimeOnline" target="_blank" class="facebook"><i class="fa fa-facebook" aria-hidden="true" ></i></a></li>
			<li><a href="https://twitter.com/Kojuriii" target="_blank" class="twitter"><i class="fa fa-twitter" aria-hidden="true" ></i></a></li>
			<li><a href="https://plus.google.com/u/3/b/116365241416810230594/116365241416810230594" target="_blank" class="google_plus"><i class="fa fa-google-plus" aria-hidden="true" ></i></a></li>
			<li><a href="mailto:contact@french-anime.online" target="_blank" class="google_plus"><i class="fa fa-envelope-o" aria-hidden="true" ></i></a></li>
			<li><a href="https://myanimelist.net/animelist/Hinokeen" target="_blank" class="google_plus"><img src="images/mal.png" height="auto" width="30px" alt="MyAnimeList" /></a></li>
		</ul>
	</div>
</div>
			<div class="copyright-wthree">
				<p>&copy; 2018 French Anime Online<br>
				<?php 
					if(isset($_SESSION['login']) and isset($_SESSION['role']) and $_SESSION['role'] == 'master'){
						$nbVisites = file_get_contents("https://french-anime.online/compteur_visites.txt");
						echo "Nombre de visites : $nbVisites";
					}	
				?>
				<!-- . All Rights Reserved--></p>
			</div>