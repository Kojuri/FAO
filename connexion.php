<link href="css/fond.css" rel="stylesheet" type="text/css" media="all" />
<h3>Connexion en tant qu'administrateur</h3>
<fieldset>
<div id="connexion">
<form id="connexionForm" method="post" action="index.php?uc=checklogin">
<span id="erreur"></span>
<table class = "table-condensed table-responsive">
<tr>
<td>
Identifiant : 
</td>
<td>
<input type = "text" id="id" name="id" />
</td>
</tr>
<tr>
<td>
Mot de passe :&nbsp;
</td>
<td>
<input style="color:black" type = "password" id="pw" name="pw" />
</td>
</tr>
<tr>
<td style = "text-align:center" colspan = "2">
<input type = "submit" value = "Valider" name = "valider"/>
</td>
</tr>
</table>
</form>
</div>
</div>
</fieldset>
<?php
	/*
	if(isset($_GET['valider']))
	{
		if($_GET['id']!="admin")
		{
			echo "<div>Identifiant incorrect !</div>";
		}
		elseif($_GET['pw']!="root")
		{
			echo "Mot de passe incorrect !";
		}
		else
		{
			echo "Vous êtes connecté !";
			session_start();
			$_SESSION['login'] = $_GET['id'];
			Location : "./";
		}
	}	*/
?>
<!--
<script>
$(document).ready( function () { 
	$("#connexionForm").submit( function() {	// à la soumission du formulaire						 
		$.ajax({ // fonction permettant de faire de l'ajax
		   type: "POST", // methode de transmission des données au fichier php
		   url: "check_login.php", // url du fichier php
		   data: "login="+$("#id").val()+"&pass="+$("#pw").val(), // données à transmettre
		   success: function(msg){ // si l'appel a bien fonctionné
				if(msg==1) // si la connexion en php a fonctionnée
				{
					$("div#connexion").html("<span id=\"confirmMsg\">Vous &ecirc;tes maintenant connect&eacute;.</span>");
					// on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
					document.location.href="./";
				}
				else // si la connexion en php n'a pas fonctionnée
				{
					$("span#erreur").html("&nbsp;Erreur lors de la connexion, veuillez v&eacute;rifier votre identifiant et votre mot de passe.");
					// on affiche un message d'erreur dans le span prévu à cet effet
				}
		   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire
	});
});
</script>
-->
