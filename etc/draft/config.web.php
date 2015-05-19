<?php

// ADD IT AT BOTTOM:
require(__DIR__.'/../vendor/chileshift.cl/cruge/autoload.php');


// THIS PART GOES INTO COMPONENTS:
'user' => [
	'class' => 'cruge\core\CrugeAuth',
	'client' => 'ActiveRecordClient',
    'enableAutoLogin' => true,
],

