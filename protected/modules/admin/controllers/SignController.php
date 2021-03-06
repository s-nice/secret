<?php
/**
 * User: jiangtao
 * Date: 2016/8/21
 * Time: 20:26
 */
class SignController extends AdminController{

    public $layout = '/layouts/empty';

    public function actionLogin(){
        if(!Yii::app()->user->isGuest){
            $this->redirect($this->createUrl('/admin'));
        }
        $model = new Admin_LoginForm();
        if(Yii::app()->request->isPostRequest && !empty($_POST['Admin_LoginForm'])){
            $model->attributes = $_POST['Admin_LoginForm'];
            if($model->validate() && $model->login()){
                $this->redirect($this->createUrl('/admin'));
            }
        }
        $this->render('login',array('model'=>$model));
    }

    public function actionLogout(){
        Yii::app()->user->logout();
        Yii::app()->user->loginRequired();
    }
}