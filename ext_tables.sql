#
# Table structure for table 'tx_fechangelog_domain_model_log'
#
CREATE TABLE tx_fechangelog_domain_model_log (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	table_name varchar(255) DEFAULT '' NOT NULL,
	record_uid int(11) DEFAULT '0' NOT NULL,
	field_name varchar(255) DEFAULT '' NOT NULL,
	field_type varchar(255) DEFAULT '' NOT NULL,
	action int(11) DEFAULT '0' NOT NULL,
	old_string varchar(255) DEFAULT '' NOT NULL,
	new_string varchar(255) DEFAULT '' NOT NULL,
	old_text text NOT NULL,
	new_text text NOT NULL,
	feuser int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

#
# Table structure for table 'tx_fechangelog_domain_model_log'
#
CREATE TABLE tx_fechangelog_domain_model_log (

	table_name varchar(60) DEFAULT '' NOT NULL,
	field_name varchar(30) DEFAULT '' NOT NULL,
	field_type varchar(20) DEFAULT '' NOT NULL,
);