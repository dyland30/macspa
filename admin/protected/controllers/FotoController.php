<?php

class FotoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    function init() {
        parent::init();
        Yii::app()->language = 'es';
    }

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Foto;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Foto'])) {
            $model->attributes = $_POST['Foto'];

            $model->fch_creacion = date('Y-m-d H:i:s');
            // cargar imagen y guardar en servidor
            /*
             * 

              'img_orig' => 'Imagen Original',
              'img_small' => 'Imgagen Small',
              'rutaimagen' => 'Imagen'
             */
            $img = CUploadedFile::getInstance($model, 'rutaimagen');
            $extension = "";
            if ($img) {
                $model->rutaimagen = $img;
                $extension = $img->getExtensionName();
            }

            if ($model->save()) {
                if (isset($model->rutaimagen)) {
                    $nombre = "G" . $model->idgaleria . "F" . $model->idfoto . "." . $extension;
                    if (!file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/fotos')) {
                        mkdir(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/fotos', 0755, true);
                    }

                    $model->rutaimagen->saveAs(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/$nombre");
                    $model->img_orig = $nombre;

                    if (file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/SMALL_$nombre")) {
                        @unlink(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/SMALL_$nombre");
                    }

                    $resizeObj = new resize(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/$nombre");
                    $resizeObj->resizeImage(120, 120, 0);
                    $resizeObj->saveImage(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/SMALL_$nombre", 100);
                    $model->img_small = "SMALL_$nombre";

                    $model->update();
                }



                $this->redirect(array('view', 'id' => $model->idfoto));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Foto'])) {
            $model->attributes = $_POST['Foto'];
            
            $img = CUploadedFile::getInstance($model, 'rutaimagen');
            $extension = "";
            if ($img) {
                $model->rutaimagen = $img;
                $extension = $img->getExtensionName();
            }
            
            if ($model->save()) {

                if (isset($model->rutaimagen)) {
                    $nombre = "G" . $model->idgaleria . "F" . $model->idfoto . "." . $extension;
                    if (!file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/fotos')) {
                        mkdir(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/fotos', 0755, true);
                    }

                    $model->rutaimagen->saveAs(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/$nombre");
                    $model->img_orig = $nombre;

                    if (file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/SMALL_$nombre")) {
                        @unlink(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/SMALL_$nombre");
                    }

                    $resizeObj = new resize(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/$nombre");
                    $resizeObj->resizeImage(120, 120, 0);
                    $resizeObj->saveImage(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/fotos/SMALL_$nombre", 100);
                    $model->img_small = "SMALL_$nombre";

                    $model->update();
                }




                $this->redirect(array('view', 'id' => $model->idfoto));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Foto');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Foto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Foto']))
            $model->attributes = $_GET['Foto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Foto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Foto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Foto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'foto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
