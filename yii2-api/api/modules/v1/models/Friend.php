<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Friend Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class Friend extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'Friend';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['code'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['code', 'email', 'password', 'info'], 'required']
        ];
    }
}