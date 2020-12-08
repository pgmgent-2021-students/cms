<?php get_header(); ?>

<div class="container">
    <h1>
        <?php the_title() ?>
    </h1>
    <?php the_content() ?>

    <?php get_search_form() ?>

</div>

<?php get_footer() ?>