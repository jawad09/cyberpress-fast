<?php
/**
 * Archive template.
 *
 * @package CyberPressSecurityNews
 */

get_header();
?>
<header>
    <h1><?php the_archive_title(); ?></h1>
    <?php the_archive_description('<div class="meta">', '</div>'); ?>
</header>
<?php
if (have_posts()) :
    echo '<div class="grid">';
    while (have_posts()) :
        the_post();
        ?>
        <article class="post-card">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="meta"><?php echo esc_html(get_the_date()); ?></p>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
        </article>
        <?php
    endwhile;
    echo '</div>';
    the_posts_navigation();
else :
    echo '<p>' . esc_html__('No content found for this archive.', 'cyberpress-security-news') . '</p>';
endif;

get_footer();
