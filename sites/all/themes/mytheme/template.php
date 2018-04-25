<?php

/**
 * Implement hook_preprocess_page()
 */

function mytheme_preprocess_page(&$vars) {
 // dpm($vars);
}

/**
 * Add custom PHPTemplate variables into the node template.
 */
function mytheme_preprocess_node(&$vars) {
 // kpr($vars);
}

/**
 * Returns HTML for a breadcrumb trail.
 *
 * @param $variables
 *   An associative array containing:
 *   - breadcrumb: An array containing the breadcrumb links.
 */
function mytheme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $breadcrumb[] = drupal_get_title();

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' | ', $breadcrumb) . '</div>';
    return $output;
  }
}
