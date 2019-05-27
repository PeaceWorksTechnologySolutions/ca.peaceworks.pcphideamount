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
  $templatePath = realpath(dirname(__FILE__) ."/templates/Pcphideamount");

  // This is the donation form the online donor fills out
  if ($formName == 'CRM_Contribute_Form_Contribution_Main') {
    // Add the field element in the form
    $form->add('checkbox', 'pcp_show_amount', ts('Display the contribution amount'), NULL, NULL, NULL);
    // dynamically insert a template block in the page
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "{$templatePath}/pcp_show_amount.tpl"
    ));
    // Move this to be right before #nameID (as sibling)
    CRM_Core_Region::instance('page-body')->add(array(
      'jquery' => '$(".pcp-section #nameID").before($("#pcpshowamountID"));',
    ));
  }
  
  // This is the "thank you" page after donating online
  if ($formName == 'CRM_Contribute_Form_Contribution_ThankYou') {
    if (!empty($form->_params['pcp_display_in_roll'])) {
      // dynamically insert message on the page
      $pcp_show_msg = ts('DO NOT display the contribution amount.');
      if (!empty($form->_params['pcp_show_amount'])) {
        $pcp_show_msg = ts('Display the contribution amount.');
      }
      CRM_Core_Region::instance('page-body')->add(array(
        'jquery' => '$(".pcp_display-group .display-block").prepend(`<span>'. $pcp_show_msg .'</span><br/>`);',
      ));
    }
  }
  
  // This is the admin view page for the contribution
  if ($formName == 'CRM_Contribute_Form_ContributionView') {
    if (!empty($form->get_template_vars('pcp_display_in_roll'))) {
      // dynamically insert a template block in the page
      $label = ts('Display Amount On Honor Roll?');
      $value = ts('Yes');
      if (pcphideamount_db_cid_hidden($form->get('id'))) {
        $value = ts('No');
      }

      CRM_Core_Region::instance('page-body')->add(array(
        'jquery' => '$("#PCPView table.crm-info-panel tr:last-child").after(`
<tr id=pcpshowamountID>
  <td class=label>'. $label .'</td>
  <td>'. $value .'</td>
</tr>`);',
      ));
    }
  }

  // This is the admin edit form for the contribution
  if ($formName == 'CRM_Contribute_Form_Contribution') {
    // Add the field element in the form
    $form->add('checkbox', 'pcp_show_amount', ts('Display the contribution amount?'), NULL, NULL, NULL);
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "{$templatePath}/pcp_show_amount_admin.tpl"
    ));
    // Set default value - FIXME: do this properly...
    if (!pcphideamount_db_cid_hidden($form->get('id'))) {
      CRM_Core_Region::instance('page-body')->add(array(
        'jquery' => '$(\'#pcpshowamountID input\').attr(\'checked\', true);',
      ));
    }
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
    $values = $form->exportValues();
    if ($values['pcp_display_in_roll'] and !$values['pcp_show_amount']) {
      pcphideamount_db_add_auto_id();
    }
  }
  if ($formName == 'CRM_Contribute_Form_Contribution') {
    $values = $form->exportValues();
    pcphideamount_db_add($form->_id, !empty($values['pcp_show_amount']));
  }
}

/**
 * Implements hook_civicrm_pageRun().
 * Remove contribution amount from honor roll when appropriate
 */
function pcphideamount_civicrm_pageRun(&$page) {
  $pageName = $page->getVar('_name');
  if ($pageName == 'CRM_PCP_Page_PCPInfo') {
    $honor = $page->get_template_vars('honor');
    $hides = pcphideamount_db_get_cids();

    foreach ($honor as $cid => $value) {
      if (in_array($cid, $hides)) {
        $honor[$cid]['total_amount'] = '';
      }
    }
    $page->assign('honor', $honor);
  }
}

