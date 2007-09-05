<?php
require_once ("kernel/classes/ezcontentobject.php");
require_once ("extension/json/jsonrpc/xmlrpc.inc");
require_once ("extension/json/jsonrpc/jsonrpc.inc");
require_once ("extension/json/jsonrpc/json_extension_api.inc");

// Module return value,
// normally fetched from template
//foreach ($Params[UserParameters] as $param => $value) 
//    $tpl->setVariable( $param, $value );
if (isset ($Params['Parameters'][0]))
  $nodeID=$Params['Parameters'][0];
else 
  $nodeID=$_GET['nodeID'];

$obj= eZContentObject::fetchByNodeID($nodeID);
$obj->fetchDataMap();

$json = json_encode ($obj);
print_r($json);

eZExecution::cleanExit();
?>
