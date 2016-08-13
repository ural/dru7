<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function druzen_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  druzen_preprocess_html($variables, $hook);
  druzen_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function druzen_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */


//-- Delete this line if you want to use this function
/*function druzen_preprocess_page(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');

  if ($hook == 'page') {
    static $i;
    dpm($i . ' ' . $hook);
    $i++;

}*/

function druzen_preprocess_page(&$variables) {

// if the theme uses Twitter pull it in and display it in the slogan.
/*  $use_twitter = theme_get_setting('use_twitter');

  if($use_twitter) {
    if($cache = cache_get('druzen_tweets')) {
      $data = $cache->data;
    }
    else  {
      $query = theme_get_setting('twitter_search_term');
      $query = drupal_encode_path($query);

      $response = drupal_http_request('https://twitter.com/search.json?q=' . $query);

      if($response->code == 200)  {
        $data = json_decode($response->data);
        cache_set('druzen_tweets', $data, 'cache', 300);
      }
    }
    $tweet = $data->results[array_rand($data->results)];
    $variables['site_slogan'] = check_plain(html_entity_decode($tweet->text));

  }*/

  //add new variables to page.tpl with sanitizing via @name
  if($variables['logged_in']) {

    $variables['footer_message'] = t('WHO LOVES YOU @username with user ID = @userID', array('@username' => $variables['user']->name, '@userID' => $variables['user']->uid));

  }
  else  {
    $variables['footer_message'] = t('WHO LOVES YOU  user ID = @userID', array('@userID' => $variables['user']->uid));
  }

//front page custom styling
  if($variables['is_front'] == TRUE) {
    drupal_add_css(path_to_theme() . '/css/front.css', array('group' => CSS_THEME));
  }


}



/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
// -- Delete this line if you want to use this function
function druzen_preprocess_node(&$variables) {


  /*  $variables['sample_variable'] = t('Lorem ipsum.');
    // Optionally, run node-type-specific preprocess functions, like
    // druzen_preprocess_node_page() or druzen_preprocess_node_story().
    $function = __FUNCTION__ . '_' . $variables['node']->type;
    if (function_exists($function)) {
      $function($variables, $hook);
    }*/

  if($variables['type'] == 'article') {
    $node = $variables['node'];
    //dpm($node);
    $variables['submitted_day'] = format_date($node->created, 'custom', 'j');
    $variables['submitted_month'] = format_date($node->created, 'custom', 'M');
    $variables['submitted_year'] = format_date($node->created, 'custom', 'Y');
  }

  if($variables['type'] == 'page') {

    $today = strtolower(date('l'));

    $variables['theme_hook_suggestions'][] = 'node__' . $today;

    $variables['day_of_the_week'] = $today;

    //kpr($variables);

  }



}

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function druzen_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function druzen_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function druzen_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */


function druzen_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $page_title = drupal_get_title();
    $output .= '<div class="breadcrumb">' . implode(' | ', $breadcrumb) . ' | ' . $page_title . '</div>';
    return $output;
  }
}

// theme_username()
function druzen_preprocess_username(&$variables)  {
  $account = user_load($variables['account']->uid);

 // kpr($account->roles[3]);
  $variables['account'] = $account;
  if(isset($account->field_real_name['und'][0]['safe_value']))  {
    $variables['name'] = $account->field_real_name['und'][0]['safe_value'];
  }
}

function druzen_field__field_taxonomy_content__article($variables) {
  $output = '';
  //kpr($variables);
  $links = array();
  foreach ($variables['items'] as $delta => $item)  {
    $links[] = drupal_render($item);
  }
  $output .= '<div class="my-ref">In reference to : ';
  $output .= implode(' | ', $links);
  $output .= ' | ';
  $output .= '</div>';
  return $output;
}

function druzen_css_alter(&$css) {
  /*  dpm($css);
  unset($css['modules/system/system.base.css']);
  unset($css['modules/system/system.menus.css']);
  unset($css['modules/system/system.theme.css']);*/
}
function druzen_js_alter(&$javascript)  {
  //dpm($javascript);
}

/**
 * @param $page
 */
function druzen_page_alter(&$page)  {
  //kpr($page);
}

/**
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function druzen_form_alter(&$form, &$form_state, $form_id) {

  //debug($form_id);

}

function druzen_form_user_login_alter(&$form, &$form_state) {
  // Modification for the form with the given form ID goes here. For example, if
  // FORM_ID is "user_register_form" this code would run only on the user
  // registration form.
  $form['name']['#title'] = t('Name');

  //debug($form);

}

/*declare form template name for theme */
function druzen_theme($existing, $type, $theme, $path)  {

  return array(
    'comment_form' => array(
      'render element' => 'form',
      'template' => 'templates/comment-form',
    ),
  );
}
/*  provide global variables for above template  */
function druzen_preprocess_comment_form(&$variables)  {
  //kpr($variables);

    $variables['author_field'] = drupal_render($variables['form']['author']);
    $variables['subject_field'] = drupal_render($variables['form']['subject']);
    hide($variables['form']['comment_body']['und'][0]['format']);
    $variables['everything_else'] = drupal_render_children($variables['form']);


}

