<?php
namespace cruge\core;

/**
 * CrugeClientBehavior 
 * 
 * @author Cristian Salazar H. <christiansalazarh@gmail.com> www.chileshift.cl 
 * @license SEE ALSO LICENSE FILE
 */
class CrugeClientBehavior extends \Yii\base\Behavior {
	public function createIdentity($data){
		$model = new CrugeIdentity;
		$model->setId($data["id"]);
		$model->setPayload($data);
		return $model;
	}
}
