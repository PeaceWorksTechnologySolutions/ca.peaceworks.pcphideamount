-- PCP Hide Amount extension

DROP TABLE IF EXISTS civicrm_pcphideamount;

--
-- Table structure for table `civicrm_pcphideamount`
--

CREATE TABLE civicrm_pcphideamount (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  contribution_id int(10) unsigned NOT NULL COMMENT 'Contribution id this record refers to',
  display_amount tinyint(4) NOT NULL COMMENT 'Boolean to display contribution in honor roll',
  PRIMARY KEY (id),
  --FOREIGN KEY (contribution_id) REFERENCES civicrm_contribution(id),
  INDEX contribution_id (contribution_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for PCP Hide Amount extension';

