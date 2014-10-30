<?php

class m141030_130603_addTranslationsNamespaces extends CDbMigration
{
    public function up()
    {
        $this->createTable('{{translations_namespaces}}', array(
            'id' => 'pk',
            'name' => 'varchar(256)',
        ));
    }


    public function down()
    {
        $this->dropTable('{{translations_namespaces}}');
    }
}