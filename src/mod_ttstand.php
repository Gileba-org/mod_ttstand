<?php
/**
* @Author  Mostafa Shahiri
* @license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/
defined('_JEXEC') or die();

// Include the helper class
use Joomla\CMS\Helper\ModuleHelper;

// Params
$api = $params->get('ttapp_api');
$type = $params->get('ttapp_type');
$poule = $params->get('ttapp_poule');
$headers = $params->get('ttapp_headers');
$cols = "";

if ($params->get('ttapp_col_pos')) {
    $cols .= "pos";
}
if ($params->get('ttapp_col_name')) {
    $cols != "" ? $cols .= ",teamname" : $cols .= "teamname";
}
if ($params->get('ttapp_col_played')) {
    $cols != "" ? $cols .= ",nplayed" : $cols .= "nplayed";
}
if ($params->get('ttapp_col_points')) {
    $cols != "" ? $cols .= ",points" : $cols .= "points";
}
if ($params->get('ttapp_col_rating')) {
    $cols != "" ? $cols .= ",teamrating" : $cols .= "teamrating";
}

if ($params->get('moduleclass_sfx') !== "") {
    $moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
}

// Display the template
require ModuleHelper::getLayoutPath('mod_ttstand');
