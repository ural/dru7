<?php

function form_fun_states($form_state) {

  $form = array();

  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('My Name'),
  );

  // Use of #states FAPI property
  $form['status'] = array(
    '#type' => 'checkbox',
    '#title' => t('I have a PARDNER'),
  );
  // THE CONTAINER element type is useful for combining multiple elements' states at once.
  $form['partner'] = array(
    '#type' => 'container',
    '#states' => array(  // #states property !!!
      'visible' => array(
        ':input[name="status"]' => array('checked' => TRUE),
      ),
    ),
  );
  $form['partner']['name'] = array(
    '#type' => 'textfield',
    '#title' => t("My PARDNER'S NAME "),
  );
  $form['partner']['modus_operandi'] = array(
    '#type' => 'select',
    '#title' => t('My PADNER\'S MODUS OPERANDI'),
    '#options' => array(
      1 => t('Picking Locks'),
      2 => t('WassEver'),
      3 => t('Quickness'),
      4 => t('Disguise'),
    ),
  );
  return $form;
}

