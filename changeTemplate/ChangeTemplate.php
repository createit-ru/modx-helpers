<?php
/**
* =========================
* ChangeTemplate
* =========================
*
* Plugin for MODX Revolution
* Set which template is inherited by children 
* documents of a certain parent document
*
* Author:
* Marc Loehe (boundaryfunctions)
* marcloehe.de
*
* Modified by:
* Lorenzo Stanco <lorenzo.stanco@gmail.com>
* Lorenzostanco.com
*
* Usage:
*
* 1. Paste this as new plugin and connect it to system event
* 'OnDocFormRender'.
*
* 2. Assign a new TV 'changeTemplate' to each template
* for which you want to define the default children template.
*
* 3. Set the newly created TV to input type "Text" 
*
* 4. Open a document and in the 'changeTemplate' TV type a 
* comma separated list of template IDs.
*
* 5. Have fun!
*
*/
 
// Check Event
if ($modx->event->name == OnDocFormRender && $mode == modSystemEvent::MODE_NEW) {
   
  // Get current document ID
  if ($id = $_REQUEST['id']) {
 
    // Document Chain
    $resources = array($id);
 
    // Get parent ID
    foreach ($modx->getParentIds($id, 10, array('context' => $_REQUEST['context_key'])) as $parentId) {
      if ($parentId) array_push($resources, $parentId);
    }
     
    // Search changeTemplate in the chain
    $level = 0;
    $childTemplates = array();
    foreach ($resources as $resourceId) {
      $resource = $modx->getObject('modResource', $resourceId);
      if ($childTemplatesTV = $resource->getTVValue('changeTemplate')) {
         
        // Create template array for each tree level
        $childTemplates = @explode(',', $childTemplatesTV);
        if (empty($childTemplates)) break;
        foreach ($childTemplates as $k => $v) $childTemplates[$k] = intval(trim($v));
         
        break;
 
      }
 
      $level++;
 
    }
 
    // Set template based on tree level
    if (!empty($childTemplates)) {
      $useTemplate = $childTemplates[$level];
      if (!empty($useTemplate)) {
        
        // Set default template
        if (isset($modx->controller)) {
          $modx->controller->setProperty('template', $useTemplate);
        } else { // modX < 2.2.0
          $_REQUEST['template'] = $useTemplate;
        }
 
      }
    }
 
  }
 
}
