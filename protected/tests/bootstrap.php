<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../Yii_fw_1_1_17/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
