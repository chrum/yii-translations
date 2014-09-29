<?php
$path = Yii::app()->getModule("translations")->getBasePath();
require_once ($path."/helpers/langHelper.php");
class m140716_074829_addingTranslators extends CDbMigration
{
    public function up()
    {
        $langs = langHelper::getLangs();
        foreach($langs as $key => $value) {
            $this->insert("{{AuthItem}}", array(
                "name" => "translator-".$key,
                "type" => 2,
                "description" => "Be a ".$value." translator",
                "bizrule" => null,
                "data"  => "N;"
            ));
        }
    }

    public function down()
    {
        $this->delete("{{AuthItem}}", "name like 'translator-%'");
    }
}