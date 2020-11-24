<?php get_header(); ?>

<div class="container">
    <h1>
        <?php single_cat_title(); ?> categories
    </h1>
    <?php if(category_description()) { ?>
    <p>
        <?php echo category_description() ?>
    </p>
    <?php } ?>
    <?php while (have_posts()) { the_post() ?>
        <a href="<?php the_permalink() ?>" class="blog">
            <h2>
                <?= the_title() ?>
            </h2>
            <small><?php echo get_the_date() ?></small>
        </a>
    <?php } ?>
</div>

<?php get_footer(); ?>

