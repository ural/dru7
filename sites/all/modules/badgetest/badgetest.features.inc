<?php
/**
 * @file
 * badgetest.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function badgetest_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "badges" && $api == "badges") {
    return array("version" => "1");
  }
}
