<?php

namespace app\components;

use Yii;
use app\models\User;

class AccessRule extends \yii\filters\AccessRule
{
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?' && $user->getIsGuest()) {
                return true;
            } elseif ($role === '@' && !$user->getIsGuest()) {
                return true;
            } elseif (!$user->getIsGuest()) {
                // user is not guest, let's check his role (or do something else)

                $roleOwn = User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one()->role->name;

                if ($role === $roleOwn) {

                    return true;
                }
            }
        }

        return false;
    }
}