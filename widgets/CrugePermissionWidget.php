<?php

namespace cruge\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use cruge\assets\CrugePermissionAsset;
use yii\helpers\Url;

/**
 * CrugePermissionWidget 
 *  display a ajax-based form to assign permissions to a given user.
 *  usage:
 *  <?=CrugePermissionWidget::widget(['user'=>$model]);?>
 * 
 * @uses Widget
 */
class CrugePermissionWidget extends Widget
{
   public $userId;  // the 'cruge_user' table record id.
   public $roles; // list of roles, or null to autodetect from auth_item table.
   public $db;
   public $authItemTable = 'auth_item';
   public $ajaxUrl='setrole';  // see also: CrugePermissionAction
   public $auth;

   public function getConnection()
   {
     return $this->db ? $this->db : \Yii::$app->db;
   }
    
   public function getAuth()
   {
    return $this->auth ? $this->auth : \Yii::$app->authManager;
   }


   public function run()
   {
        $url = Url::to($this->ajaxUrl);
        $this->getView()->registerJs("var cruge_permission_url = '$url';",\yii\web\View::POS_HEAD);
        CrugePermissionAsset::register($this->getView());
       
        if(null === $this->roles){
            $items = $this->getConnection()->createCommand('select name from '.$this->authItemTable)->queryAll();
            if($items){
                $this->roles = [];
                foreach($items as $item)
                    $this->roles[] = $item['name'];
            }
        }
    
        $inputs = '';
        foreach($this->roles as $role){
            $item = $this->getAuth()->getPermission($role);
            $isAssigned = $this->getAuth()->checkAccess($this->userId, $role);
            $attrs = [
                'type'=>'checkbox',
                'data-id'=>$this->userId,
                'name'=>$role,
            ];
            if($isAssigned) $attrs['checked']='checked';
            $descr = $item->description ? $item->description : ucwords(str_replace("_"," ", $role));
            $input = Html::tag('input','',$attrs);
            $label = Html::tag('label',$input.$descr,['class'=>'permission-label']);
            $inputs .=  Html::tag('div',$label,['class'=>'checkbox cruge-permission-input']);
        }
        
        return $inputs;
   }
}
