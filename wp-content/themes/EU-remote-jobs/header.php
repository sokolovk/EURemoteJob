<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php get_template_part( 'template-parts/head' ); ?>

</head>

<?php
// Initialize custom styles global.
$GLOBALS['custom-styles'] = '';
?>

<?php $logo = get_field('logo', 'options'); ?>
<?php $header_btn = get_field('header_button', 'options'); ?>



<body <?php body_class("page-body"); ?>>

    <div class="wrapper" id="app">

        <div class="content">

            <header class="page-header">

                <div class="page-container">

                    <div class="flex justify-between">

                        <div>
                            <a class="page-header__logo bold" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

                                <?php if(!empty($logo['logo_icon'])) { ?>
                                    <img
                                        src="<?php echo $logo['logo_icon']['url']; ?>"
                                        alt="<?php echo $logo['logo_icon']['alt']; ?>"
                                        width="<?php echo $logo['width']; ?>"
                                    />
                                <?php } ?>
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </div>

                        <div class="flex items-center">
                            <nav class="main-nav" role="navigation">
                                <?php wp_nav_menu( array(
                                    'theme_location' => 'menu-1',
                                    'menu_class' => 'main-nav__list flex',
                                    'container' => false )
                                ); ?>
                            </nav>
                            <?php if($header_btn['show_button'] && $header_btn['button_text']) { ?>
                                <div class="page-header__btn-wrap">
                                    <button class="btn btn--transparent">
                                        <?php echo $header_btn['button_text']; ?>
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            </header>
