#!/usr/bin/env php
<?php

/**
 * Observium
 *
 *   This file is part of Observium.   
 *
 * @package    observium
 * @subpackage scripts
 * @copyright  (C) 2006-2015 Adam Armstrong
 *
 */

chdir(dirname($argv[0]).'/..');
$scriptname = basename($argv[0]);

include_once("includes/defaults.inc.php");
include_once("config.php");

$options = getopt("d");
if (isset($options['d'])) { array_shift($argv); } // for compatability

include_once("includes/definitions.inc.php");
include("includes/functions.inc.php");

if (isset($config['rancid_version']) && strpos($config['rancid_version'], '3') !== FALSE)
{
  // v3 delimiter
  $delimiter = ';';
} else {
  // v2 delimiter
  $delimiter = ':';
}

?>
# RANCID router.db autogenerated by <?php echo realpath($_SERVER['SCRIPT_FILENAME']) . PHP_EOL; ?>
# Do not edit this file directly!

<?php

foreach (dbFetchRows("SELECT `hostname`, `os`, `disabled`, `status` FROM `devices` WHERE `ignore` = 0 ORDER BY `hostname`") as $device)
{
  if (isset($config['rancid']['os_map'][$device['os']]))
  {
    $status = "up";
    if ($device['disabled'] || !$device['status'])
    {
      $status = "down";
    }

    echo($device['hostname'] . $delimiter . $config['rancid']['os_map'][$device['os']] . $delimiter . $status . PHP_EOL);
  }
}

// EOF
