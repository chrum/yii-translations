Translations module
==========

some description, to be written...

# Requirements

# Installation

Copy the module files to location of your choice

Enable the module in the config/main.php file adjusting 'class' to your needs:
~~~php
return array(
    ......
    'modules'=>array(
        'translations' => array(
            'class' => 'common.lib.yii-translations.TranslationsModule',
        ),
    ),
)
~~~

Adding some languages in your config/main.php, params section
~~~php
return array(
    .......
    'params' => array(
        "defaultLang" => "dk",
        "langs" => array(
            "dk" => "Danish",
            "se" => "Swedish",
            "no" => "Norwegian",
            "fi" => "Finnish"
        )
    ),
)
~~~

* Copy helper class(es) and make sure they are imported
* Copy migrations files from the module to your project and.
* Apply migrations.
* Use gii to generate 'Translations' model
