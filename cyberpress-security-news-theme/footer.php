<?php
/**
 * Footer template.
 *
 * @package CyberPressSecurityNews
 */

$social_links = cyberpress_get_social_links();
?>
</main>
<footer class="site-footer">
    <div class="container footer-inner">
        <small>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'cyberpress-security-news'); ?></small>

        <div class="footer-social" aria-label="<?php esc_attr_e('Social Links', 'cyberpress-security-news'); ?>">
            <?php foreach ($social_links as $network) : ?>
                <?php if (! empty($network['url'])) : ?>
                    <a href="<?php echo esc_url($network['url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($network['label']); ?>">
                        <?php echo wp_kses($network['icon'], ['svg' => ['viewBox' => true, 'aria-hidden' => true], 'path' => ['d' => true]]); ?>
                        <span class="screen-reader-text"><?php echo esc_html($network['label']); ?></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
