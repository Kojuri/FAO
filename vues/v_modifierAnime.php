<?php
/** 
 * Page permettant l'ajout d'un Anime
 * @author 
 * @package default
*/

require_once ('include/_metier.lib.php');
?>
<link href="css/fond.css" rel="stylesheet" type="text/css" media="all" />
<div id="formAdd" >    
    <?php AdminRender::showNotifications(); ?>
        <form action="index.php?uc=gererAnimes&action=modifierAnime&option=validerAnime&id=<?php echo $unAnime->getid() ?>" method="post">
            <div class="corps-form">
                    <table class="table-responsive table-condensed" >
                        <tr>
                            <td valign="top">
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
                            <td valign="top">
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
                            <td valign="top">
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
                            <td valign="top">
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
                            <td valign="top">
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
                            <td valign="top">
                                <label for="chGenres">
                                    Genres :
                                </label>
                            </td>
                            <td>
							<?php
								foreach($lesGenres as $unGenre){
									echo '<input type="checkbox" id="'.$unGenre->getid().'" name="genres[]" value="'.$unGenre->getid().'">&nbsp;';
									echo '<label for="'.$unGenre->getid().'">'.$unGenre->getnom().'</label>&nbsp;&nbsp;';
								}
							?>
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="chThemes">
                                    Thèmes :
                                </label>
                            </td>
                            <td>
							<?php
								foreach($lesThemes as $unTheme){
									echo '<input type="checkbox" id="'.$unTheme->getid().'" name="themes[]" value="'.$unTheme->getid().'">&nbsp;';
									echo '<label for="'.$unTheme->getid().'">'.$unTheme->getnom().'</label>&nbsp;&nbsp;';
								}
							?>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="pied-form">
                <p>
                    <input id="cmdValider" name="cmdValider" 
                           type="submit"
                           value="Modifier"
                    />
                </p> 
            </div>
        </form>
</div>          
