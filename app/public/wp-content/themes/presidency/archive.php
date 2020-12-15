<?php get_header(); ?>

<div class="container">
    <h1>
        Archive van:
        <?php
        if(is_author()) {
            the_author();
        } elseif(is_category()) {
            the_category();
        } elseif(is_date()) {
            echo get_the_date('F');
        } else {
            echo 'Zou je niet beter de wordpress file structure bekijken?';
        }
        ?>
    </h1>
    <?php while (have_posts()) { the_post() ?>
        <a href="<?php the_permalink() ?>" class="blog">
            <h2>
                <?= the_title() ?>
            </h2>
            <small><?php echo get_the_date() ?></small><br/>
            <small><?php the_date(); ?></small>
        </a>
    <?php } ?>
</div>

<?php get_footer(); ?>