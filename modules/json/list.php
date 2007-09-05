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

$children = & eZContentObjectTreeNode::subTree(array( 'Depth' => 1,'DepthOperator' => 'eq'),$nodeID);

array_walk($children, 'simplifyNode');

$json = json_encode ($children);
if (isset($_GET['debug'])) {
echo "<pre>";
  print_r ($children);
}
  print_r($json);
eZExecution::cleanExit();
?>
