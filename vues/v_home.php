<?php
/** 
 * Page d'accueil de l'application French Anime Online

 * Page d'accueil
 * @author Kojuri
 * @package default
 */
?>
<link href="css/accueil.css" rel="stylesheet" type="text/css" media="all" />
		<!--<div class="logo">
				<h1><a href="./">French Anime Online</a></h1>
			</div>
			<div class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="slider-info">
							  <p>Regardez vos animes en VOSTFR directement en ligne.</p>
						</div>
					</li>
					<li>
						<div class="slider-info">
						<p>De nouveaux épisodes & animes ajoutés régulièrement.</p>
						</div>
					</li>
					<li>
						<div class="slider-info">
						<p>Découvrez des animes insolites en qualité HD.</p>
						</div>
					</li>
				</ul></div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>-->
	<!--//Slider-->
	<div class="news">
	<br/>
		<h3>Derniers animes mis à jour</h3>
		<?php
			if(!empty($lesAnimes)){
				foreach($lesAnimes as $unAnime){
					echo '<div class="affiche">';
					$nom = str_replace(' :', '', $unAnime->gettitre());
					$nom = str_replace(' ', '-', $nom);
					$url = $nom.'-VOSTFR-'.$unAnime->getid();
					echo '<h4 class="nomAnime"><a href="Anime/'.$url.'">'.$unAnime->gettitre().'</a></h4>';
					if(file_exists("./images/affiches/".$unAnime->getid().".jpg")){
						echo '<a href="Anime/'.$url.'"><img src="./images/affiches/'.$unAnime->getid().'.jpg" alt="'.$unAnime->gettitre().'" /></a>';
					}
					else{
						echo '<a href="Anime/'.$url.'"><img src="./images/affiches/0.jpg" alt="Affiche indisponible" /></a>';
					}
					echo '</div>';
				}
			}
		?>
		<br/><br/>
		<h3>Derniers épisodes ajoutés</h3>
		<?php
			if(!empty($lesEpisodes)){
				foreach($lesEpisodes as $unEpisode){
					$unAnime = $tbAnimeEp[$unEpisode->getid()];
					echo '<div class="affiche">';
					$nom = $unAnime->gettitre()." Saison ".$unEpisode->getsaison()." Episode ".$unEpisode->getnumero()." VOSTFR ".$unEpisode->getid();
					$url = str_replace(' ', '-', $nom);
					if($unEpisode->getsaison() > 1){
						echo '<a href="/Episode/'
                            .$url.'"><h4 class="titre">'.$unAnime->gettitre().' Saison '.$unEpisode->getsaison().' Episode '.$unEpisode->getnumero().' VOSTFR</h4></a>';
					}
					else{
						echo '<a href="/Episode/'
                            .$url.'"><h4 class="titre">'.$unAnime->gettitre().' Episode '.$unEpisode->getnumero().' VOSTFR</h4></a>';
					}
					echo '<video controls="controls" poster="images/posters/'.$unAnime->getid().'.jpg" preload="none">
							<source src="'.$unEpisode->geturl().'/download" type="video/mp4" >
						</video>';
					echo '</div>';
				}
			}
		?>
	</div>