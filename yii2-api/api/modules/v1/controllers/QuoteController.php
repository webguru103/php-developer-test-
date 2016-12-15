<?php
namespace api\modules\v1\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

class QuoteController extends Controller
{
    public function actionCreate()
    {
    }

    public function actionRemove($id)
    {
    }

    public function actionUpdate($id)
    {
    }

    private function find()
    {
    }

    private function setHeader($status)
    {
	  
	    $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
	    $content_type="application/json; charset=utf-8";
	
	    header($status_header);
	    header('Content-type: ' . $content_type);
	    header('X-Powered-By: ' . "Nintriva <nintriva.com>");
    }
    private function _getStatusCodeMessage($status)
    {
	    $codes = Array(
	        200 => 'OK',
	        400 => 'Bad Request',
	        401 => 'Unauthorized',
	        402 => 'Payment Required',
	        403 => 'Forbidden',
	        404 => 'Not Found',
	        500 => 'Internal Server Error',
	        501 => 'Not Implemented',
	    );
	    return (isset($codes[$status])) ? $codes[$status] : '';
    }
}