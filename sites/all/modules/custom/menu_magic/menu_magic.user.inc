<?php

function menu_magic_user_tab($wildcard, $mag) {

if(is_numeric($wildcard) && ($account = user_load($wildcard))) {
  return array(
    '#type' => 'markup',
    '#markup' => t('%username is AWESOME and it is %mag', array('%username' => $account->field_real_name['und'][0]['safe_value'], '%mag' => $mag)),
    );
}
  else {
    return drupal_not_found();
  }

}