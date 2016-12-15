<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;

class Country extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Customer';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['token'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['token', 'name', 'password'], 'required']
        ];
    }
}