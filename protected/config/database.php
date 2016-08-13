<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=eportal',
	'emulatePrepare' => true,
	'username' => 'profile_for_hh',
	'password' => '123',
	'charset' => 'utf8',
        'tablePrefix' => 'ep_'	
	
);