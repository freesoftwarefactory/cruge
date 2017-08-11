# HOW TO

## Widgets

Cruge comes with some widgets. You can implement this widgets by following this guide.

### Assign Permissions (CrugePermissionWidget)

This widget allows you to assign or revoke permissions to a specific user using
a ajax-based component.

* In any view, implement the widget in this way:

```
    <?php 
    use cruge\widgets\CrugePermissionWidget;
    ?>
    ...
    <?=CrugePermissionWidget::widget([
        'userId'=>$model->id,       // the user id (cruge_user table)
        'ajaxUrl'=>['setrole'],     // the ajax-based action used to set/unset the role
    ]);?>
    ...
```

* Install the required action ('setrole' or whatever name you want)

```
    <?php

    namespace app\controllers;

    use Yii;
    use cruge\actions\CrugePermissionAction;

    class UsuariosController extends Controller
    {
        public function actions()
        {
            return [
                'setrole'=>['class'=>CrugePermissionAction::className()],
            ];
        }
      ...
    }
```

