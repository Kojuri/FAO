
<?php
/** 
 * 
 * French Anime Online
 * © French Anime Online, 2017
 * 
 * Page de gestion des Themes
 * Affiche une liste des Themes présents dans la base
 * @author  Kojuri
 * @package default
*/
require_once ('include/_metier.lib.php');
?>
<link href="css/fond.css" rel="stylesheet" type="text/css" media="all" />
<div id="content">
    <h3 class="titreliste">Liste des Thèmes</h3>
    <div class="corps-form">
            <div id="object-list">
                <?php
				if(isset($_SESSION['login']) and isset($_SESSION['role']))
				{
					if($_SESSION['role'] == 'master'){
					?>
					<div id="addList" class="btAdd"><a href="/ajouterTheme">Ajouter</a></div>
				<?php }}
                // afficher un tableau des Themes
                if ($nbThemes > 0) {
                    // création du tableau
                    echo '<ul>';
                    foreach($lesThemes as $unTheme)  {
						$nom = $unTheme->getnom()." ".$unTheme->getid();
						$url = str_replace(' ', '-', $nom);
                        echo '<li class="liGenres">';
						echo '<a href="Theme/'
                            .$url.'">'.$unTheme->getnom().'</a>';
						echo '</li>';
					}
                    echo '</ul>';
                }
                else {			
                    echo "Aucun thème trouvé !";
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
		let texte = document.createTextNode("Thèmes");
		nvtitre.appendChild(texte);
		entete.appendChild(nvtitre);
	});
</script>
</div>