<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property int $theme_id
 * @property int $user_id
 * @property int $date
 * @property string $text
 *
 * @property Theme $theme
 * @property User $user
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['theme_id', 'user_id','text'], 'required'],
            [['theme_id', 'user_id','date'], 'integer'],
            [['theme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Theme::className(), 'targetAttribute' => ['theme_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'theme_id' => 'Theme ID',
            'user_id' => 'User ID',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Theme]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(Theme::className(), ['id' => 'theme_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getAllByIdTheme($id){
        $query  = new Query();
        return $query->select(['answer.id','answer.text','answer.date','user.email'])->from('answer')->innerJoin('user','answer.user_id = user.id')->all();
    }
}
