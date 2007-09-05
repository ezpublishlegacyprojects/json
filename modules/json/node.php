<?php
require_once ("kernel/classes/ezcontentobjecttreenode.php");

require_once ("extension/json/include/simplify.php");
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

$node = & eZContentObjectTreeNode::fetch ($nodeID);

simplifyNode ($node);

$json = json_encode ($node);
if (isset($_GET['debug'])) {
echo "<pre>";
  print_r ($node);
}
  print_r($json);
eZExecution::cleanExit();
?>
