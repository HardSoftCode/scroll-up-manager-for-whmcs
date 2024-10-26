<?php

if (!defined("WHMCS")) die("This file cannot be accessed directly");

function ScrollUp_config()
{
  $configarray = array(
  "name" => "Scroll Up Plus",
  "description" => "If your pages are long winded, it's a good idea to provide viewers with an easy way to quickly/automatically scroll back to the top of the page.",
  "version" => "2.3.0",
  "author" => "<a href=\"http://www.hardsoftcode.com\" target=\"_blank\">HSC</a>",
  "language" => "english",
  "fields" => array(
  "active" => array ("FriendlyName" => "Client Area", "Type" => "yesno", "Size" => "25", "Description" => "Tick to enable the module for the client area", "Default" => "yes"),
  "activeadmin" => array ("FriendlyName" => "Admin Area", "Type" => "yesno", "Size" => "25", "Description" => "Tick to enable the module for the admin area", ),
  "style" => array ("FriendlyName" => "Style", "Type" => "radio", "Options" => "Tab,Pill,Link,Image", "Description" => "", "Default" => "Tab"),
  "image" => array ("FriendlyName" => "Image", "Type" => "radio", "Options" => "Style 1,Style 2,Style 3,Style 4,Style 5,Style 6,Custom image", "Default" => "Style 1"),
  "imageurl" => array ("FriendlyName" => "Custom Image URL", "Type" => "text", "Size" => "50", "Description" => "<br>Enter the full URL of your custom image, The image size has to be 50px X 50px"),
  ));

  return $configarray;
}
