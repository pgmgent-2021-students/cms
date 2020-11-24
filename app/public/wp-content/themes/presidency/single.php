<?php get_header(); ?>

<?php get_template_part('components/hero') ?>

<?php get_template_part('components/hero', 'image', array(
    'title' => 'Hello'
)); ?>

<div class="container">
    <a class="btn back" href="<?php echo get_permalink(get_option('page_for_posts')) ?>">
        Ga terug
    </a>

    <div>
        <h1><?php the_title() ?></h1>
        <div><?php the_content() ?></div>
    </div>

    <div>
        <?php comments_template() ?>
    </div>

    <div>
        <?php previous_post_link('%link', 'Previous') ?>
        <?php next_post_link() ?>
    </div>
</div>

<?php get_footer(); ?>

