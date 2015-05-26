<?php
namespace cruge\core;
use freesoftwarefactory\hooks;
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
	private $_hook; // lazy. php-hooks

	public function init(){
		parent::init();
	}

	public function getHook(){
		if(null === $this->_hook){
			$this->_hook = new \freesoftwarefactory\hooks\Hooks; // php-hooks
		}
		return $this->_hook;
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
		$instance = $this->getClient()->findByUsername($username);	
		$this->getHook()->do_action('cruge_findbyusername',
			array($username, $instance));
		return $instance;
	}

	public function validatePassword($user, $password){
		$filtered_password = $this->getHook()->apply_filters(
			'cruge_validatepassword', array($user, $password));
		if(is_array($filtered_password)){
			// this case happens when no callback is provided for this filter.
			$filtered_password = $filtered_password[1];
		}else{ 
			// the callback fn is returning a string, the processed password.
		}
		return $this->getClient()->validatePassword($user, $filtered_password);	
	}
    
	protected function beforeLogin($identity, $cookieBased, $duration){
		// fired by web\User before the final call to switchIdentity
		$event_result = parent::beforeLogin($identity, $cookieBased, $duration);
		// let a change to plugins to authorize or not this logon
		if($this->getHook()->has_filter('cruge_beforelogin')){
			return $this->getHook()->apply_filters('cruge_beforelogin',
				array($identity, $cookieBased, $duration, $event_result));
		}else
		return $event_result; // no filters setted.
	}
    
	protected function afterLogin($identity, $cookieBased, $duration){
		// fired by web\User::login methods after a successfull authentication
		// 1. fire core events
		parent::afterLogin($identity, $cookieBased, $duration);
		// 2. fire a hooked action for connected plugins
		$this->getHook()->do_action('cruge_afterlogin',
			array($identity, $cookieBased, $duration));
	}
    
	protected function beforeLogout($identity){
		$event_result = parent::beforeLogout($identity);
		// let a change to plugins to authorize or not this logon
		if($this->getHook()->has_filter('cruge_beforelogout')){
			return $this->getHook()->apply_filters('cruge_beforelogout',
				array($identity, $event_result));
		}else
		return $event_result; // no filters setted.
	}
    
	protected function afterLogout($identity){
		parent::afterLogout($identity);
		$this->getHook()->do_action('cruge_afterlogout',$identity);
	}

}
