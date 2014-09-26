<?php

class ManageController extends EController
{
    public function accessRules()
    {
        $roles = array('admin', 'manager');
        $langs = langHelper::getLangs();
        foreach($langs as $code => $name) {
            $roles[] = "translator-".$code;
        }
        return array(
            array('allow', 'roles'=>$roles),
            array('deny'),
        );
    }

    public function actionIndex() {
        $models = Translations::model()->findAll(array('order'=>'string_id'));

		$this->render('index', array(
            'models' => $models
        ));
	}

    public function actionCreate()
    {
        $translation = new Translations();

        if (isset($_REQUEST['Translations'])) {
            $translation->attributes = $_REQUEST['Translations'];

            if ($translation->validate()) {
                if ($translation->save(false)) {
                    $this->redirect(array('index'));
                }
            }
        }

        if ($translation->id != null) {
            $this->redirect(array('update','id'=>$translation->id));
        }

        $this->render('edit', array(
            'model'     => $translation,
        ));
    }

    public function actionDelete($id)
    {
        $model = Translations::model()->findByPk($id);
        if ($model != null) {
            $model->delete();
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    public function actionUpdate($id)
    {
        $model = Translations::model()->findByPk($id);

        if (isset($_REQUEST['Translations'])) {
            $model->attributes = $_REQUEST['Translations'];

            if ($model->validate()) {
                if ($model->save(false)) {
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('edit',array(
            'model'     => $model,
        ));
    }

}