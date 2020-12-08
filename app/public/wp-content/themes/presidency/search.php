<?php get_header(); ?>

<div class="container">
    <h1>
        <?php _e('Results for', 'presidency') ?> "<?php the_search_query() ?>"
    </h1>

    <a href="<?php echo esc_url(site_url('zoeken')) ?>">Terug naar zoeken</a>

    <?php get_search_form() ?>

    <?php while (have_posts()) { the_post() ?>
        <div class="blog">
        <?php get_template_part( 'components/search/result', get_post_type()); ?>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>

