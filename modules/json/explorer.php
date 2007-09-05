<?php
include_once( 'kernel/common/template.php' );
$tpl =& templateInit();
if (isset ($Params['Parameters'][0])) {
   $tpl->setVariable('parentnodeid',$Params['Parameters'][0]);
}
else {
   $tpl->setVariable('parentnodeid',1);
} 
$Result = array();
$Result['content'] = $tpl->fetch( "design:json/explorer.tpl" );

$Result['path'] = array( array( 'url_alias' => '/json/explorer',
                                'text' => "explorer") );
//eZExecution::cleanExit();
?>

