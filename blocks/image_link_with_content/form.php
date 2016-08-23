<?php 
defined('C5_EXECUTE') or die("Access Denied.");

$ps = Core::make('helper/form/page_selector');
$al = Core::make('helper/concrete/asset_library');
?>
<fieldset>
    <legend>
        <?php echo t('Content')?>
    </legend>
    <div class="form-group">
        <?php 
        echo $form->label('ccm-b-image', t('Image'));
        echo $al->image('ccm-b-image', 'fID', t('Choose Image'), $bf);
        ?>
    </div>
    <div class="form-group">
        <?php  echo $form->label('titleText', t('Title Text')); ?>
        <?php  echo $form->text('titleText', $titleText); ?>
    </div>
    <div class="form-group">
        <?php  echo $form->label('content', t('Content')); ?>
        <?php  echo $form->textArea('content', $content); ?>
    </div>
    <div class="form-group">
        <?php 
        echo $form->label('internalLinkCID', t('Choose Page:'));
        echo $ps->selectPage('internalLinkCID', $internalLinkCID);
        ?>
    </div>
    <div class="form-group">
        <?php  echo $form->label('linkText', t('Link Text')); ?>
        <?php  echo $form->text('linkText', $linkText); ?>
    </div>


</fieldset>
