<?php  defined('C5_EXECUTE') or die("Access Denied.");

$im = Core::make('helper/image');
$nh = Core::make('helper/navigation');
$th = Core::make('helper/text');

if (is_object($f) && $f->getFileID()) {
    $thumb = $im->getThumbnail($f, 500, 500, true);
}?>
<?php if (!$c->isEditMode()) {?>

    <?php if ($backgroundColor) {?>
        <style>
         .image-link-with-content:before {
             background-color: <?php echo h($backgroundColor)?>;
         }
        </style>
    <?php } ?>
    <?php if ($mainBackgroundColor) {?>
        <style>
         .image-link-with-content {
             background-color: <?php echo h($mainBackgroundColor)?>;
         }
        </style>
    <?php } ?>
    <?php if ($mainBackgroundColor) {?>
        <style>
         .ccm-page .image-link-with-content p {
             color: <?php echo h($mainContentColor)?>;
         }
        </style>
    <?php } ?>
    <?php if ($titleColor) {?>
        <style>
         .ccm-page .image-link-with-content h1 {
             color: <?php echo h($titleColor)?>;
         }
        </style>
    <?php } ?>

    <?php if ($linkUrl) {?>
    <a href="<?php echo h($linkUrl)?>" class="image-link-with-content" style="background-image: url('<?php echo h($thumb->src)?>');">
    <?php } else {?>
    <div class="image-link-with-content" style="background-image: url('<?php echo h($thumb->src)?>');">
    <?php } ?>
        <div class="image-link-with-content-container">
            <?php if($titleText){?>
                <h1>
                    <?php echo h($titleText)?>
                </h1>
            <?php }?>
            <div class="image-link-with-content-lower">
                <?php if($content){
                    $shortened = $th->shorten($content, 200);
                ?>
                    <p>
                        <?php echo h($shortened)?>
                    </p>
                <?php }?>
                <?php if($linkText){?>
                    <p class="small">
                        <?php echo h($linkText)?>
                    </p>
                <?php }?>
            </div>
        </div>
    <?php if ($linkUrl) {?>
    </a>
    <?php } else {?>
    </div>
    <?php } ?>

    <?php } elseif ($c->isEditMode()) {?>
    <div class="ccm-edit-mode-disabled-item"><?php  echo t('Image Links view is disabled while in edit mode') ?></div>
    <?php
}?>
