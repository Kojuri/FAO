<?php
/** 
 * Page permettant l'ajout d'un Episode
 * @author 
 * @package default
*/

require_once ('include/_metier.lib.php');
?>
<link href="css/fond.css" rel="stylesheet" type="text/css" media="all" />
<fieldset>
<div id="formAdd" >    
    <?php AdminRender::showNotifications(); ?>
        <form action="index.php?uc=gererEpisodes&action=ajouterEpisode&option=validerEpisode" method="post">
                    <table class="table-responsive table-condensed" >
						<?php 
						echo'<tr><td>
						<label>
							Anime :
						</label></td><td class="liste-animes">';
							afficherAnimes($lesAnimes,"cbxAnimes",0,"none",$strAnime);	
						?>
						</td></tr>
						<tr>
                            <td valign="top">
                                <label for="txtSaison">
                                    Saison :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtSaison" 
                                    name="txtSaison"
                                    size="2" maxlength="2"
                                    <?php
                                        if (!empty($strSaison)) {
                                            echo ' value="'.$strSaison.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="txtNumero">
                                    Numéro :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtNumero" 
                                    name="txtNumero"
                                    size="3" maxlength="3"
                                    <?php
                                        if (!empty($strNumero)) {
                                            echo ' value="'.$strNumero.'"';
                                        }
                                    ?>
								required
                                />
                            </td>
                        </tr>
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
                                <label for="txtURL">
                                    URL :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtURL" 
                                    name="txtURL"
                                    size="20" maxlength="200"
                                    <?php
                                        if (!empty($strURL)) {
                                            echo ' value="'.$strURL.'"';
                                        }
                                    ?>
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