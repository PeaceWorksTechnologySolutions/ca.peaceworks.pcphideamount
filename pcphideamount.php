<?php

require_once 'pcphideamount.civix.php';
require_once 'pcphideamount.db.inc';

use CRM_Pcphideamount_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/ 
 */
function pcphideamount_civicrm_config(&$config) {
  _pcphideamount_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function pcphideamount_civicrm_xmlMenu(&$files) {
  _pcphideamount_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function pcphideamount_civicrm_install() {
  _pcphideamount_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function pcphideamount_civicrm_postInstall() {
  _pcphideamount_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function pcphideamount_civicrm_uninstall() {
  _pcphideamount_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function pcphideamount_civicrm_enable() {
  _pcphideamount_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function pcphideamount_civicrm_disable() {
  _pcphideamount_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function pcphideamount_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _pcphideamount_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function pcphideamount_civicrm_managed(&$entities) {
  _pcphideamount_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function pcphideamount_civicrm_caseTypes(&$caseTypes) {
  _pcphideamount_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function pcphideamount_civicrm_angularModules(&$angularModules) {
  _pcphideamount_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function pcphideamount_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _pcphideamount_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function pcphideamount_civicrm_entityTypes(&$entityTypes) {
  _pcphideamount_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function pcphideamount_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
function pcphideamount_civicrm_navigationMenu(&$menu) {
  _pcphideamount_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _pcphideamount_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_buildForm().
 *
 * Insert option to hide amount for PCP
 *
 * @param string $formName
 * @param CRM_Core_Form $form
 */
function pcphideamount_civicrm_buildForm($formName, &$form) {
  if ($formName == 'CRM_Contribute_Form_Contribution_Main') {
//drupal_set_message('ok');
    $templatePath = realpath(dirname(__FILE__) ."/templates/Pcphideamount");
    // Add the field element in the form
    //$form->add('text', 'testfield', ts('Test field'));
    $form->add('checkbox', 'pcp_show_amount', ts('Display the donation amount'), NULL, NULL, NULL);
//    $form->_defaults['pcp_show_amount'] = 1;
//drupal_set_message('<pre>'. print_r($form,true) .'</pre>');
    // dynamically insert a template block in the page
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "{$templatePath}/pcp_show_amount.tpl"
    ));
//    CRM_Core_Region::instance('page-body')->add(array(
//      'jquery' => '$(".pcp-section #nameID").before("<h2>MOO 2</h2>");',
//    ));
    // Move this to be right before #nameID (as sibling)
    CRM_Core_Region::instance('page-body')->add(array(
      'jquery' => '$(".pcp-section #nameID").before($("#pcpshowamountID"));',
    ));


//    if ($form->getAction() == CRM_Core_Action::ADD) {
//      $defaults['price_3'] = '710';
//      $form->setDefaults($defaults);
//    }
  }
}

/**
 * Implements hook_civicrm_postProcess().
 *
 * @param string $formName
 * @param CRM_Core_Form $form
 */
function pcphideamount_civicrm_postProcess($formName, &$form) {
  if ($formName == 'CRM_Contribute_Form_Contribution_Main') {
//drupal_set_message('fired');
//drupal_set_message('contact id: '. print_r($form->_contactID,true));
/*
$c = $form->_contactID;
if ($c) {
  $result = civicrm_api3('Contribution', 'get', [
  'sequential' => 1,
  'return' => ["total_amount", "receive_date"],
  'contact_id' => "user_contact_id",
  'options' => ['sort' => "-receive_date", 'limit' => 3],
]);
drupal_set_message('r: '. print_r($result,true));
}
*/
    //$gid = $form->getVar( '_gid' );
//drupal_set_message(print_r($form->get('pcp_show_amount'),true));
//drupal_set_message(print_r($form->get('pcp_display_in_roll'),true));
//drupal_set_message(print_r($form->exportValues(),true));
    $values = $form->exportValues();
    if ($values['pcp_display_in_roll'] and !$values['pcp_show_amount']) {
//drupal_set_message('set as hidden');
      pcphideamount_db_add_auto_id($cid);
    }

//drupal_set_message(print_r($form,true));
  }
}

