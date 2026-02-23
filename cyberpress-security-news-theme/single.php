<?php
/**
 * Single post template.
 *
 * @package CyberPressSecurityNews
 */

get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
        <article class="article-single">
            <p class="meta"><?php echo esc_html(get_the_date()); ?> · <?php the_author(); ?></p>
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <div><?php the_post_thumbnail('large'); ?></div>
            <?php endif; ?>
            <div><?php the_content(); ?></div>
        </article>
        <?php
    endwhile;
endif;

get_footer();
