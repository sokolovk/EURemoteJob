<?php
// Initialize custom styles global.
$GLOBALS['custom-styles'] = '';

$section_params = get_field('section-settings');
$padding_top_desktop = $section_params['padding_top_desktop'] ? $section_params['padding_top_desktop'] : 147;
$padding_top_tablet = $section_params['padding_top_tablet'] ? $section_params['padding_top_tablet'] : 100;
$padding_top_mobile = $section_params['padding_top_mobile'] ? $section_params['padding_top_mobile'] : 50;

$padding_bottom_desktop = $section_params['padding_bottom_desktop'] ? $section_params['padding_bottom_desktop'] : 150;
$padding_bottom_tablet = $section_params['padding_bottom_tablet'] ? $section_params['padding_bottom_tablet'] : 100;
$padding_bottom_mobile = $section_params['padding_bottom_mobile'] ? $section_params['padding_bottom_mobile'] : 50;

$title = get_field('section_title');
$content = get_field('section_content');

$GLOBALS['custom-styles'] .= '.section-stay-compliant {padding-top:' . $padding_top_mobile . 'px; padding-bottom:' . $padding_bottom_mobile . 'px;}';
$GLOBALS['custom-styles'] .= '@media (min-width: 768px) {.section-stay-compliant {padding-top:' . $padding_top_tablet . 'px; padding-bottom:' . $padding_bottom_tablet . 'px;} }';
$GLOBALS['custom-styles'] .= '@media (min-width: 1200px) {.section-stay-compliant {padding-top:' . $padding_top_desktop . 'px; padding-bottom:' . $padding_bottom_desktop . 'px;} }';

printf(
    '<style type="text/css">%s</style>',
    $GLOBALS['custom-styles']
);
?>

<section class="section-stay-compliant">

    <div class="page-container">

        <div class="text-center">

            <?php if($title) { ?>
                <div class="section-stay-compliant__title mx-auto"><?php echo $title; ?></div>
            <?php } ?>

            <?php if($title) { ?>
                <div class="section-stay-compliant__content mx-auto"><?php echo $content; ?></div>
            <?php } ?>

        </div>

        <?php if(have_rows('information_blocks')) { ?>

            <div class="columns-block mx-auto text-center">

                <?php while (have_rows('information_blocks')) { the_row(); ?>
                    <?php $btn = get_sub_field('button'); ?>

                    <div class="columns-block__item">

                        <h3 class="columns-block__title">
                            <?php the_sub_field('title'); ?>
                        </h3>

                        <div class="columns-block__content">
                            <?php the_sub_field('content'); ?>
                        </div>

                        <?php if(!empty($btn)) { ?>
                            <a class="btn btn--success columns-block__link"
                               target="<?php echo $btn['target']; ?>"
                               href="<?php echo esc_url($btn['url']); ?>">
                                <?php echo $btn['title']; ?>
                            </a>
                        <?php } ?>

                    </div>

                <?php } ?>

            </div>

        <?php } ?>

    </div>

</section>

