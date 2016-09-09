<?php

/*
 * System settings form for blacklisting passwords
 */
function demo_passwords_form($form, &$form_state) {
  $form['demo_badpasswords'] = array(
    '#type' => 'textfield',
    '#title' => t('Bad Passwords'),
    '#default_value' => variable_get('demo_badpasswords'), // gets previously saved values and displays them in the field
    '#description' => t('Enter a list of "bad passwords" separated by commas.'),
  );
  return(system_settings_form($form)); // will be saved in "variables" Table of database == variable_set. provides "save" button
}







