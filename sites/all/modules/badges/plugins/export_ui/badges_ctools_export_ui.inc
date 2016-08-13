<?php
// CTools Plugin Definition.
$plugin = array(
  // The name of the table as found in the schema in hook_install. This
  // must be an exportable type with the 'export' section defined.
  'schema' => 'badge',
  'access' => 'administer site configuration',
  // Menu settings.
  'menu' => array(
    'menu prefix' => 'admin/config/people',
    'menu item' => 'badges',
    'menu title' => 'Badges', 
    'menu description' => 'Configure user badges.',
  ),
  // These are required to provide proper strings for referring to the
  // actual type of exportable. "proper" means it will appear at the
  // beginning of a sentence.
  'title singular' => t('badge'),
  'title singular proper' => t('Badge'),
  'title plural' => t('badges'),
  'title plural proper' => t('Badges'),
  // Callbacks for building a form for add/edit of rules.
  // All callbacks will accept &$form and &$form_state as arguments.
  'form' => array(
    'settings' => 'badges_ctools_export_ui_form',
    'validate' => 'badges_ctools_export_ui_form_validate',
    'submit' => 'badges_ctools_export_ui_form_submit',
  ),
);

/**
 * Form builder; Form for adding/editing a rule.
 */
function badges_ctools_export_ui_form(&$form, &$form_state) {
// CTools will always pass in any 'badge' that is being edited in 'item' key.
$badge = $form_state['item'];

$form['text'] = array(
  '#type' => 'textfield',
  '#title' => t('Badge text'),
  '#default_value' => isset($badge->text) ? $badge->text : $badge->text,
  '#required' => TRUE,
);

$form['color'] = array(
  '#type' => 'textfield',
  '#title' => t('Badge color'),
  '#description' => t('HEX color for the badge.'),
  '#field_prefix' => t('#'),
  '#default_value' => isset($badge->color) ? $badge->color : $badge->color,
  '#required' => TRUE,
);
}


/**
 * Validation callback for adding/editing a rule.
 */
function badges_ctools_export_ui_form_validate(&$form, &$form_state) {
  // Validate just like a normal FAPI form.
}

/**
 * Submit handlelr for adding/editing a role.
 */
function badges_ctools_export_ui_form_submit(&$form, &$form_state) {
  // Any changes you make to $form_state['values'] will be saved by CTools.
}