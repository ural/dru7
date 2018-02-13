<?php

/**
 * @file
 * System settings form for blacklisting passwords.
 */

/**
 *
 */
function demo_passwords_form($form, &$form_state) {
  $form['demo_badpasswords'] = array(
    '#type' => 'textfield',
    '#title' => t('Bad Passwords'),
    // Gets previously saved values and displays them in the field.
    '#default_value' => variable_get('demo_badpasswords'),
    '#description' => t('Enter a list of "bad passwords" separated by commas.'),
  );
  // Will be saved in "variables" Table of database == variable_set.
  // Provides "save" button.
  return(system_settings_form($form));
}
