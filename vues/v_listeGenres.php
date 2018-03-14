
<?php
/** 
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Page de gestion des Genres
 * Affiche une liste des Genres présents dans la base
 * @author  Kojuri
 * @package default
*/
require_once ('include/_metier.lib.php');
?>
<link href="css/fond.css" rel="stylesheet" type="text/css" media="all" />
<div id="content">
    <h3 class="titreliste">Liste des Genres</h3>
    <div class="corps-form">
            <div id="object-list">
                <?php
				if(isset($_SESSION['login']) and isset($_SESSION['role']))
				{
					if($_SESSION['role'] == 'master'){
					?>					
					<div id="addList" class="btAdd"><a href="/ajouterGenre">Ajouter</a></div>
				<?php }}
                // afficher un tableau des Genres
                if ($nbGenres > 0) {
                    // création du tableau
                    echo '<ul>';
                    foreach($lesGenres as $unGenre)  {
                        echo '<li class="liGenres">';
						$nom = $unGenre->getnom()." ".$unGenre->getid();
						$url = str_replace(' ', '-', $nom);
						echo '<a href="Genre/'
                            .$url.'">'.$unGenre->getnom().'</a>';
						echo '</li>';
					}
                    echo '</ul>';
                }
                else {			
                    echo "Aucun genre trouvé !";
                }		
                ?>
            </div>
    </div>
</div>
<script type='text/javascript'>
	window.addEventListener("load", () => {
		let titre = document.querySelector("title");
		titre.remove();
		let entete = document.querySelector("head");
		let nvtitre = document.createElement("title");
		let texte = document.createTextNode("Genres");
		nvtitre.appendChild(texte);
		entete.appendChild(nvtitre);
	});
</script>
</div>