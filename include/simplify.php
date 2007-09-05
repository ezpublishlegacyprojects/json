<?php

// Using $_GET datas. No quick and dirty

// quick and no so clean: all the attributes that are empty are thrown away 
function simplifyAttribute (&$attribute) {
  $attribute = array_filter (get_object_vars ($attribute));
}


function simplifyObject (&$Object) {
  unset ($Object->ContentActionList);
  unset ($Object->MainNodeID);
  unset ($Object->PersistentDataDirty);
  unset ($Object->ContentObjectAttributes);
  unset ($Object->ContentObjectAttributeArray);
  unset ($Object->DataMap);
  unset ($Object->Permissions);
}

function simplifyNode (&$node) {
  if (isset($_GET['datamap'])) {
    $node->dataMap();
    $node->data_map = & $node->ContentObject->DataMap[$node->ContentObjectVersion][$node->CurrentLanguage];
    array_walk($node->DataMap, 'simplifyAttribute');
  }
  if (isset($_GET['owner'])) {
    $node->ContentObject->Owner = $node->ContentObject->owner();
    simplifyObject ($node->ContentObject->Owner);
  }
  simplifyObject ($node->ContentObject);
  $node->object = & $node->ContentObject;
  unset ($node->ContentObject);
  unset ($node->PersistentDataDirty);
}

array_walk($children, 'simplifyNode');

?>
