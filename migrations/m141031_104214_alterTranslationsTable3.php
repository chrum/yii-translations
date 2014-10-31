<?php
$path = Yii::app()->getModule("translations")->getBasePath();
require_once ($path."/helpers/langHelper.php");
class m141031_104214_alterTranslationsTable3 extends CDbMigration
{
    public function up()
    {
        $langs = langHelper::getLangs();
        foreach($langs as $key => $value) {
            $this->alterColumn("{{translations}}", $key, "varchar(1024) NULL");
        }
    }

    public function down()
    {
        $langs = langHelper::getLangs();
        foreach($langs as $key => $value) {
            $this->alterColumn("{{translations}}", $key, "varchar(100) NULL");
        }
        return true;
    }
}