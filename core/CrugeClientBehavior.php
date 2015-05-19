<?php
namespace cruge\core;

class CrugeClientBehavior extends \Yii\base\Behavior {
	public function createIdentity($data){
		$model = new CrugeIdentity;
		$model->setId($data["id"]);
		$model->setPayload($data);
		return $model;
	}
}
