<?php get_header() ?>

<?php while (have_posts()) { the_post() ?>
        <a href="<?php the_permalink() ?>" class="blog">
            <h2>
                <?= the_title() ?>
            </h2>
            <small><?php echo get_the_date() ?></small><br/>
            <small><?php the_date(); ?></small>
        </a>
    <?php } ?>

<?php get_footer() ?>