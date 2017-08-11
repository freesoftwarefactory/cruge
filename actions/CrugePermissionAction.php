<?php
namespace cruge\actions;

use Yii;
use yii\web\Response;

/**
 * CrugePermissionAction 
 *
 *  usage:

    public function actions()
    {
        return [
            'setrole'=>['class'=>CrugePermissionAction::className()],
        ];
    }
 *
 */
class CrugePermissionAction 
    extends \yii\base\Action {
    public function run()
    {
        $auth = Yii::$app->authManager;
        $request = Yii::$app->request;
        $response = Yii::$app->response;

        if ($request->isAjax && $request->isPost) 
        {
            $response->format = Response::FORMAT_JSON;
            $post = $request->post();
            $role = $auth->getRole($post['role']);
            
            $status = $auth->checkAccess($post['user'],$post['role']);
            if("true" === $post['flag']){
                if(!$status) $auth->assign($role,$post['user']);
            }else{
                if($status) $auth->revoke($role,$post['user']);
            }
            $status = $auth->checkAccess($post['user'],$post['role']);
            
            return ['status'=>'success','status'=>$status];
        } 
    }
}
