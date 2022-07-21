<?php
$content = get_the_content();
$category = get_the_category();
$caption = get_the_title();
$single_id = get_the_ID();
?>

<div class="single-press-releases-wrap">
    <div>
        <section class="single-press-releases">
            <div id="post-<?php echo $single_id ?>">
                <h4 class="single-press-releases__category">
                    <?php echo $category[0]->name ?>
                </h4>
                <h1 class="single-press-releases__title">
                    <?php echo $caption; ?>
                </h1>
                <div class="flex justify-between items-center flex-wrap">
                    <div class="single-press-releases__date-wrap">
                        <span><?php the_date() ?></span>
                        <span><?php the_author() ?></span>
                    </div>
                    <div class="social-share">
                        <span>Share: </span>
                        <?php /* Begin the share button for facebook */
                        $urlStory = urlencode(get_permalink($single_id));
                        $urlFacebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $urlStory; ?>
                        <a class="social-share__link" href="<?php echo $urlFacebook; ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/fb2.svg" alt="face-book" width="10">
                        </a>
                        <?php /* End the share button for facebook */

                        /* Begin the share button for twitter */
                        $titleName = urlencode($caption);
                        $urlTwitter = 'https://twitter.com/intent/tweet?text=' . $titleName . '&amp;url=' . $urlStory . '&amputm_source=twitter_share&via=weedweeknews';
                        ?>
                        <a class="social-share__link" href="<?php echo $urlTwitter ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/tw2.svg" alt="twitter" width="20">
                        </a>
                        <?php /* End the share button for twitter */ ?>

                        <?php
                        /* Begin the share button for linkedin */
                        $urlLinkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $urlStory; ?>
                        <a class="social-share__link" href="<?php echo $urlLinkedin; ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/in-blue.svg" alt="pinterest" width="15">
                        </a>
                        <?php /* End the share button for linkedin */ ?>

                        <?php /* Begin the share button for Mailto */
                        $mailTo = 'wp.test.mail.for.me@gmail.com';
                        $subject = "I thought you'd be interested in this story from WeedWeek";
                        $subject = urlencode( $subject);
                        $content = urlencode($content); ?>
                        <a class="social-share__link" href="mailto:<?php //echo $mailTo; ?>?subject=<?php echo $subject . ' ' . $urlStory; ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/mail.svg" alt="Mailto" width="20">
                        </a>
                        <?php /* End the share button for Mailto */ ?>
                    </div>
                </div>
                <div class="single-press-releases__content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="social-share social-share--bottom">
                <span>Share: </span>
                <?php /* Begin the share button for facebook */ ?>
                <a class="social-share__link" href="<?php echo $urlFacebook; ?>" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/fb2.svg" alt="face-book" width="10">
                </a>
                <?php /* End the share button for facebook */

                /* Begin the share button for twitter */ ?>
                <a class="social-share__link" href="<?php echo $urlTwitter ?>" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/tw2.svg" alt="twitter" width="20">
                </a>
                <?php /* End the share button for twitter */ ?>

                <?php
                /* Begin the share button for linkedin */ ?>
                <a class="social-share__link" href="<?php echo $urlLinkedin; ?>" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/in-blue.svg" alt="pinterest" width="15">
                </a>
                <?php /* End the share button for linkedin */ ?>

                <?php /* Begin the share button for Mailto */ ?>
                <a class="social-share__link" href="mailto:<?php //echo $mailTo; ?>?subject=<?php echo $subject . ' ' . $urlStory; ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/mail.svg" alt="Mailto" width="20">
                </a>
                <?php /* End the share button for Mailto */ ?>
            </div>
        </section>
        <section class="press-releases-list">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'category_name' => 'press-releases',
                    'post_status' => 'publish',
                    'post__not_in' => [$single_id]
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
        <div class="more-press-releases text-center">
            <a class="btn-underline" href="<?php echo get_home_url() ?>/press-releases">
                MORE PRESS RELEASES
            </a>
        </div>
    </div>

    <aside>
        <h2 class="popular-title">Most popular</h2>
        <div>
            <?php include(locate_template( 'sections/most-popular-stories.php', false, false )); ?>
        </div>
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
                    <a class="join-pro-ad__btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>

            <p class="join-pro-ad__bottom-text"><?php the_field('join_pro_ad_bottom_text'); ?></p>
        </div>
        <!-- end subscribe pro -->
        <!-- begin subscribe form -->
        <div class="store-signup subscribe-form PicoSignal">
            <div class="subscribe-form__caption">
                <?php the_field('subscribe_title'); ?>
            </div>
            <div class="subscribe-form__content">
                <?php the_field('subscribe_text'); ?>
            </div>
            <div class="js-store-subscribe store-signup__form subscribe-form__form">
                <button type="submit" class="button subscribe-form__submit PicoPopup_9nmjynre">Subscribe</button>
            </div>
        </div>
        <!-- end subscribe form -->
    </aside>

</div>

