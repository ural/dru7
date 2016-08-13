<?php

// Plugin definition
$plugin = array(
  'title' => t('Two columns 60/40'),
  'category' => t('Custom'),
  'icon' => 'twocol-60-40.png',
  'theme' => 'twocol-60-40',
  'css' => 'twocol-60-40.css',
  'regions' => array(
    'left' => t('Left side = 60%'),
    'right' => t('Right side = 40%')
  ),
);
