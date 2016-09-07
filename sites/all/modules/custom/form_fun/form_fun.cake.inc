<?php

function form_fun_page() {

  return drupal_get_form('form_fun_cake');

}


  function form_fun_cake($from, $form_state){
    $form = array();

  $form['choice'] = array(
      '#type' => 'select',
      '#title' => t('Cake or Pie?'),
      '#description' => t('Would you like Cake or Pie'),
      '#options' => array(
        'cake' => t('Cake'),
        'pie' => t('Pie'),
      ),
      '#default_value' => 'cake',
      '#required' => TRUE,
      '#weight' => -55,
    );

  $form['buttons']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('GET IT'),
    );

    $form['buttons']['unsure'] = array(
      '#type' => 'submit',
      '#value' => t('Equivocate'),
      '#submit' => array('form_fun_cake_unsure'),
      '#validate' => array(),
    );



    return $form;
  }

function form_fun_cake_validate($from, $form_state) {
  //dsm($form_state);

  if($form_state['values']['choice'] == 'cake') {
    form_set_error('choice', t('We are out of CAKE!'));
  }

}

function form_fun_cake_submit($from, $form_state) {
  dsm($form_state);

  $form_state['redirect'] = '/';
}

function form_fun_cake_unsure(){
  drupal_set_message(t('Make up your mind'), 'warning');
}