<?php
namespace api\modules\v1\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

class CustomerController extends Controller
{
    public $modelClass = 'api\modules\v1\models\Customer';
    public $quoteClass = 'api\modules\v1\models\Quote';
    public $quoteController = 'api\modules\v1\controllers\QuoteController';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'action' => [
                    'info' => ['get'],
                    'register' => ['post'],
                    'login' => ['post'],
                    'profile' => ['get'],
                    'author' => ['get'],
                    'quote' => ['get'],
                    'logout' => ['delete'],
                ]
            ]
        ];
    }

    public function beforeAction($event) 
    {
        $action = $event -> id;
        if(isset($this->action[$action])) {
            $verbs = $this->action[$action];
        } elseif($this->action['*']) {
                $verbs = $this->action['*'];
        } else {
            return $event->isValid;
        }

        $verb = Yii::$app->getRequest()->getMethod();

        $allowed = array_map('strtoupper', $verbs);
       
       if (!in_array($verb, $allowed)) {
            
             $this->setHeader(400);
             echo json_encode(array('status'=>0,'error_code'=>400,'message'=>'Method not allowed'),JSON_PRETTY_PRINT);
             exit;
            
         }  
         
       return true; 
    }

    public function actionInfo() 
    {
        $params = $_REQUEST;
        if(isset($params['info']))
        {
            $this->setHeader(200);
            return json_encode(array('success'=> true, 'data' => ['info' => 'Some information about the <b>company</b>']), JSON_PRETTY_PRINT);
        }else{
            $this->setHeader(404);
            return json_encode(array('success'=> false, 'data' => ['message' => 'Access denied']), JSON_PRETTY_PRINT);
        }
        
    }

    public function actionRegister($request)
    {
        if(isset($request))
        {
            $this->setHeader(200);
            return json_encode(array('success'=>true, 'data'=>['email'=> $request->email, 'password'=> $request->password, 'info'=> $request->info]), JSON_PRETTY_PRINT);
        } else {
            $this->setHeader(400);
            return json_encode(array('success'=> false, 'data' => ['message' => 'Access denied']), JSON_PRETTY_PRINT);
        }
    }

    public function actionLogin($request)
    {
        if(isset($request))
        {
            $this->setHeader(200);
            return json_encode(array('success'=>true, 'data'=>['token'=> $this->token]), JSON_PRETTY_PRINT);
        }else{
            $this->setHeader(400);
            return json_encode(array('success'=> false, 'data' => ['message' => 'Access denied']), JSON_PRETTY_PRINT);
        }
    }

    public function actionProfile()
    {
        if(isset($this->token)){
            $this->setHeader(200);
            return json_encode(array('success'=>true, 'data'=>['email'=>$this->email, 'info'=>'I am experienced <b>web</b> developer!']), JSON_PRETTY_PRINT);
        }else{
            $this->setHeader(404);
            return json_encode(array('success'=> false, 'data' => ['message' => 'Access denied']), JSON_PRETTY_PRINT);
        }
    }

    public function actionLogout()
    {
            return json_encode(array('success'=>true, 'data'=>['']), JSON_PRETTY_PRINT);
    }

    public function actionAuthor($id)
    {
        if(isset($this->token)){
            $this->setHeader(200);
            return json_encode(array('success'=>true, 'data'=>['authorId'=> '1', 'name'=>'Charlie Chaplin']), JSON_PRETTY_PRINT);
        }else{
            $this->setHeader(404);
            return json_encode(array('success'=> false, 'data' => ['message' => 'Access denied']), JSON_PRETTY_PRINT);
        }
    }

    public function actionQuote($authorId)
    {
        if(isset($this->token)){
            $this->setHeader(200);
            return json_encode(array('success'=>true, 'data'=>['authorId'=> $authorId, 'quoteId'=> $this-> quoteId, 'quote'=>'A day without laughter is a day wasted.']), JSON_PRETTY_PRINT);
        }else{
            $this->setHeader(404);
            return json_encode(array('success'=> false, 'data' => ['message' => 'Access denied']), JSON_PRETTY_PRINT);
        }
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