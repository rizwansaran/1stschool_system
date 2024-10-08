<?php
class CashReceiptController extends RController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array('rights');
    }
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(array('allow', 'actions' => array('index', 'view', 'loadchallan'), 'users' => array('*')), array('allow', 'actions' => array('create', 'update'), 'users' => array('@')), array('allow', 'actions' => array('admin', 'delete'), 'users' => array('admin')), array('deny', 'users' => array('*')));
    }
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->layout = "plain";
        $this->render('view', array('model' => $this->loadModel($id)));
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new CashReceipt();
        $challan = new Challan();
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['CashReceipt'])) {
            $receipt = CashReceipt::model()->findByAttributes(array("challan_id" => $_POST['CashReceipt']['challan_id']));
            if (empty($receipt)) {
                $model->attributes = $_POST['CashReceipt'];
                $model->receipt_date = date("Y-m-d", time());
                $model->receipt_date = date("Y-m-d", time());
                $model->fine_amount = $_POST['fine_amt'];
                $model->fine_reduced = $_POST['fine_reduced'];
                $model->towing_charges = $_POST['CashReceipt']['towing_charges'];
                $model->total_fine_amount = $model->fine_amount + $model->towing_charges - $model->fine_reduced;
                if ($model->save()) {
                    Yii::app()->user->setFlash('success1 message1', "Receipt has been created successfully");
                    if (isset($_POST['save'])) {
                        $this->redirect(array('admin'));
                    } elseif (isset($_POST['saveprint'])) {
                        $this->redirect(array('create&print=1&id=' . $model->id));
                    }
                }
            } else {
                Yii::app()->user->setFlash('error1 message1', "Receipt already generated for this challan");
                $this->redirect(array('admin'));
            }
        }
        $this->render('create', array('model' => $model, 'challan' => $challan));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['CashReceipt'])) {
            $model->attributes = $_POST['CashReceipt'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('update', array('model' => $model));
    }
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('CashReceipt');
        $this->render('index', array('dataProvider' => $dataProvider));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new CashReceipt('search');
        $model->unsetAttributes();
        // clear any default values
        if (isset($_GET['CashReceipt'])) {
            $model->attributes = $_GET['CashReceipt'];
        }
        $this->render('admin', array('model' => $model));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CashReceipt the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = CashReceipt::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }
    /**
     * Performs the AJAX validation.
     * @param CashReceipt $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cash-receipt-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionCasehistory()
    {
        $this->layout = "//layouts/column1";
        $this->render('casehistory', array());
    }
    public function actionLoadchallan()
    {
        //print_r($_REQUEST);exit;
        $model = new Challan();
        if (!empty($_REQUEST['form_number']) && !empty($_REQUEST['book_number']) && !empty($_REQUEST['reg_number'])) {
            $criteria = new CDbCriteria();
            $criteria->select = '*';
            $criteria->condition = "challan_form_number = " . $_REQUEST['form_number'] . " and challan_number = " . $_REQUEST['book_number'];
            //" and vehicle_reg_no = '".$_REQUEST['reg_number']."'";
            $data = Challan::model()->find($criteria);
            if (!empty($_REQUEST['reg_number'])) {
                $criteria = new CDbCriteria();
                $criteria->select = '*';
                $criteria->condition = "vehicle_reg_no = '" . $_REQUEST['reg_number'] . "'";
                $data1 = (array) Challan::model()->findAll($criteria);
                foreach ($data1 as $d => $v) {
                    $data2['history'][$d] = $v;
                }
            }
            // echo"<pre>";print_r(array_merge((array)$data,(array)$data2));exit;
            // print(json_encode(array_merge((array)$data,(array)$data2)));
            $data = array_merge((array) $data, (array) $data2);
        }
        if (!empty($_REQUEST['form_number']) && !empty($_REQUEST['book_number'])) {
            $data = Challan::model()->findByAttributes(array("challan_form_number" => $_REQUEST['form_number'], "challan_number" => $_REQUEST['book_number']));
            //$data['offences'] = $model->user_challan_listname($data['id']);
        }
        $data2['offences'] = array();
        $data2['fine'] = array();
        $data2['offences'] = $model->user_challan_listname($data['id']);
        $data2['fine'] = $model->user_challan_fine($data['id']);
        $data['date_time_offence'] = date("m-d-Y", strtotime($data['date_time_offence']));
        print json_encode(array_merge((array) $data, $data2));
        exit;
        Yii::app()->end();
    }
    public function actionLoadHistory()
    {
        //print_r($_REQUEST);exit;
        $model = new Challan();
        if (!empty($_REQUEST['reg'])) {
            $criteria = new CDbCriteria();
            $criteria->select = '*';
            $criteria->condition = "vehicle_reg_no = '" . $_REQUEST['reg'] . "'";
            $data = Challan::model()->findAll($criteria);
        }
        print json_encode((array) $data);
        Yii::app()->end();
    }
}