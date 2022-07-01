<?php $hero_params = get_field('hero-settings');
$padding_top_desktop = $hero_params['padding_top_desktop'] ? $hero_params['padding_top_desktop'] : 147;
$padding_top_tablet = $hero_params['padding_top_tablet'] ? $hero_params['padding_top_tablet'] : 100;
$padding_top_mobile = $hero_params['padding_top_mobile'] ? $hero_params['padding_top_mobile'] : 50;

$padding_bottom_desktop = $hero_params['padding_bottom_desktop'] ? $hero_params['padding_bottom_desktop'] : 150;
$padding_bottom_tablet = $hero_params['padding_bottom_tablet'] ? $hero_params['padding_bottom_tablet'] : 100;
$padding_bottom_mobile = $hero_params['padding_bottom_mobile'] ? $hero_params['padding_bottom_mobile'] : 50;
$showImgBg = $hero_params['show_background_image'];
$urlImgBg = $hero_params['background_image'];
$hero_btn = get_field('hero_button');

$title_color = get_field('title_color');
$title = get_field('hero_title');
$content = get_field('hero_content');

$GLOBALS['custom-styles'] .= '.hero {padding-top:' . $padding_top_mobile . 'px; padding-bottom:' . $padding_bottom_mobile . 'px;}';
$GLOBALS['custom-styles'] .= '@media (min-width: 768px) {.hero {padding-top:' . $padding_top_tablet . 'px; padding-bottom:' . $padding_bottom_tablet . 'px;} }';
$GLOBALS['custom-styles'] .= '@media (min-width: 1200px) {.hero {padding-top:' . $padding_top_desktop . 'px; padding-bottom:' . $padding_bottom_desktop . 'px;} }';

printf(
'<style type="text/css">%s</style>',
$GLOBALS['custom-styles']
);

?>

<section class="hero lozad"
         style="background-color: <?php echo $hero_params['background_color']; ?>;
             border-bottom-left-radius: <?php echo $hero_params['bottom_left_radius']; ?>px;
             border-bottom-right-radius: <?php echo $hero_params['bottom_right_radius']; ?>px;
             color: <?php echo $hero_params['text_color']; ?>">

    <div class="page-container">

        <div class="hero__wrap">

            <div class="hero__col-content">
                <?php if($title) { ?>
                    <div class="hero__title" style="color: <?php echo $title_color?>;"><?php echo $title; ?></div>
                <?php } ?>

                <?php if($title) { ?>
                    <div class="hero__content"><?php echo $content; ?></div>
                <?php } ?>

                <?php if($hero_btn['show_button'] && $hero_btn['text']) { ?>
                    <div class="hero__btn-wrap position-relative">
                        <button class="btn position-relative">
                            <?php echo $hero_btn['text']; ?>
                        </button>
                        <div class="outline"></div>
                    </div>
                <?php } ?>
            </div>

            <div class="hero__col-image">
                <?php if($showImgBg && $urlImgBg) { ?>
                    <figure class="hero__image">
                        <img class="lozad" data-src="<?php echo esc_url($urlImgBg);?>" alt="" />
                    </figure>
                <?php } ?>
            </div>

        </div>



    </div>

</section>
