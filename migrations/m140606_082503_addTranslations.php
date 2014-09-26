<?php

class m140606_082503_addTranslations extends CDbMigration
{
    protected $MySqlOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
	public function up()
	{
        $this->createTable("{{translations}}", array(
            "id" => "pk",
            "string_id" => "varchar(100) NOT NULL",
            "text" => "varchar(100) NOT NULL",
        ), $this->MySqlOptions);

	}

	public function down()
	{
        $this->dropTable("{{translations}}");
		return false;
	}


}