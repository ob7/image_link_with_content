<?php defined('C5_EXECUTE') or die("Access Denied.");

$ps = Core::make('helper/form/page_selector');
$al = Core::make('helper/concrete/asset_library');
$color = Core::make('helper/form/color');

echo Core::make('helper/concrete/ui')->tabs(array(
    array('content', t('Content'), true),
    array('styling', t('Styling'))
));
?>
<div class="ccm-tab-content" id="ccm-tab-content-content">
    <fieldset>
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
</div>
<div class="ccm-tab-content" id="ccm-tab-content-styling">
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <?php echo $form->label('backgroundColor', t('Hover Overlay Color'))?><br>
                <?php echo $color->output('backgroundColor', $backgroundColor ? $backgroundColor : 'rgba(0,0,0,0.5)', array('showAlpha' => 'true'));?>
                <p class="small muted">This is the color that overlays the block when hovered as the content shows up on top.</p>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <?php echo $form->label('backgroundColor', t('Main Background Color'))?><br>
                <?php echo $color->output('mainBackgroundColor', $mainBackgroundColor ? $mainBackgroundColor : 'rgba(0,0,0,0.5)', array('showAlpha' => 'true'));?>
                <p class="small muted">The blocks main background color. Useful for when your using this block without an image, as the image will cover this color.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <?php echo $form->label('titleColor', t('Main Title Color'))?><br>
                <?php echo $color->output('titleColor', $titleColor ? $titleColor : 'rgba(255,255,255,1)', array('showAlpha' => 'true'));?>
                <p class="small muted">This is the color for the main title always displayed.</p>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <?php echo $form->label('mainContentColor', t('Main Content Color'))?><br>
                <?php echo $color->output('mainContentColor', $mainContentColor ? $mainContentColor : 'rgba(255,255,255,1)', array('showAlpha' => 'true'));?>
                <p class="small muted">This changes the color of the text shown after you hover.</p>
            </div>
        </div>
    </div>
</div>
