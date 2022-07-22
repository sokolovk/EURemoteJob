<?php
$title=get_sub_field('block_press_releases_title');
$content=get_sub_field('block_press_releases_content');
$btn=get_sub_field('block_press_releases_btn');
?>

<div class="press-release-block">
    <div class="press-release-block__logo text-center">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_stylesheet_directory_uri() . '/src/assets/icons/logo-h.svg' ?>" alt="logo">
        </a>
    </div>
    <?php if($title) { ?>
    <div class="press-release-block__title">
        <?php echo $title ?>
    </div>
    <?php } ?>
    <?php if($content) { ?>
        <div class="press-release-block__content">
            <?php echo $content ?>
        </div>
    <?php } ?>
    <?php if(!empty($btn)) { ?>
        <?php $target = $btn['target'] ? '_blank' : '_self' ?>
        <div class="press-release-block__btn-wrap">
            <a class="btn-press-release" href="<?php echo esc_url($btn['url']) ?>"
               target="<?php echo $target ?>">
                <?php echo esc_html($btn['title']) ?>
            </a>
        </div>
    <?php } ?>
</div>
