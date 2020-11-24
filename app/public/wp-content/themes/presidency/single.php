<?php get_header(); ?>

<?php get_template_part('components/hero') ?>

<div class="container">
    <a class="btn back" href="<?php echo get_permalink(get_option('page_for_posts')) ?>">
        Ga terug
    </a>

    <div>
        <strong>
            <?php if(count(get_the_category()) > 1) {
                echo 'Categorieën: ';
            } else {
                echo 'Categorie: ';
            } ?>
        </strong>
        <i>
            <?php the_category() ?>
        </i>
    </div>

    <div>
        <h1><?php the_title() ?></h1>

        <?php if(has_excerpt()) { ?>
            <blockquote>
                <?php the_excerpt() ?>
            </blockquote>
        <?php } ?>

        <div><?php the_content() ?></div>
    </div>

    <div>
        <?php previous_post_link('%link', 'Previous') ?>
        <?php next_post_link() ?>
    </div>
</div>

<?php get_footer(); ?>

