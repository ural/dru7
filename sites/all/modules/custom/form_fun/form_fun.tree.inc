<?php

function form_fun_tree($form_state) {

 $form = array();

  $form['#tree'] = TRUE; // Prevent drupal from collapsing the form

  $form['home'] = array(
    '#type' => 'fieldset',
    '#title' => t('Home Address'),
  );
  $form['home']['street'] = array(
    '#type' => 'textfield',
    '#title' => t('Street Address'),
  );

  $form['home']['city'] = array(
    '#type' => 'textfield',
    '#title' => t('City'),
  );
/////////\\\\\\\
  $form['work'] = array(
    '#type' => 'fieldset',
    '#title' => t('Work Address'),
  );
  $form['work']['street'] = array(
    '#type' => 'textfield',
    '#title' => t('Street Address'),
  );

  $form['work']['city'] = array(
    '#type' => 'textfield',
    '#title' => t('City'),
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'SUBMIT',
  );
  return $form;
}

function form_fun_tree_submit($form, $form_state) {
  dsm($form_state);
}