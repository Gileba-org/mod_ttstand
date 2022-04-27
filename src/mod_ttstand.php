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
if ($params->get('moduleclass_sfx') !== "") {
    $moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
}

// Display the template
require ModuleHelper::getLayoutPath('mod_ttstand');
