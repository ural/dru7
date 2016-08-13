<?php

function menu_magic_extra($wildcard) {
  $content = array(
    '#title' => 'markup',
    '#markup' => '<div>' . t('The wildcard contains the value of  " %wildcard" !', array('%wildcard' => $wildcard)) . '</div>',
  );

  return $content;
}