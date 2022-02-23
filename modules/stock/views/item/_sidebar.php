<?php

use app\models\Person;
use yii\helpers\Html;

$model = $this->context->model;
?>

<div id="sidebar">
<?php
    if ( $this->context->action->id !== 'index' ) :
        echo $this->render('///_form_field/file_input', [
                'attribute' => 'image_path',
                'model' => $model,
            ]);
    endif;

    echo $this->render('///_form/_sidebar_links')
?>
</div>