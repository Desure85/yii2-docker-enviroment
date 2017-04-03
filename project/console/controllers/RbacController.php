<?php
namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->assign($admin, 1);
    }

    public function actionCreatePermission($name, $description)
    {
        $auth = Yii::$app->authManager;
        $permission = $auth->createPermission($name);
        $permission->description = $description;
        $auth->add($permission);
    }

    public function actionCreateRole($name)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($name);
        $auth->add($role);
    }

    public function actionAssignRole($username, $roleName)
    {
        $user = User::findByUsername($username);
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($roleName);
        $auth->assign($role, $user);
    }
}