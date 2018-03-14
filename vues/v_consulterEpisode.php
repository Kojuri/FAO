<?php
/** 
 * Page d'affichage d'une attaque
 * @author Kojuri
 * @package default
*/
?>
<link href="css/fond.css" rel="stylesheet" type="text/css" media="all" />
<div id="content">
<?php
	$page = "";
	if($unEpisode->getsaison() > 1){
		echo "<h3 class='titreAnime'>".$unAnime->gettitre()." Saison ".$unEpisode->getsaison()." Episode ".$unEpisode->getnumero()." VOSTFR : 
	".$unEpisode->gettitre()."</h3>";
	$page = $unAnime->gettitre()." Saison ".$unEpisode->getsaison()." Episode ".$unEpisode->getnumero()." VOSTFR : 
	".$unEpisode->gettitre();
	}
    else{
		echo "<h3 class='titreAnime'>".$unAnime->gettitre()." Episode ".$unEpisode->getnumero()." VOSTFR : 
	".$unEpisode->gettitre()."</h3>";
	$page = $unAnime->gettitre()." Episode ".$unEpisode->getnumero()." VOSTFR : 
	".$unEpisode->gettitre();
	}


	if(stristr($unEpisode->geturl(), 'kojuri') === FALSE) {
		echo $unEpisode->geturl();
	}
	else{
		?>
			<video controls="controls" poster="images/posters/<?php echo $unAnime->getid()?>.jpg" autoplay preload="auto">
				<source src="<?php echo $unEpisode->geturl(); ?>/download" type="video/mp4" >
			</video>
		<?php
	}
?>

	<br/>
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


<div id="disqus_thread"></div>
<script>
var disqus_config = function () {
/*this.page.url = PAGE_URL;*/
this.page.identifier = <?php echo 'episode-'.$unEpisode->getid(); ?> ;
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
<script type='text/javascript'>
	window.addEventListener("load", () => {
		let titre = document.querySelector("title");
		titre.remove();
		let entete = document.querySelector("head");
		let nvtitre = document.createElement("title");
		let texte = document.createTextNode("<?php 
		if($unEpisode->getsaison() > 1){
			echo $unAnime->gettitre()." Saison ".$unEpisode->getsaison()." Episode ".$unEpisode->getnumero()." VOSTFR";
		}
		else{
			echo $unAnime->gettitre()." Episode ".$unEpisode->getnumero()." VOSTFR";
		}
		?>");
		nvtitre.appendChild(texte);
		entete.appendChild(nvtitre);

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
</script>


</div>