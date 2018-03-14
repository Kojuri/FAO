<?php
/** 
 * Page permettant l'ajout d'un Anime
 * @author 
 * @package default
*/

require_once ('include/_metier.lib.php');
?>
<link href="css/fond.css" rel="stylesheet" type="text/css" media="all" />
<?php
     if( !empty($message) ) 
     {
       echo '<p>',"\n";
       echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
       echo "\t</p>\n\n";
     }
?>
<fieldset>
<div id="formAdd" >    
        <form enctype="multipart/form-data" action="index.php?uc=gererAnimes&action=ajouterAnime&option=validerAnime" method="post">
                    <table class="table-responsive table-condensed" >
                        <tr>
                            <td style="width:30%">
                                <label for="txtID">
                                    ID :
                                </label>
                            </td>
                            <td style="width:70%">
                                <input 
                                    type="text" id="txtID" 
                                    name="txtID"
                                    size="3" maxlength="3"
                                    <?php
                                        if (!empty($newid)) {
                                            echo ' value="'.$newid.'"';
                                        }
                                    ?>
									disabled
                                />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label for="txtTitre">
                                    Titre :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtTitre" 
                                    name="txtTitre"
                                    size="50" maxlength="200"
                                    <?php
                                        if (!empty($strTitre)) {
                                            echo ' value="'.$strTitre.'"';
                                        }
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label for="txtOrigine">
                                    Origine :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtOrigine" 
                                    name="txtOrigine"
                                    size="20" maxlength="30"
                                    <?php
                                        if (!empty($strOrigine)) {
                                            echo ' value="'.$strOrigine.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label for="txtStudio">
                                    Studio :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtStudio" 
                                    name="txtStudio"
                                    size="20" maxlength="50"
                                    <?php
                                        if (!empty($strStudio)) {
                                            echo ' value="'.$strStudio.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label for="txtSynopsis">
                                    Synopsis :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtSynopsis" 
                                    name="txtSynopsis"
                                    size="100" maxlength="5000000"
                                    <?php
                                        if (!empty($strSynopsis)) {
                                            echo ' value="'.$strSynopsis.'"';
                                        }
                                    ?>
                                />
                            </td>
						</tr>
						<tr>
                            <td>
                                <label for="txtAnnee">
                                    Année :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtAnnee" 
                                    name="txtAnnee"
                                    size="4" maxlength="4"
                                    <?php
                                        if (!empty($strAnnee)) {
                                            echo ' value="'.$strAnnee.'"';
                                        }
                                    ?>
								required
                                />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Genres :
                                </label>
                            </td>
                            <td>
							<?php
								foreach($lesGenres as $unGenre){
									echo '<input type="checkbox" name="genres[]" value="'.$unGenre->getid().'">&nbsp;';
									echo '<label>'.$unGenre->getnom().'</label>&nbsp;&nbsp;';
								}
							?>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Thèmes :
                                </label>
                            </td>
                            <td>
							<?php
								foreach($lesThemes as $unTheme){
									echo '<input type="checkbox" name="themes[]" value="'.$unTheme->getid().'">&nbsp;';
									echo '<label>'.$unTheme->getnom().'</label>&nbsp;&nbsp;';
								}
							?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="fileAffiche">
                                    Affiche :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="file" id="fichier_affiche" 
                                    name="fichier_affiche"
                                />
                            </td>
                        </tr>
                    </table>
            <div class="pied-form">
                <p>
                    <input id="cmdValider" name="cmdValider" 
                           type="submit"
                           value="Ajouter"
                    />
                </p> 
            </div>
        </form>
</div>      
</div>   
<fieldset> 