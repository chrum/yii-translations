<?php

class m140717_083459_alteringTranslationsTable extends CDbMigration
{
    public function up()
    {
        $this->dropColumn("{{translations}}", "text");
        $langs = langHelper::getLangs();
        foreach($langs as $key => $value) {
            $this->addColumn("{{translations}}", $key, "varchar(100) NOT NULL");
        }
    }

    public function down()
    {
        $langs = langHelper::getLangs();
        foreach($langs as $key => $value) {
            $this->dropColumn("{{translations}}", $key);
        }

        $this->addColumn("{{translations}}", "text", "varchar(100) NOT NULL");
        return false;
    }
}