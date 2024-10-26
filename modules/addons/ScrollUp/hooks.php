<?php

use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined("WHMCS")) die("This file cannot be accessed directly");

function ScrollUp_ClientAreaHeadOutput_Hook($vars)
{
  if(file_exists('modules/addons/ScrollUp/lang/'.$vars['activeLocale']['language'].'.php'))
  {
    require_once('modules/addons/ScrollUp/lang/'.$vars['activeLocale']['language'].'.php');
  }
  elseif(file_exists('modules/addons/ScrollUp/lang/english.php'))
  {
    require_once('modules/addons/ScrollUp/lang/english.php');
  }



  $SLSETTINGS = array();
  $results = Capsule::table('tbladdonmodules')->where('module', 'scrollup')->get();
  foreach ($results as $result)
  {
    $setting = $result->setting;
    $value   = $result->value;
    $SLSETTINGS[$setting] = $value;
  }

  if($SLSETTINGS["style"] == 'Tab')
  {
    $style = 'tab';
  }
  if($SLSETTINGS["style"] == 'Pill')
  {
    $style = 'pill';
  }
  if($SLSETTINGS["style"] == 'Link')
  {
    $style = 'link';
  }

  if($SLSETTINGS["active"])
  {
    if($style)
    {
      $hook .= "<link id=\"scrollUpTheme\" rel=\"stylesheet\" href=\"".$vars['WEB_ROOT']."/modules/addons/ScrollUp/includes/html/css/".$style.".css\">\r";

      $scrollimg = 'false';
    }
    else
    {
      if($SLSETTINGS["image"] == 'Style 1'){ $image = $vars['WEB_ROOT'].'/modules/addons/ScrollUp/includes/html/img/up0.png';}
      if($SLSETTINGS["image"] == 'Style 2'){ $image = $vars['WEB_ROOT'].'/modules/addons/ScrollUp/includes/html/img/up1.png';}
      if($SLSETTINGS["image"] == 'Style 3'){ $image = $vars['WEB_ROOT'].'/modules/addons/ScrollUp/includes/html/img/up2.png';}
      if($SLSETTINGS["image"] == 'Style 4'){ $image = $vars['WEB_ROOT'].'/modules/addons/ScrollUp/includes/html/img/up3.png';}
      if($SLSETTINGS["image"] == 'Style 5'){ $image = $vars['WEB_ROOT'].'/modules/addons/ScrollUp/includes/html/img/up4.png';}
      if($SLSETTINGS["image"] == 'Style 6'){ $image = $vars['WEB_ROOT'].'/modules/addons/ScrollUp/includes/html/img/up5.png';}
      if($SLSETTINGS["image"] == 'Custom image'){ $image = $SLSETTINGS["imageurl"];}

      $hook .= '<style>#scrollUp {background: url('.$image.') no-repeat;}</style>';
      $hook .= "<link id=\"scrollUpTheme\" rel=\"stylesheet\" href=\"".$vars['WEB_ROOT']."/modules/addons/ScrollUp/includes/html/css/image.css\">\r";

      $scrollimg = 'true';
    }

    $hook .= "<script type=\"text/javascript\" src=\"".$vars['WEB_ROOT']."/modules/addons/ScrollUp/includes/html/js/jquery.easing.min.js\"></script>\r";
    $hook .= "<script type=\"text/javascript\" src=\"".$vars['WEB_ROOT']."/modules/addons/ScrollUp/includes/html/js/jquery.scrollUp.js\"></script>\r";

    $hook .= "<script>
		$(function () {
			$.scrollUp({
		        scrollName: 'scrollUp', // Element ID
		        scrollDistance: 300, // Distance from top/bottom before showing element (px)
		        scrollFrom: 'top', // 'top' or 'bottom'
		        scrollSpeed: 300, // Speed back to top (ms)
		        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
		        animation: 'fade', // Fade, slide, none
		        animationInSpeed: 200, // Animation in speed (ms)
		        animationOutSpeed: 200, // Animation out speed (ms)
		        scrollText: '".$_ADDONLANG['scrolltotop']."', // Text for element, can contain HTML
		        scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
		        scrollImg: ".$scrollimg.", // Set true to use image
		        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		        zIndex: 2147483647 // Z-Index for the overlay
			});
		});
	</script>";

  }

  return $hook;
}

add_hook("ClientAreaHeadOutput",1,"ScrollUp_ClientAreaHeadOutput_Hook");

function ScrollUp_AdminAreaHeadOutput_Hook($vars)
{
  if(file_exists('../modules/addons/ScrollUp/lang/'.$_SESSION['Language'].'.php'))
  {
    require_once('../modules/addons/ScrollUp/lang/'.$_SESSION['Language'].'.php');
  }
  elseif(file_exists('../modules/addons/ScrollUp/lang/english.php'))
  {
    require_once('../modules/addons/ScrollUp/lang/english.php');
  }
  
  $SLSETTINGS = array();
  $results = Capsule::table('tbladdonmodules')->where('module', 'scrollup')->get();
  foreach ($results as $result)
  {
    $setting = $result->setting;
    $value   = $result->value;
    $SLSETTINGS[$setting] = $value;
  }
  
  if($SLSETTINGS["style"] == 'Tab')
  {
    $style = 'tab';
  }
  if($SLSETTINGS["style"] == 'Pill')
  {
    $style = 'pill';
  }
  if($SLSETTINGS["style"] == 'Link')
  {
    $style = 'link';
  }
  
  if($SLSETTINGS["activeadmin"])
  {
    if($style)
    {
      $hook .= "<link id=\"scrollUpTheme\" rel=\"stylesheet\" href=\"../modules/addons/ScrollUp/includes/html/css/".$style.".css\">\r";
  
      $scrollimg = 'false';
    }
    else
    {
      if($SLSETTINGS["image"] == 'Style 1'){ $image = '../modules/addons/ScrollUp/includes/html/img/up0.png';}
      if($SLSETTINGS["image"] == 'Style 2'){ $image = '../modules/addons/ScrollUp/includes/html/img/up1.png';}
      if($SLSETTINGS["image"] == 'Style 3'){ $image = '../modules/addons/ScrollUp/includes/html/img/up2.png';}
      if($SLSETTINGS["image"] == 'Style 4'){ $image = '../modules/addons/ScrollUp/includes/html/img/up3.png';}
      if($SLSETTINGS["image"] == 'Style 5'){ $image = '../modules/addons/ScrollUp/includes/html/img/up4.png';}
      if($SLSETTINGS["image"] == 'Style 6'){ $image = '../modules/addons/ScrollUp/includes/html/img/up5.png';}
      if($SLSETTINGS["image"] == 'Custom image'){ $image = $SLSETTINGS["imageurl"];}
  
      $hook .= '<style>#scrollUp {background: url('.$image.') no-repeat;}</style>';
      $hook .= "<link id=\"scrollUpTheme\" rel=\"stylesheet\" href=\"../modules/addons/ScrollUp/includes/html/css/image.css\">\r";
  
      $scrollimg = 'true';
    }
  
    $hook .= "<script type=\"text/javascript\" src=\"../modules/addons/ScrollUp/includes/html/js/jquery.easing.min.js\"></script>\r";
    $hook .= "<script type=\"text/javascript\" src=\"../modules/addons/ScrollUp/includes/html/js/jquery.scrollUp.js\"></script>\r";
  
    $hook .= "<script>
    $(function () {
      $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '".$_ADDONLANG['scrolltotop']."', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
            scrollImg: ".$scrollimg.", // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
      });
    });
  </script>";
  
  }

  return $hook;
}

add_hook("AdminAreaHeadOutput",1,"ScrollUp_AdminAreaHeadOutput_Hook");

?>
