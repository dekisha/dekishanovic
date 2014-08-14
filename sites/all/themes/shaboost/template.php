<?php


// function shaboost_preprocess_field(&$variables, $hook) {
	// kpr($variables);
// }


// adding boostrap classes to field
function shaboost_field($variables) {
  $output = '';
  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }
  
  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  if ($variables['element']['#field_name'] == 'field_project_image'){
      foreach ($variables['items'] as $delta => $item) {
        $classes = 'field-item col-md-4 ' . ($delta % 2 ? 'odd' : 'even');
        $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
      }
  }else{
      foreach ($variables['items'] as $delta => $item) {
          $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
          $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
      }
  }
  $output .= '</div>';
 
  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';
 
  return $output;
}