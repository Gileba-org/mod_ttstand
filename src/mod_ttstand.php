<?php
/**
 * @Author  Gijs Lamon
 * @license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
 **/
defined("_JEXEC") or die();

// Include the helper class
use Joomla\CMS\Helper\ModuleHelper;

$api = $params->get("api");

switch ($api) {
	case "ttapp":
		// Params
		$key = $params->get("ttapp_api");
		$type = $params->get("ttapp_type");
		$poule = $params->get("ttapp_poule");
		$headers = $params->get("ttapp_headers");
		$cols = "";

		if ($params->get("ttapp_col_pos")) {
			$cols .= "pos";
		}
		if ($params->get("ttapp_col_name")) {
			$cols != "" ? ($cols .= ",teamname") : ($cols .= "teamname");
		}
		if ($params->get("ttapp_col_played")) {
			$cols != "" ? ($cols .= ",nplayed") : ($cols .= "nplayed");
		}
		if ($params->get("ttapp_col_points")) {
			$cols != "" ? ($cols .= ",points") : ($cols .= "points");
		}
		if ($params->get("ttapp_col_rating")) {
			$cols != "" ? ($cols .= ",teamrating") : ($cols .= "teamrating");
		}

		if ($params->get("moduleclass_sfx") !== "") {
			$moduleclass_sfx = htmlspecialchars($params->get("moduleclass_sfx"));
		}

		break;

	case "tabt":
		//Params
		$username = $params->get("tabt_user");
		$password = $params->get("tabt_password");
		$division = $params->get("tabt_division");
		$headers = explode(",", htmlspecialchars($params->get("tabt_headers")));

		// Create TabT API client
		$tabt = new SoapClient("https://api.vttl.be/0.7/?wsdl");

		// Prepare Test request
		$credentials = ["Account" => $username, "Password" => $password];

		// Get ranking from a given division
		$response = $tabt->GetDivisionRanking(["Credentials" => $credentials, "DivisionId" => $division]);

		break;
}

// Display the template
require ModuleHelper::getLayoutPath("mod_ttstand");
