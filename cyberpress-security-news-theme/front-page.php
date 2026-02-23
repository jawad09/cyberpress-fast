<?php
/**
 * Front page template.
 *
 * @package CyberPressSecurityNews
 */

get_header();
?>
<section class="hero">
    <h1><?php esc_html_e('Cybersecurity Intelligence for a Safer Digital World', 'cyberpress-security-news'); ?></h1>
    <p><?php esc_html_e('Delivering trusted, up-to-date coverage on cyber threats, data breaches, incident response, malware trends, and security best practices.', 'cyberpress-security-news'); ?></p>
</section>

<section>
    <h2><?php esc_html_e('Latest News', 'cyberpress-security-news'); ?></h2>
    <div class="grid">
        <?php
        $latest_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 6,
        ]);

        if ($latest_query->have_posts()) :
            while ($latest_query->have_posts()) :
                $latest_query->the_post();
                ?>
                <article class="post-card">
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="meta"><?php echo esc_html(get_the_date()); ?></p>
                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p><?php esc_html_e('No posts yet. Publish your first cybersecurity story.', 'cyberpress-security-news'); ?></p>
            <?php
        endif;
        ?>
    </div>
</section>
<?php
get_footer();
