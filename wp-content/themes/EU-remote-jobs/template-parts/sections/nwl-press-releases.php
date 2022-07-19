<?php
$posts = get_sub_field('nwl_press_releases'); ?>

<?php if(!empty($posts)) { ?>
    <?php foreach($posts as $post) { ?>
        <?php $title = 'LATEST PRESS RESLEASE';
        $caption = $post->post_title;
        $content = $post->post_content;
        $trimmed_content = wp_trim_words($content,120, '...');
        $urlImage = get_field('story_image', $post->ID); ?>

        <article id="post-<?php echo $post->ID ?>"
                 class="s-nwl-press-releases">
            <h4 class="s-nwl-press-releases__title">
                <?php echo $title ?>
            </h4>

            <div class="s-nwl-press-releases__content-wrap">
                <?php if($content && $urlImage) { ?>
                    <img class="s-nwl-press-releases__story-img"
                         alt="<?php echo substr($caption, 0, 25) ?>"
                         src="<?php echo $urlImage ?>" />
                <?php } ?>
                <?php if($caption) { ?>
                    <h5 class="s-nwl-press-releases__caption">
                        <?php echo esc_html($caption) ?>
                    </h5>
                <?php } ?>
                <?php if($content) { ?>
                    <div class="s-nwl-press-releases__content">
                        <?php echo $trimmed_content ?>
                    </div>
                <?php } ?>
                <div class="text-center">
                    <a class="btn s-nwl-press-releases__btn" href="#">
                        Read the full press release here
                    </a>
                </div>
            </div>

            <div class="social-share">
                <?php /* Begin the share button for facebook */
                $urlStory = urlencode(get_permalink($p->ID));
                $urlFacebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $urlStory; ?>
                <a class="social-share__link" href="<?php echo $urlFacebook; ?>" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/icons/fb2.svg" alt="face-book" width="10">
                </a>
                <?php /* End the share button for facebook */

                /* Begin the share button for twitter */
                $titleName = urlencode($titleName);
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
        </article>
    <?php } ?>
<?php } ?>
