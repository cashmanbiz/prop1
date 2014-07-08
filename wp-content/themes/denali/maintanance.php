<?php
/*
Source: http://www.kevinleary.net/custom-maintenance-mode-page-wordpress/
*/

/* Tell search engines that the site is temporarily unavilable */
$protocol = $_SERVER["SERVER_PROTOCOL"];
if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol ) $protocol = 'HTTP/1.0';
header( "$protocol 503 Service Unavailable", true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );
header( 'Retry-After: 600' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sorry! We're doing some routine maintenance.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">    
        html body, html {
            background:#EFEDE1;
        }
        #content-outer {
            position: absolute;
            top: 50%;
            left: 0px;
            width: 100%;
            height: 1px;
            overflow: visible;
        }
        .motivation-maker {
            width:256px;
            height:256px;
            display:block;
            position:relative;
            left:450px;
            top:-50px;
            z-index:5;
        }
        #content {
            color:#605850;
            font:14px/1.6em "Lucida Grand", "Lucida Sans", "Lucida Sans Unicode", Arial;
            width:420px;
            height:auto;
            margin-left:-322px;
            position:absolute;
            left:50%;
            top:-150px;
            -moz-border-radius:11px;
            -khtml-border-radius:11px;
            -webkit-border-radius:11px;
            border-radius:5px;
            background:#fff;
            padding:25px 200px 10px 25px;
        }
        #content h1 {
            line-height:1.2em;
            margin-top:-257px;
            color:#2E1F0F;
        }
        #content p {
            margin:0 0 1.2em;
        }
        h1,h2,h3 {
            font-family:Calibri, "Franklin Gothic", Arial;
            color:#111;
        }
        h1 { margin: 0 0 .6em;  }
        h2 { margin: 1.07em 0 .535em; }
        h3 { margin: 1.14em 0 .57em; }
        h4 { margin: 1.23em 0 .615em; }
        h5 { margin: 1.33em 0 .67em; }
        h6 { margin: 1.6em 0 .8em; }
        strong {
            color:#D47F31;
        }
        a:link,
        a:visited {
            color:#D54E21;
            text-decoration:none;
        }
        a:hover,
        a:active {
            color:#56A5EC;
        }
    </style>
</head>
<body>
 
<div id="content-outer">
    <div id="content">
        <img src="<?php bloginfo('template_url'); ?>/img/coffee_machine-256.png" class="motivation-maker" />    
        
        <h1>We're on a quick coffee break.</h1>
        <?php if(current_user_can('manage_options')): ?>
        <p>
            <?php if($denali_theme_settings[maintanance_mode] == 'true'): ?>
            Administrator, this page is displayed because the site is in maintanance mode. 
            <?php else: ?>
            Administrator, this splash page is displayed because WP-Property is not active.  This theme is not functional without the plugin, please download and activate.            
            <?php endif; ?>
        </p>
        <?php endif; ?>
        <p>We apologize for the inconvenience, we're doing our best to get things back to working order for you.</p>
        
        
    </div><!-- end #content -->
</div><!-- end #content-outer -->
 
<?php
/* This passes control back to the wordpress upgrade routine */
die();
/* Don't change this */
