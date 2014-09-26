<?php
/* @var $this TranslationsController */
/** @var $models Translations[] */
$this->breadcrumbs=array(
	'Translations',
);
Yii::app()->clientScript->registerCoreScript('jquery');
$langs = langHelper::getLangs();
?>
<script>
    $(document).ready(function() {
        $(".table-row-link").click(function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            var target = $(event.target);
            var rowLink = target.data("row-link");
            if (typeof(rowLink) == 'undefined') {
                rowLink = target.parent().data("row-link");
            }
            document.location.href = '<?php echo Yii::app()->getBaseUrl(true); ?>' + rowLink;
            return false;
        });
    })
</script>
<h1>Manage translation strings</h1>

<div>
    <table class="table table-striped table-hover">
        <thead>
        <tr class="row">
            <th class="col-md-1">ID</th>
            <th class="col-md-5">String ID</th>
            <th class="col-md-1">&nbsp;</th>
            <th class="col-md-6">Danish</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($models as $string): ?>
            <tr class="table-row-link row" data-row-link="/translations/manage/update/id/<?php echo $string->id?>">
                <td><?php echo $string->id; ?></td>
                <td><?php echo $string->string_id; ?></td>
                <td><?php
                    $has = array();
                foreach ($langs as $lang => $name) {
                    if ($string->$lang != '') $has[] = $lang;
                }
                    echo implode(', ', $has);
                ?></td>
                <td><?php echo CHtml::encode($string->dk); ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>

    </table>

</div>
