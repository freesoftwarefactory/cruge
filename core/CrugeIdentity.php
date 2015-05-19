<?php
namespace cruge\core;

class CrugeIdentity
	extends \yii\base\Object
	implements \yii\web\IdentityInterface
{

	// this both attributes are setted by clients via createIdentity calls.
	private $_id;  		// a unique identifier
	private $_payload;	// more extra data for this identity

	private static function getClient(){
		return \Yii::$app->user->getClient();
	}

// IdentityInteface methods begins:

	public static function findIdentity($id) {
		// this method is called by yii/web/User whenever a cookie is present
		return self::getClient()->findIdentity($id);
	}

	public static function findIdentityByAccessToken($token, $type = null) {
		// this method is called by yii/web/User whenever a cookie is present
		return self::getClient()->findIdentityByAccessToken($id);
	}

	public function getId() {
		return $this->_id;
	}

	public function getAuthKey() {
	}

	public function validateAuthKey($authKey) {
	}

// IdentityInteface methods ends.

	public function setId($id){
		$this->_id = $id;
	}

	public function setPayload($payload){
		$this->_payload = $payload;
	}

	public function __get($name){
		if($this->_payload && isset($this->_payload[$name])){
			return $this->_payload[$name];
		}else
		if(isset($this->$name)){
			return parent::__get($name);
		}else
		throw new \yii\base\Exception("The '".$name."' attribute "
			."was not found in CrugeIdentity or in its Payload.");
	}

}
