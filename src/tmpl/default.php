<?php
/**
 * @Author	Gijs Lamon
 * @license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
 **/

defined("_JEXEC") or die();

// Libraries
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

// Load external files
$document = Factory::getDocument();
$document->addScript("https://ttapp.nl/dist/ttapp-widgets.js");
$document->addStyleSheet("modules/mod_ttstand/css/mod_ttstand.css", ["version" => "auto"]);

switch ($api) {
	case "ttapp":
		// Code
		echo '<div class="ttstand">';
		echo '<script>ttappwidget({token: "' . $key . '", view: "' . $type . '"';
		switch ($type) {
			case "poule":
				echo ', pouleid: "' . $poule . '"';
				if ($cols != "") {
					echo ', cols: "' . $cols . '"';
				}
				if ($headers != "") {
					echo ', headers: "' . $headers . '"';
				}
				echo "});";
				break;
			default:
				echo "});";
		}
		echo "</script>";
		echo "</div>";
		break;
	case "tabt":
		echo "<table class='ttstand'>";
		echo "<thead><tr>";
		if (count($headers) > 1) {
			$i = 0;
			foreach ($headers as $column) {
				echo "<td>$headers[$i]</td>";
				$i++;
			}
		} else {
			if ($params->get("tabt_col_pos")) {
				echo "<td>#</td>";
			}
			if ($params->get("tabt_col_name")) {
				echo "<td>Team</td>";
			}
			if ($params->get("tabt_col_played")) {
				echo "<td>Gesp</td>";
			}
			if ($params->get("tabt_col_points")) {
				echo "<td>Punt</td>";
			}
		}
		echo "</tr></thead>";
		foreach ($response->RankingEntries as $entry) {
			echo "<tr>";
			if ($params->get("tabt_col_pos")) {
				echo "<td>$entry->Position</td>";
			}
			if ($params->get("tabt_col_name")) {
				echo "<td>$entry->Team</td>";
			}
			if ($params->get("tabt_col_played")) {
				echo "<td>$entry->GamesPlayed</td>";
			}
			if ($params->get("tabt_col_points")) {
				echo "<td>$entry->Points</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		break;
}
