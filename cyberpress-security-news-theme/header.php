<?php
/**
 * Header template.
 *
 * @package CyberPressSecurityNews
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <?php if (is_front_page() && is_home()) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
            <?php endif; ?>
            <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>

        <nav class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu', 'cyberpress-security-news'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => '__return_false',
            ]);
            ?>
        </nav>
    </div>
</header>
<main class="container content-area">
