<?php
/*
 * Template Name: Press Releases
 */
?>

<?php get_header(); ?>

<main id="main" class="main-press-release" role="main">
    <div class="page-container">
        <h2 class="press-release-title">Press Release</h2>
        <div class="press-release-wrap">
            <section>
                <?php
                $args = array(
                    'posts_per_page' => 10,
                    'category_name' => 'press-releases',
                    'post_status' => 'publish'
                );

                $query = new WP_Query($args); ?>

                <?php if ($query->have_posts()) { ?>
                    <div>
                        <?php while($query->have_posts()) {
                            $query->the_post(); ?>

                            <a class="press-release" href="<?php echo get_permalink() ?>">

                                <?php
                                $content = get_the_content();
                                preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $content, $regexResult);
                                $firstImgScr = array_pop($regexResult);

                                $trimmed_content = wp_trim_words($content, 40, '...');
                                ?>

                                <div class="press-release__img-wrap">
                                    <?php if($firstImgScr) { ?>
                                    <img src="<?php echo $firstImgScr ?>"
                                         alt="<?php the_title() ?>" />
                                    <?php } ?>
                                </div>

                                <div class="press-release__content-wrap">
                                    <h3 class="press-release__caption">
                                        <?php the_title() ?>
                                    </h3>
                                    <div class="press-release__date-wrap">
                                        <span><?php the_date() ?></span>
                                        <span><?php the_author() ?></span>
                                    </div>
                                    <?php if ($content) { ?>
                                        <div class="press-release__content">
                                            <?php echo $trimmed_content ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </a>
                        <?php  } ?>
                    </div>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </section>

            <aside>
                <!-- begin subscribe pro -->
                <div class="join-pro-ad PicoSignal">
                    <div class="join-pro-ad__title">
                        <?php the_field('join_pro_ad_title'); ?>
                    </div>
                    <div class="join-pro-ad__desc">
                        <?php the_field('join_pro_ad_description'); ?>
                    </div>

                    <div class="join-pro-ad__text">
                        <?php the_field('join_pro_ad_text'); ?>
                    </div>

                    <div class="join-pro-ad__btn-wrap">
                        <?php
                        $link = get_field('join_pro_ad_button');
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="join-pro-ad__btn"
                               href="<?php echo esc_url( $link_url ); ?>"
                               target="<?php echo esc_attr( $link_target ); ?>">
                                <?php echo esc_html( $link_title ); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <p class="join-pro-ad__bottom-text">
                        <?php the_field('join_pro_ad_bottom_text'); ?>
                    </p>
                </div>
                <!-- end subscribe pro -->

                <?php
                $image = get_field('custom_ad_image');
                if( !empty( $image ) ): ?>
                    <div class="custom-pro-ad PicoSignal">
                        <img class="custom-pro-ad__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <a class="custom-pro-ad__url" target="_blank" href="<?php the_field('custom_ad_url'); ?>"></a>
                    </div>
                <?php endif; ?>

                <!--begin Letterhead section -->
                <div><?php the_field('letterhead', 'option'); ?></div>
                <!-- end Letterhead section -->

                <!-- begin subscribe form -->
                <div class="store-signup subscribe-form PicoSignal">
                    <div class="subscribe-form__caption">
                        <?php the_field('subscribe_title'); ?>
                    </div>
                    <div class="subscribe-form__content">
                        <?php the_field('subscribe_text'); ?>
                    </div>
                    <div class="js-store-subscribe store-signup__form subscribe-form__form">
                        <button type="submit"
                                class="button subscribe-form__submit PicoPopup_9nmjynre">
                            Subscribe
                        </button>
                    </div>
                </div>
                <!-- end subscribe form -->
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>
