<?php
/**
 * @file
 * badgetest.badges.inc
 */

/**
 * Implements hook_badges_info().
 */
function badgetest_badges_info() {
  $export = array();

  $badge = new stdClass();
  $badge->disabled = FALSE; /* Edit this to true to make a default badge disabled initially */
  $badge->api_version = 1;
  $badge->name = 'testbadge';
  $badge->text = 'This is the best Badge EVER!';
  $badge->color = '9900ff';
  $export['testbadge'] = $badge;

  return $export;
}
