<?php

use yii\helpers\Html;
use bupy7\cropbox\Cropbox;
?>
<div id="<?= $this->context->id; ?>" class="cropbox">
    <div class="plugin"></div>
    <div class="btn btn-primary btn-file">
        <?php
        echo '<i class="glyphicon glyphicon-folder-open"></i> ' . Cropbox::t('Browse');
        //if ($this->context->hasModel()) {
            echo Html::activeFileInput($this->context->model, $this->context->attribute, $this->context->options);
        //} else {
        //    echo Html::fileInput($this->context->name, $this->context->value, $this->context->options);
        //}
        ?>
    </div>
    <div class="btn-group">
        <?= Html::button('<i class="glyphicon glyphicon-scissors"></i> ' . Cropbox::t('Crop'), [
            'class' => 'btn btn-success btn-crop',
        ]); ?>
        <?= Html::button('<i class="glyphicon glyphicon-repeat"></i> ' . Cropbox::t('Reset'), [
            'class' => 'btn btn-warning btn-reset',
        ]); ?>
        <?= Html::button('<i class="glyphicon glyphicon-minus"></i> ', [
            'class' => 'btn btn-default btn-scale-out',
        ]); ?>
        <?= Html::button('<i class="glyphicon glyphicon-plus"></i> ', [
            'class' => 'btn btn-default btn-scale-in',
        ]); ?>
    </div>
    <div class="cropped-images-cropbox">
        <p>
            <?php 
            if (!empty($this->context->originalImageUrl)) {
                echo Html::a(
                    '<i class="glyphicon glyphicon-eye-open"></i> ' . Cropbox::t('Show original'), 
                    $this->context->originalImageUrl, 
                    [
                        'target' => '_blank',
                        'class' => 'btn btn-info',
                    ]
                );
            } 
            ?>
        </p>
        <?php
        if (!empty($this->context->previewImagesUrl)) {
            foreach ($this->context->previewImagesUrl as $url) {
                if (!empty($url)) {
                    echo Html::img($url, ['class' => 'img-thumbnail']);
                }
            }
        }
        ?>
    </div>
    <?php
    //if ($this->context->hasModel()) {
        echo Html::activeHiddenInput($this->context->model, $this->context->croppedDataAttribute);
    //} else {
    //    echo Html::hiddenInput($this->context->croppedDataName, $this->context->croppedDataValue);
    //} 
    ?>
</div>