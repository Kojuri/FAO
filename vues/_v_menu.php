		<header>
			<div class="top-nav">
				<span class="menu"><img src="images/menu.png" alt=""/></span>
				<nav class="ayanEffects  ayanHoverEffect_3">
					<ul>
						<li id="logomenu"></li>
						<li><a class="scroll" href="/"><span>Accueil</span></a></li> 
						<li><a class="scroll" href="/Animes"><span>Tous les Animes</span></a></li> 
						<li><a class="scroll" href="/Anime/Nanatsu-no-Taizai-VOSTFR-10"><span>Nanatsu no Taizai</span></a></li>
                        <li><a class="scroll" href="/Anime/Fate/Extra-Last-Encore-VOSTFR-16"><span>Fate/Extra</span></a></li> 					
						<?php
						if(isset($_SESSION['login']) and isset($_SESSION['role']) and $_SESSION['role'] == 'master'){
							echo '<li><a class="scroll" href="/Deconnexion"><span>Déconnexion</span></a></li>';
						}
						?>
					</ul>
				</nav>			
			</div>
			<div class="clearfix"> </div>

			<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1900px;height:300px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="images/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1900px;height:300px;overflow:hidden;">
            <div data-p="275.00">
                <img data-u="image" src="images/banner-animes-mangas-ddl-new.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/ka-blades.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/a.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/kururu-ons.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/sg.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/alisa-ge.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/saoos-banner.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/tamamo.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/gc.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/rory.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/be.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/nero.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/black-kirito.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/agk.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/ngnl-banner.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/aalm.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/aincradka.jpg" />
            </div>
            <div data-p="275.00">
                <img data-u="image" src="images/gilga.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
		</header>	
