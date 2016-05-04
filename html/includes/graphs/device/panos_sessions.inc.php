<?php

/**
 * Observium
 *
 *   This file is part of Observium.
 *
 * @package    observium
 * @subpackage graphs
 * @copyright  (C) 2006-2015 Adam Armstrong
 *
 */

$rrd_filename = get_rrd_path($device, "panos-sessions.rrd");

$ds = "sessions";

$colour_area = "9999cc";
$colour_line = "0000cc";

$colour_area_max = "9999cc";

$graph_max = 1;

$unit_text = "Sessions";

include("includes/graphs/generic_simplex.inc.php");

?>
