<?php
namespace cruge\clients;
/**
 * ActiveRecordClient 
 *  This client enable your application to persist users in a single table.
 *
 *	A database connection is required.  Scripts are provided inside ./etc
 *  directory:
 *
 *		cruge/etc/activerecordclient-mysql-schema.sql
 * 
 * @author Cristian Salazar H. <christiansalazarh@gmail.com> www.chileshift.cl 
 * @license FreeBSD {@link http://www.freebsd.org/copyright/freebsd-license.html}
 */
class ActiveRecordClient
	extends \yii\db\ActiveRecord
	implements \cruge\interfaces\CrugeAuthInterface
{
 	public static function tableName() {
		return "cruge_user";
	}

	public function behaviors(){
		return [["class"=>"\cruge\core\CrugeClientBehavior"]];
	}

	// ICrugeAuth Methods: Consumed by: CrugeAuth

	public function findByUsername($username){
		if($model = $this->findOne(["username"=>$username])){
			foreach($model->attributes as $attr=>$val)
				$this->$attr = $val;
			return $this->createIdentity($model);
		}else
		return null;
	}

	public function validatePassword($identity, $password){
		// TODO: implement a password validator callback. deal with hashed pwds
		return ($identity->password === $password);
	}

	// IndentityInterface Methods (partial): Consumed by: CrugeIdentity

	public function findIdentity($id) {
		if($model = $this->findOne(["id"=>$id])){
			foreach($model->attributes as $attr=>$val)
				$this->$attr = $val;
			return $this->createIdentity($model);
		}else
		return null;
	}

	public function findIdentityByAccessToken($token, $type = null) {
		// TODO: find in registered access tokens
	 	if("abc123456" === $token){
			return $this->createIdentity(
				["id"=>"123","username"=>"admin","name"=>"christian salazar"]);
		}
		return null;
	}
}
