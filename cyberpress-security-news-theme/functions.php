<?php
/**
 * Theme setup and helper functions.
 *
 * @package CyberPressSecurityNews
 */

if (! defined('ABSPATH')) {
    exit;
}

function cyberpress_security_news_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'cyberpress-security-news'),
    ]);
}
add_action('after_setup_theme', 'cyberpress_security_news_setup');

function cyberpress_security_news_enqueue_assets(): void
{
    wp_enqueue_style('cyberpress-security-news-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'cyberpress_security_news_enqueue_assets');

function cyberpress_security_news_customizer_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('cyberpress_social_links', [
        'title'    => __('Social Links (Footer)', 'cyberpress-security-news'),
        'priority' => 160,
    ]);

    $social_networks = [
        'x'         => 'X (Twitter)',
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
        'github'    => 'GitHub',
        'telegram'  => 'Telegram',
    ];

    foreach ($social_networks as $key => $label) {
        $setting_key = sprintf('cyberpress_social_%s_url', $key);

        $wp_customize->add_setting($setting_key, [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control($setting_key, [
            'label'   => sprintf(__('%s URL', 'cyberpress-security-news'), $label),
            'section' => 'cyberpress_social_links',
            'type'    => 'url',
        ]);
    }
}
add_action('customize_register', 'cyberpress_security_news_customizer_register');

function cyberpress_get_social_links(): array
{
    return [
        'x' => [
            'url'   => get_theme_mod('cyberpress_social_x_url', ''),
            'label' => __('Follow us on X', 'cyberpress-security-news'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18.146 2H21.5l-7.33 8.376L22.8 22h-6.748l-5.28-6.9L4.74 22H1.38l7.84-8.959L.8 2h6.92l4.771 6.284L18.146 2Zm-1.184 17.95h1.87L6.703 3.945H4.695L16.962 19.95Z"/></svg>',
        ],
        'linkedin' => [
            'url'   => get_theme_mod('cyberpress_social_linkedin_url', ''),
            'label' => __('Connect on LinkedIn', 'cyberpress-security-news'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.94 8.5A1.94 1.94 0 1 1 6.94 4.62a1.94 1.94 0 0 1 0 3.88ZM5.2 9.98h3.47V20.8H5.2V9.98Zm5.42 0h3.33v1.48h.05c.46-.88 1.6-1.8 3.3-1.8 3.53 0 4.18 2.25 4.18 5.2v5.95H18V15.5c0-1.27-.03-2.92-1.83-2.92-1.84 0-2.12 1.36-2.12 2.83v5.4h-3.43V9.98Z"/></svg>',
        ],
        'youtube' => [
            'url'   => get_theme_mod('cyberpress_social_youtube_url', ''),
            'label' => __('Watch us on YouTube', 'cyberpress-security-news'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23.5 6.2a3.08 3.08 0 0 0-2.17-2.18C19.34 3.5 12 3.5 12 3.5s-7.34 0-9.33.52A3.08 3.08 0 0 0 .5 6.2 32.7 32.7 0 0 0 0 12a32.7 32.7 0 0 0 .5 5.8 3.08 3.08 0 0 0 2.17 2.18C4.66 20.5 12 20.5 12 20.5s7.34 0 9.33-.52a3.08 3.08 0 0 0 2.17-2.18A32.7 32.7 0 0 0 24 12a32.7 32.7 0 0 0-.5-5.8ZM9.6 15.57V8.43L15.9 12l-6.3 3.57Z"/></svg>',
        ],
        'github' => [
            'url'   => get_theme_mod('cyberpress_social_github_url', ''),
            'label' => __('Follow our GitHub', 'cyberpress-security-news'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0C5.37 0 0 5.48 0 12.24c0 5.41 3.44 10 8.2 11.62.6.11.82-.27.82-.58v-2.17c-3.33.74-4.03-1.45-4.03-1.45-.55-1.44-1.35-1.83-1.35-1.83-1.1-.78.08-.76.08-.76 1.22.09 1.86 1.29 1.86 1.29 1.08 1.91 2.83 1.36 3.52 1.03.1-.8.42-1.36.76-1.67-2.66-.31-5.47-1.37-5.47-6.1 0-1.35.47-2.45 1.24-3.31-.12-.31-.54-1.58.12-3.3 0 0 1.01-.33 3.3 1.27a11.3 11.3 0 0 1 6 0c2.29-1.6 3.3-1.27 3.3-1.27.66 1.72.24 2.99.12 3.3.77.86 1.24 1.96 1.24 3.31 0 4.74-2.81 5.79-5.49 6.1.43.38.82 1.12.82 2.27v3.37c0 .31.22.69.83.58 4.75-1.62 8.19-6.21 8.19-11.62C24 5.48 18.63 0 12 0Z"/></svg>',
        ],
        'telegram' => [
            'url'   => get_theme_mod('cyberpress_social_telegram_url', ''),
            'label' => __('Join our Telegram', 'cyberpress-security-news'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22.36 2.64a1.83 1.83 0 0 0-1.93-.3L1.9 9.67a1.89 1.89 0 0 0 .07 3.55l4.2 1.46 1.7 5.17a1.85 1.85 0 0 0 3.05.76l2.4-2.34 4.72 3.49a1.84 1.84 0 0 0 2.9-1.08L23.97 4.5a1.84 1.84 0 0 0-1.61-1.86ZM9.1 18.2l-1.1-3.35 9.2-6.75-8.1 8.1Zm10.22 1.05-4.76-3.52a1.85 1.85 0 0 0-2.37.15l-1.42 1.38 1.3-3.94a1.83 1.83 0 0 0-.47-1.88l-2.1-2.09 12.6-4.98-2.78 14.88Z"/></svg>',
        ],
    ];
}
