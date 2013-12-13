<?php

class PromocionController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    function init() {
        parent::init();
        Yii::app()->language = 'es';
    }

    /**
     * @return array action filters
     */
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
                'actions' => array('index', 'view', 'obtenerservicios', 'removerservicio', 'agregarservicios'),
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
        $model = new Promocion;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Promocion'])) {
            $model->attributes = $_POST['Promocion'];
            $img = CUploadedFile::getInstance($model, 'rutaimagen');
            $extension = "";
            if ($img) {
                $model->rutaimagen = $img;
                $extension = $img->getExtensionName();
            }

            if ($model->save()) {
                if (isset($model->rutaimagen)) {

                    $nombre = $model->idpromocion . "." . $extension;
                    //crear carpeta promocion si no existe
                    if (!file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/promociones')) {
                        mkdir(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/promociones', 0755, true);
                    }
                    $model->rutaimagen->saveAs(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/_ORIG_$nombre");
                    $model->imagen = $nombre;

                    if (file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/$nombre")) {
                        @unlink(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/$nombre");
                    }

                    $resizeObj = new resize(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/_ORIG_$nombre");
                    $resizeObj->resizeImage(480, 260, 0);
                    $resizeObj->saveImage(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/$nombre", 100);

                    Loguer::registrar("PromocionController Create \n", "Imagen: " . $model->imagen);

                    $model->update();
                    Loguer::registrar("PromocionController After Update \n", "Imagen: " . $model->imagen);
                }
                $this->redirect(array('view', 'id' => $model->idpromocion));
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

        if (isset($_POST['Promocion'])) {
            $model->attributes = $_POST['Promocion'];
            $img = CUploadedFile::getInstance($model, 'rutaimagen');
            $extension = "";
            if ($img) {
                $model->rutaimagen = $img;
                $extension = $img->getExtensionName();
            }

            if ($model->save()) {
                if (isset($model->rutaimagen)) {
                    //eliminar el archivo si existe

                    $nombre = $model->idpromocion . "." . $extension;
                    if (!file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/promociones')) {
                        mkdir(Yii::app()->basePath . DIRECTORY_SEPARATOR . '../images/promociones', 0755, true);
                    }

                    $model->rutaimagen->saveAs(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/_ORIG_$nombre");
                    $model->imagen = $nombre;

                    if (file_exists(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/$nombre")) {
                        @unlink(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/$nombre");
                    }

                    $resizeObj = new resize(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/_ORIG_$nombre");
                    $resizeObj->resizeImage(480, 260, 0);
                    $resizeObj->saveImage(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../images/promociones/$nombre", 100);

                    Loguer::registrar("PromocionController Update \n", "Imagen: " . $model->imagen);

                    $model->update();

                    Loguer::registrar("PromocionController After Update \n", "Imagen: " . $model->imagen);
                }
                $this->redirect(array('view', 'id' => $model->idpromocion));
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
        $dataProvider = new CActiveDataProvider('Promocion');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Promocion('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Promocion']))
            $model->attributes = $_GET['Promocion'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Promocion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Promocion::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Promocion $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'promocion-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAgregarServicios() {
        $mensaje = "OK";
        try {

            if (isset($_REQUEST['idServicio']) && isset($_REQUEST['idPromocion'])) {
                $idPromocion = $_REQUEST['idPromocion'];
                $idServicio = $_REQUEST['idServicio'];

                $precio = isset($_REQUEST['precio']) ? $_REQUEST['precio'] : 0;

                $query = "insert into promocion_servicio(idpromocion,idservicio,flg_activo,precio_promo) values($idPromocion,$idServicio,1,$precio)";
                //ejecutar sql
                Yii::app()->db->createCommand($query)->execute();
            }
        } catch (Exception $ex) {

            $mensaje = $ex->getMessage();
        }

        echo $mensaje;
    }

    public function actionRemoverServicio() {
        $mensaje = "OK";
        try {

            if (isset($_REQUEST['idServicio']) && isset($_REQUEST['idPromocion'])) {
                $idPromocion = $_REQUEST['idPromocion'];
                $idServicio = $_REQUEST['idServicio'];
                $query = "delete from promocion_servicio where idpromocion=$idPromocion and idservicio=$idServicio";
                //ejecutar sql
                Yii::app()->db->createCommand($query)->execute();
            }
        } catch (Exception $ex) {

            $mensaje = $ex->getMessage();
        }

        echo $mensaje;
    }

    public function actionObtenerServicios() {
        $servicios = null;
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $model = Promocion::model()->findByPk($id);
            $servicios = $model->servicios;
        }
        echo CJSON::encode($servicios);
    }

}
