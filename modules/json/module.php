<?php
$Module = array( "name" => "sydesy" );

$ViewList = array();
$ViewList["node"] = array( "script" => "node.php", 
               "params" => array ('nodeid')); 

$ViewList["list"] = array( "script" => "list.php", 
               "params" => array ('parentnodeid')); 

$ViewList["debug"] = array( "script" => "debug.php"); 

$ViewList["explorer"] = array( "script" => "explorer.php", 
               "params" => array ('parentnodeid')); 
?>
