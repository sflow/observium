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

//$scale_min = 0;
$colours = "mixed";
$nototal = 0;
$unit_text = "Errors";
$rrd_filename = get_rrd_path($device, "netscaler-stats-tcp.rrd");
$log_y = TRUE;

$array = array(
        'ErrBadCheckSum'   => array('descr' => 'ErrBadCheckSum'),
        'ErrSynInSynRcvd'  => array('descr' => 'ErrSynInSynRcvd'),
        'ErrSynInEst'      => array('descr' => 'ErrSynInEst'),
        'ErrSynGiveUp'     => array('descr' => 'ErrSynGiveUp'),
        'ErrSynSentBadAck' => array('descr' => 'ErrSynSentBadAck'),
        'ErrSynRetry'      => array('descr' => 'ErrSynRetry'),
        'ErrFinRetry'      => array('descr' => 'ErrFinRetry'),
        'ErrFinGiveUp'     => array('descr' => 'ErrFinGiveUp'),
        'ErrFinDup'        => array('descr' => 'ErrFinDup')
);

if (is_file($rrd_filename))
{
  foreach ($array as $ds => $data)
  {
    $rrd_list[$i]['filename'] = $rrd_filename;
    $rrd_list[$i]['descr']    = $data['descr'];
    $rrd_list[$i]['ds']       = $ds;
    $rrd_list[$i]['colour']   = $config['graph_colours'][$colours][$i];
    $i++;
  }
} else {
  echo("file missing: $file");
}

include("includes/graphs/generic_multi_line.inc.php");

// EOF
