<?php
/** 
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Page de gestion des Animes
 * Affiche une liste des Animes présents dans la base
 * @author  Kojuri
 * @package default
*/
require_once ('include/_metier.lib.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link href="css/listeAnimes.css" rel="stylesheet" type="text/css"/>          
                <?php
				if(isset($_SESSION['login']) and isset($_SESSION['role']))
				{
					if($_SESSION['role'] == 'master'){
					?>
					<div id="addList" class="btAdd"><a href="/ajouterAnime">Ajouter</a></div>
				<?php }}
                // afficher un tableau des Animes
                if ($nbAnimes > 0) {
                    // création du tableau
					?>
					<div class="table-users">
						<div class="header">
						<?php
						if(!isset($options)){
							echo'Liste des Animes de A à Z';
						}
						else{
							foreach($options as $option=>$val){
								echo "$option : $val";
							}
						}
						?> 
						</div>
						<table cellspacing="0">
							<tr  style="display: none">
								<th>Affiche</th>
								<th>Description</th>
							</tr>
					<?php
                    foreach($lesAnimes as $unAnime)  {
                        echo '<tr>';
						$nom = str_replace(' :', '', $unAnime->gettitre());
						$nom = str_replace(' ', '-', $nom);
						$url = $nom.'-VOSTFR-'.$unAnime->getid();
                        echo '<td><a href="Anime/'.$url.'">';
						if(file_exists("./images/affiches/".$unAnime->getid().".jpg")){
							echo '<img class="imgPC"  src="./images/affiches/'.$unAnime->getid().'.jpg" alt="'.$unAnime->gettitre().'" />';
						}
						else{
							echo '<img class="imgPC"  src="./images/affiches/0.jpg" alt="Affiche indisponible" />';
						}
						if(file_exists("./images/posters/".$unAnime->getid().".jpg")){
							echo '<img class="imgMobile"  src="./images/posters/'.$unAnime->getid().'.jpg" alt="'.$unAnime->gettitre().'" />';
						}
						else{
							echo '<img class="imgMobile"  src="./images/affiches/0.jpg" alt="Affiche indisponible" />';
						}
						echo '</a></td>';
                        // afficher les colonnes suivantes
						echo '<td><div class="desc"><div class="titre"><a href="Anime/'
                            .$url.'">'.$unAnime->gettitre().'</a>';
						if(!empty($unAnime->getannee())){
							echo ' <div class="date">'.$unAnime->getannee().'</div>';
						}
						echo '</div><div class="gt">';
						if(!is_null($unAnime->getgenres())){
							$mesGenres = "";
							foreach($unAnime->getgenres() as $unGenre){
								$nom = $unGenre->getnom()." ".$unGenre->getid();
								$url = str_replace(' ', '-', $nom);
								if(!empty($mesGenres)){
									$mesGenres.='&nbsp;&nbsp;-&nbsp;&nbsp;<a href = "/Genre/'.$url.'">'.$unGenre->getnom()."</a>";
								}
								else{
									$mesGenres = "<a href = '/Genre/".$url."'>".$unGenre->getnom()."</a>";
								}
							}
							echo $mesGenres;
						}
						if(!is_null($unAnime->getthemes())){
							$mesThemes = "";
							foreach($unAnime->getthemes() as $unTheme){
								$nom = $unTheme->getnom()." ".$unTheme->getid();
								$url = str_replace(' ', '-', $nom);
								if(!empty($mesThemes) or !is_null($unAnime->getgenres())){
									$mesThemes.='&nbsp;&nbsp;-&nbsp;&nbsp;<a href = "/Theme/'.$url.'">'.$unTheme->getnom().'</a>';
								}
								else{
									$mesThemes = '<a href = "Theme/'.$url.'">'.$unTheme->getnom().'</a>';
								}
							}
							echo $mesThemes;
						}	
						echo '</div>';
						if(!empty($unAnime->getsynopsis())){
							echo '<div class="synopsis">'.$unAnime->getsynopsis().'</div>';
						}
						echo '</div></td></tr>';
                    }
                    echo '</table></div>';
                }
                else {			
                    echo "<div class='notfound'>Aucun anime trouvé !</div>";
                }		
				?>
<script>
	window.addEventListener("load", () => {
		let titre = document.querySelector("title");
		titre.remove();
		let entete = document.querySelector("head");
		let nvtitre = document.createElement("title");
		let texte = document.createTextNode("Animes VOSTFR");
		nvtitre.appendChild(texte);
		entete.appendChild(nvtitre);
	});
</script>
</div>