        </div>
        <!--close content class tag-->

        <?php
        $content = get_field('footer_content', 'options');
        $footer_btn = get_field('footer_button', 'options');
        $footer_socials = get_field('footer_sosials', 'options');
        $socials = $footer_socials["socials"]; ?>

        <footer class="footer" role="contentinfo">

            <div class="footer__wrap page-container flex justify-between">

                <div class="footer__menu">

                    <?php wp_nav_menu( array(
                            'theme_location' => 'menu-footer',
                            'menu_class' => 'footer__list',
                            'container' => false )
                    ); ?>

                    <?php if($footer_socials["show_socials"] && count($socials)) { ?>

                        <?php if( have_rows('footer_sosials', 'options') ) {
                            while( have_rows('footer_sosials', 'options') ) { the_row(); ?>
                                <?php if( have_rows('socials') ) { ?>
                                    <div class="footer__socials text-right">
                                        <?php while( have_rows('socials') ) { the_row(); ?>
                                            <?php $icon = get_sub_field('icon'); ?>
                                            <?php $url = get_sub_field('url'); ?>
                                            <a href="<?php echo esc_url($url);?>">
                                                <img src="<?php echo esc_url($icon);?>" alt="" width="32" />
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                </div>

                <?php if($content) { ?>
                    <div class="footer__content"><?php echo $content; ?></div>
                <?php } ?>

                <?php if($footer_btn['show_button'] && $footer_btn['text']) { ?>
                    <div class="footer__btn-wrap text-right">
                        <button class="btn btn--xl">
                            <?php echo $footer_btn['text']; ?>
                        </button>
                    </div>
                <?php } ?>

            </div>

        </footer>
    </div>
    <!--close wrapper class tag-->

wp_footer(); ?>

</body>
</html>
