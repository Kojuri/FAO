<?php
/** 
 * Page d'affichage d'une anime
 * @author Kojuri
 * @package default
*/
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link href="css/consulterAnime.css" rel="stylesheet" type="text/css"/> 
<div id="content">
    <div class="corps-form">
                <?php
                    // création du tableau
                    echo '<div class="table-users"><table class="anime" cellspacing="0">';
                        echo '<tr  style="display: none">
						<th>Picture</th>
						<th>Name</th>
					 </tr>
					 <tr><td>
					 <img class ="imgPC" src="./images/affiches/'
							.$unAnime->getid().'" alt="'.$unAnime->gettitre().'" />
					<img class ="imgMobile" src="./images/posters/'
					.$unAnime->getid().'" alt="'.$unAnime->gettitre().'" />
							</td>';
                        // afficher les colonnes suivantes
						echo '<td><div class="desc"><div class="titre">'.$unAnime->gettitre().'
						<div class="date">'.$unAnime->getannee().'</div></div>';
						if(!is_null($unAnime->getorigine())){
							echo '<div class = "origine">Origine :&nbsp;'.$unAnime->getorigine().'</div>';
						}	
						if(!is_null($unAnime->getstudio())){
							echo '<div class = "studio">Studio :&nbsp;'.$unAnime->getstudio().'</div>';
						}
						if(!is_null($unAnime->getgenres())){
							if(count($unAnime->getgenres()) > 1){
								echo '<div class="genres">Genres : ';
							}
							else{
								echo '<div class="genres">Genre : ';
							}
							$mesGenres = "";
							foreach($unAnime->getgenres() as $unGenre){
								$nom = $unGenre->getnom()." ".$unGenre->getid();
								$url = str_replace(' ', '-', $nom);
								if(!empty($mesGenres)){
									$mesGenres.='&nbsp;&nbsp;-&nbsp;&nbsp;<a href = "/Genre/'.$url.'">'.$unGenre->getnom().'</a>';
								}
								else{
									$mesGenres = '<a href = "/Genre/'.$url.'">'.$unGenre->getnom().'</a>';
								}
							}
							echo $mesGenres."</div>";
						}
						if(!is_null($unAnime->getthemes())){
							if(count($unAnime->getthemes()) > 1){
								echo '<div class="themes">Thèmes : ';
							}
							else{
								echo '<div class="themes">Thème : ';
							}
							$mesThemes = "";
							foreach($unAnime->getthemes() as $unTheme){
								$nom = $unTheme->getnom()." ".$unTheme->getid();
								$url = str_replace(' ', '-', $nom);
								if(!empty($mesThemes)){
									$mesThemes.='&nbsp;&nbsp;-&nbsp;&nbsp;<a href = "/Theme/'.$url.'">'.$unTheme->getnom().'</a>';
								}
								else{
									$mesThemes = '<a href = "/Theme/'.$url.'">'.$unTheme->getnom().'</a>';
								}
							}
							echo $mesThemes."</div>";
							echo '<div class="synopsis">Résumé : '.$unAnime->getsynopsis().'</div></div>';
						}	
						echo '</td></tr>';
                    echo '</table></div>';
					echo '<br/>';
					
				 if(isset($_SESSION['login']) and isset($_SESSION['role']))
				 {
					if($_SESSION['role'] == 'master'){
					?>
					<div class="bt">
					<div class="btAdd"><a href="ajouterEpisode/<?php echo $unAnime->getid() ?>">Ajouter un épisode</a></div>
					<div class="btEdit"><a href ="modifierAnime/<?php echo $unAnime->getid() ?>">Modifier l'anime</a></div>
					<div class="btDelete"><a href ="#" onclick="ConfirmSuppression(); return false;">Supprimer l'anime</a></div>
					</div>
					<br/>
				 <?php } }	
					
				if ($nbEpisodes > 0) {
					$prem = 0;
					try{
						$prem = $lesEpisodes[0];
					}
					catch(Exception $e)
					{
						echo $e;
					}
					if($nbEpisodes == 1 and $prem->getsaison() == 0 and $prem->getnumero() == 0){
						$page = $unAnime->gettitre();
						?>
						<video controls="controls" poster="images/posters/<?php echo $unAnime->getid()?>.jpg" autoplay preload="auto">
						<source src="<?php echo $prem->geturl(); ?>/download" type="video/mp4" >
						</video><br/>
						
						
						<div class = "rs">	
						<div class="g-plusone"></div>
						<div class="tw">
						<a class="twitter-share-button"
					  href="https://twitter.com/intent/tweet?text=<?php echo 'Je viens de regarder '.$page.'
					  ' ?>">
						Tweet</a></div>
						<div id="fb-root"></div>
						<div class="fb-like" data-href="https://www.facebook.com/FrenchAnimeOnline" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
						</div>
						
						
						<?php
					}
					else{
						// création du tableau
						$saison = 1;
						echo '<div class="table-episodes">';
						echo "<h3>Liste des épisodes</h3>";
						echo '<h4>Saison 1</h4><hr>';
						echo '<table class="episodes" cellspacing="0">';
						foreach($lesEpisodes as $unEpisode)  {
							$nom = $unAnime->gettitre()." Saison ".$unEpisode->getsaison()." Episode ".$unEpisode->getnumero()." VOSTFR ".$unEpisode->getid();
							$url = str_replace(' ', '-', $nom);
							if($unEpisode->getsaison() > $saison){
								echo '</table></div>';
								echo '<div  class="table-episodes"><br><h4>Saison '.$unEpisode->getsaison().'</h4><hr>';
								echo '<table class="episodes" cellspacing="0">';
								$saison ++;
							}
							echo '<tr>';
							echo '<td><a href="/Episode/'
								.$url.'">Episode '.$unEpisode->getnumero().'</a></td>';
							echo '<td><a href="/Episode/'
								.$url.'">'.$unEpisode->gettitre().'</a></td>';
							echo '</tr>';
						}
						echo '</table></div>';
					}                  
                }
                else {			
                    echo "<div class='notfound'>Aucun épisode trouvé !</div>";
                }	
                ?>
			<br/>
			</div>


			<div id="disqus_thread"></div>
<script>
var disqus_config = function () {
/*this.page.url = PAGE_URL;*/
this.page.identifier = <?php echo 'anime-'.$unAnime->getid(); ?> ;
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://french-anime-online.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


</div>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
	window.addEventListener("load", () => {
		let titre = document.querySelector("title");
		titre.remove();
		let entete = document.querySelector("head");
		let nvtitre = document.createElement("title");
		let texte = document.createTextNode("<?php echo $unAnime->gettitre()." VOSTFR"; ?>");
		nvtitre.appendChild(texte);
		entete.appendChild(nvtitre);

		var met = document.getElementsByTagName("meta");
		met[0].content = "<?php echo $unAnime->getSynopsis() ?>";

		let g = document.getElementById("___plusone_0");
		g.style.verticalAlign = "top";

		window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
			t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-share-button"));
		
		});

		(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.11';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	

   function ConfirmSuppression() {
	   if (confirm("Voulez-vous vraiment supprimer cet anime ?")) { // Clic sur OK
		   document.location.href ="supprimerAnime/<?php echo $unAnime->getId() ?>";
	   }
   }
</script>
</div>


