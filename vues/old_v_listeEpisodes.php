<?php
/** 
 * 
 * Anime Online
 * © Anime Online, 2017
 * 
 * Page de gestion des Episodes
 * Affiche une liste des Episodes présents dans la base
 * @author  Kojuri
 * @package default
*/
require_once ('include/_metier.lib.php');
?>
<div id="content">
    <h2>Liste des Episodes</h2>
	
    <div class="corps-form">
        <fieldset>	
            <legend>Episodes</legend>
            <div id="object-list">
                <?php
                if($nbEpisodes<=1)
				{
					echo '<span>'.$nbEpisodes.' épisode trouvé'
                        . '</span><br /><br />';
				}
				else
				{
					echo '<span>'.$nbEpisodes.' épisodes trouvés'
                        . '</span><br /><br />';
				}
                // afficher un tableau des Episodes
                if ($nbEpisodes > 0) {
                    // création du tableau
                    echo '<table class="table-responsive table-condensed table-striped table-hover style="text-align:center">';
                    // affichage de l'entete du tableau 
                    echo '<tr class="thead-inverse">';
                    // création entete tableau avec noms de colonnes  
                    echo '<th style="text-align:center">ID</th>';
					echo '<th style="text-align:center">Numéro</th>';
                    echo '<th style="text-align:center">Titre</th>';
				    echo '<th style="text-align:center">URL</th>';
					echo '<th style="text-align:center">Anime</th>';
					echo '<th style="text-align:center">Saison</th>';
				    echo '</tr>';
                    // affichage des lignes du tableau
                    $n = 0;
                    foreach($lesEpisodes as $unEpisode)  {
                        if (($n % 2) == 1) {
                            echo '<tr class="impair">';
                        }
                        else {
                            echo '<tr class="pair">';
                        }
                        // afficher la colonne 1 dans un hyperlien
                        echo '<td><a href="Attaques/'
                            .$unEpisode->getid().'">'.$unEpisode->getid().'</a></td>';
                        // afficher les colonnes suivantes
                        echo '<td>'.$unEpisode->getnumero().'</td>';
						echo '<td>'.$unEpisode->gettitre().'</td>';
						echo '<td>'.$unEpisode->geturl().'</td>';
						echo '<td>'.$unEpisode->getid_anime().'</td>';
						echo '<td>'.$unEpisode->getsaison().'</td>';
						echo '</tr>';
                        $n++;
                    }
                    echo '</table>';
                }
                else {			
                    echo "Aucun épisode trouvé !";
                }		
                ?>
            </div>
        </fieldset>
    </div>
</div>