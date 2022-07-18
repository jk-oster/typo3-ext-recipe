CREATE TABLE tx_recipies_domain_model_recipie (
	title varchar(255) NOT NULL DEFAULT '',
	author varchar(255) NOT NULL DEFAULT '',
	rating int(11) NOT NULL DEFAULT '0',
	vegetarian smallint(1) unsigned NOT NULL DEFAULT '0',
	vegan smallint(1) unsigned NOT NULL DEFAULT '0',
	teaser text NOT NULL DEFAULT '',
	media int(11) unsigned NOT NULL DEFAULT '0',
	description text,
	preparation text,
	portions int(11) NOT NULL DEFAULT '0',
	preparation_time int(11) NOT NULL DEFAULT '0',
	calories int(11) NOT NULL DEFAULT '0',
	countries int(11) unsigned NOT NULL DEFAULT '0',
	reviews int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_recipies_domain_model_country (
	title varchar(255) NOT NULL DEFAULT '',
	teaser text NOT NULL DEFAULT '',
	description text,
	flag int(11) unsigned NOT NULL DEFAULT '0',
	media int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_recipies_domain_model_review (
	recipie int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	rating int(11) NOT NULL DEFAULT '0',
	date int(11) NOT NULL DEFAULT '0',
	author varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_recipies_recipie_country_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
