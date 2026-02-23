<?php
/**
 * Main template file.
 *
 * @package CyberPressSecurityNews
 */

get_header();

if (have_posts()) :
    echo '<div class="grid">';
    while (have_posts()) :
        the_post();
        ?>
        <article class="post-card">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="meta"><?php echo esc_html(get_the_date()); ?> · <?php the_author(); ?></p>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 26)); ?></p>
        </article>
        <?php
    endwhile;
    echo '</div>';
else :
    echo '<p>' . esc_html__('No posts found.', 'cyberpress-security-news') . '</p>';
endif;

get_footer();
