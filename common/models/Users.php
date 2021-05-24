<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property int|null $role_id
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 *
 * @property SiteContent[] $siteContents
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'role_id' => 'Role ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * Gets query for [[SiteContents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSiteContents()
    {
        return $this->hasMany(SiteContent::className(), ['created_by' => 'id']);
    }
    public function getRole() 
    {
        return $this->hasOne(Role::className(),['id'=>'role_id']);
    }
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

            $user = new Users();
            $user->attributes = $this->attributes;
            $user->username = $this->username;
            $user->role_id = $this->role_id;
            $user->email = $this->email;
            $user->password = $this->password;
            $user->generateAuthKey();
            $user->setPasswordHash($this->password);
            if($user->save()){
                return $user;
            }

    }
}
