<?php

class ManageController extends EController
{
    public function getId()
    {
        // use constant id to allow mapping fake controller names to this one, @see TranslationsModule::$controllerMap
        return 'manage';
    }

    public function getUniqueId()
    {
        // use constant id to allow mapping fake controller names to this one, @see TranslationsModule::$controllerMap
        return $this->getModule() ? $this->getModule()->getId().'/manage' : 'manage';
    }

    public function run($actionID)
    {
        return parent::run(($id=parent::getId()) !== 'manage' ? $id : $actionID);
    }

    public function actions()
    {
        $actions = array();
        $langs = langHelper::getLangs();
        foreach($langs as $code => $name) {
            $actions[$code] = 'translations.actions.getTranslationsAction';
        }

        return $actions;
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