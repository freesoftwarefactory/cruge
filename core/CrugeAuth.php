<?php
namespace cruge\core;
/**
 * CrugeAuth 
 * 
 * @author Cristian Salazar H. <christiansalazarh@gmail.com> www.chileshift.cl 
 * @license SEE ALSO LICENSE FILE
 */
class CrugeAuth extends \yii\web\User {
	public $identityClass = "\cruge\core\CrugeIdentity"; // do not change.
	public $client = 'ActiveRecordClient';
	private $_client; //lazy

	public function init(){
		parent::init();
	}

	public function getClient(){
		if(null === $this->_client){
			$classname = '\cruge\clients\\'.$this->client;
			$inst = new $classname;
        	if ($inst instanceof \cruge\interfaces\CrugeAuthInterface) {
				if(!$inst->hasMethod("createIdentity"))
            		throw new \yii\base\InvalidValueException(
					'The provided client must include a CrugeClientBehavior.');
				$this->_client = $inst;
			}else
            throw new \yii\base\InvalidValueException(
			'The provided client object must implement CrugeAuthInterface.');
		}
		return $this->_client;
	}

	public function findByUsername($username){
		return $this->getClient()->findByUsername($username);	
	}

	public function validatePassword($user, $password){
		return $this->getClient()->validatePassword($user, $password);	
	}

}
