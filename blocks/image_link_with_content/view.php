<?php  defined('C5_EXECUTE') or die("Access Denied.");

$nh = Core::make('helper/navigation');
$th = Core::make('helper/text');
?>
<?php if (!$c->isEditMode()) {?>

    <?php if ($linkUrl) {?>
    <a href="<?php echo h($linkUrl)?>" class="image-link-with-content image-link-with-content-<?php echo h($bID)?>">
    <?php } else {?>
    <div class="image-link-with-content image-link-with-content-<?php echo h($bID)?>">
    <?php } ?>
        <div class="image-link-with-content-container">
            <?php if($titleText){?>
                <h2>
                    <?php echo h($titleText)?>
                </h2>
            <?php }?>
            <div class="image-link-with-content-lower">
                <?php if($content){
                    $shortened = $th->shorten($content, 300);
                ?>
                    <p>
                        <?php echo h($th->shorten($content,300))?>
                    </p>
                <?php }?>
                <?php if($linkText){?>
                    <p class="small">
                        <?php echo h($th->shorten($linkText, 48))?>
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
