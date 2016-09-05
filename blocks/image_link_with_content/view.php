<?php  defined('C5_EXECUTE') or die("Access Denied.");

$im = Core::make('helper/image');
$nh = Core::make('helper/navigation');
$th = Core::make('helper/text');

if (is_object($f) && $f->getFileID()) {
    $thumb = $im->getThumbnail($f, 500, 500, true);
}?>
<?php if (!$c->isEditMode()) {?>

    <?php if ($backgroundColor && $mainBackgroundColor && $titleColor && $mainContentColor) {?>
        <style>
         .image-link-with-content-<?php echo h($bID)?>:before {
             background-color: <?php echo h($backgroundColor)?>;
         }
         .image-link-with-content-<?php echo h($bID)?> {
             background-color: <?php echo h($mainBackgroundColor)?>;
         }
         .image-link-with-content-<?php echo h($bID)?> p {
             color: <?php echo h($mainContentColor)?>;
         }
         .image-link-with-content-<?php echo h($bID)?> h1 {
             color: <?php echo h($titleColor)?>;
         }
        </style>
    <?php } ?>

    <?php if ($linkUrl) {?>
    <a href="<?php echo h($linkUrl)?>" class="image-link-with-content image-link-with-content-<?php echo h($bID)?>" style="background-image: url('<?php echo h($thumb->src)?>');">
    <?php } else {?>
    <div class="image-link-with-content image-link-with-content-<?php echo h($bID)?>" style="background-image: url('<?php echo h($thumb->src)?>');">
    <?php } ?>
        <div class="image-link-with-content-container">
            <?php if($titleText){?>
                <h1>
                    <?php echo h($titleText)?>
                </h1>
            <?php }?>
            <div class="image-link-with-content-lower">
                <?php if($content){
                    $shortened = $th->shorten($content, 300);
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
    <div class="ccm-edit-mode-disabled-item"><?php  echo t('Image Link With Content is disabled while in edit mode') ?></div>
    <?php
}?>
