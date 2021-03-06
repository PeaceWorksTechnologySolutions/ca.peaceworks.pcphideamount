<?php

/*
 * Functions to read/write on custom tables
 */


/**
 * Adds new record of a contribution to have display hidden/shown
 * 0 = hide amount in honor roll; 1 = show amount
 */
function pcphideamount_db_add($contribution_id, $value=0) {
  $value = $value ? 1 : 0;

  // Check for existing record for the same contribution
  $existing_id = NULL;
  $sql = "SELECT id FROM civicrm_pcphideamount
    WHERE contribution_id=$contribution_id
    LIMIT 1";
  $dao = CRM_Core_DAO::executeQuery($sql);
  if ( $dao->fetch() ) {
    $existing_id = $dao->id;
  }

  if (empty($existing_id)) {
    $sql = "INSERT INTO civicrm_pcphideamount 
      (id, contribution_id, display_amount)
      VALUES (NULL, $contribution_id, $value)";
  }
  else {
    $sql = "UPDATE civicrm_pcphideamount 
      SET display_amount=$value
      WHERE contribution_id=$contribution_id";
  }

  $result = CRM_Core_DAO::executeQuery($sql);
  if (is_a($result, 'DB_Error')) {
    return FALSE;
  }
  return TRUE;
}

/**
 * Adds new record of a contribution to have display hidden
 * Guesses at contribution id based on next one available in the db
 * This really isn't ideal, but not sure a better way
 */
function pcphideamount_db_add_auto_id() {
  $sql = "SELECT id FROM civicrm_contribution
    ORDER BY id DESC
    LIMIT 1";

  $dao = CRM_Core_DAO::executeQuery($sql);
  if ( $dao->fetch() ) {
    return pcphideamount_db_add($dao->id + 1);
  }
  return FALSE;
}

/**
 * Returns array of contribution_ids, where display_amount is 0
 */
function pcphideamount_db_get_cids() {
  $sql = "SELECT contribution_id FROM civicrm_pcphideamount
    WHERE display_amount=0";

  $cids = array();
  $dao = CRM_Core_DAO::executeQuery($sql);
  while ( $dao->fetch() ) {
    $cids[] = $dao->contribution_id;
  }
  return $cids;
}

/**
 * Checks if given contribution_id should be hidden
 */
function pcphideamount_db_cid_hidden($contribution_id) {
  if (!$contribution_id) {
    return FALSE;
  }

  $sql = "SELECT count(id) c FROM civicrm_pcphideamount
    WHERE contribution_id=$contribution_id
    AND display_amount=0";
  $dao = CRM_Core_DAO::executeQuery($sql);
  if ( $dao->fetch() ) {
    if ($dao->c > 0) {
      return TRUE;
    }
  }
  return FALSE;
}

