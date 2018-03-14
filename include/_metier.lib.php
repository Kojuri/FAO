<?php

/*
 * PHP - Bibliothèques de fonctions
 * Fonctions métier
 */

// la bibliothèque d'accès aux données

function afficherListe($res, $nom, $onchange,$defaut,$mode,$select)
{
		switch($onchange){
			case 0:
			{
				echo '<select name ='.$nom.' size="1">';
			}break;
			case 1:
			{
				echo '<select name ='.$nom.' size="1" onchange="submit()">';
			}break;
			default:
			{
				echo '<select name ='.$nom.'>';
			}break;
		}
		if($defaut != "none")
		{
			echo '<option value="'.$defaut.'">'.$defaut.'</option>';
		}
		foreach($res as $ligne)
		{
			switch($mode){
				case 0:{
					if($select==$ligne[0])
					{
						echo '<option value = "'.$ligne[0].'" selected="selected">'.$ligne[0].'</option>';	
						$juste="vrai";
					}
					else
					{
						echo '<option value = "'.$ligne[0].'">'.$ligne[0].'</option>';	
					}		
				}break;
				case 1:{
					if($select==$ligne)
					{
						echo '<option value = "'.$ligne.'" selected="selected">'.$ligne.'</option>';
					}
					else
					{
						echo '<option value = "'.$ligne.'">'.$ligne.'</option>';
					}
				}break;
				default:{
					if($select==$ligne[0])
					{
						echo '<option value = "'.$ligne[0].'" selected="selected">'.$ligne[0].'</option>';	
					}
					else
					{
						echo '<option value = "'.$ligne[0].'">'.$ligne[0].'</option>';	
					}			
				}break;				
			}
		}
		echo '</select>';	
}


function afficherAnimes($res, $nom, $onchange,$defaut, $select)
{
		switch($onchange){
			case 0:
			{
				echo '<select name ='.$nom.' size="1">';
			}break;
			case 1:
			{
				echo '<select name ='.$nom.' size="1" onchange="submit()">';
			}break;
			default:
			{
				echo '<select name ='.$nom.'>';
			}break;
		}
		if($defaut != "none")
		{
			echo '<option value="'.$defaut.'">'.$defaut.'</option>';
		}
		foreach($res as $ligne)
		{
			if(!empty($select) and $select->getid() == $ligne->getid())
			{
				echo '<option value = "'.$ligne->getid().'" selected="selected">'.$ligne->gettitre().'</option>';	
			}
			else
			{
				echo '<option value = "'.$ligne->getid().'">'.$ligne->gettitre().'</option>';	
			}		
		}
		echo '</select>';	
}


function str_to_noaccent($str)
{
    $url = $str;
    $url = preg_replace('#Ç#', 'C', $url);
    $url = preg_replace('#ç#', 'c', $url);
    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
    $url = preg_replace('#ý|ÿ#', 'y', $url);
    $url = preg_replace('#Ý#', 'Y', $url);
     
    return ($url);
}