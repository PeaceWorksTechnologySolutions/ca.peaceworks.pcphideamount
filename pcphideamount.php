<?php

require_once 'pcphideamount.civix.php';
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
    // Assumes templates are in a templates folder relative to this file
    //$templatePath = realpath(dirname(__FILE__)."/templates");
    // Add the field element in the form
    //$form->add('text', 'testfield', ts('Test field'));
    $form->add('checkbox', 'pcp_show_amount', ts('Display the donation amount'), NULL, NULL, NULL);
    // dynamically insert a template block in the page
    // FIXME: actually want to add this right before #nameID (as sibling)
    CRM_Core_Region::instance('page-body')->add(array(
      //'template' => "{$templatePath}/testfield.tpl"
      'template' => "CRM/Pcphideamount/pcp_show_amount.tpl"
    ));


//    if ($form->getAction() == CRM_Core_Action::ADD) {
//      $defaults['price_3'] = '710';
//      $form->setDefaults($defaults);
//    }
  }
}

