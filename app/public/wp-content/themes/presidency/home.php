<?php get_header(); ?>

<div class="container">
    <h1>Blog</h1>

    <p>
        <?php if(is_home()) { echo 'Dit is de blogpagina.'; } ?>
    </p>

    <?php
        while (have_posts()) { the_post() ?>
            <div class="blog">
                <h2>
                    <a  href="<?php the_permalink() ?>">
                        <?= the_title() ?>
                    </a>
                </h2>
                <?php
                if(has_excerpt()) {
                    the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 5);
                } ?>

                <div>
                    <i>
                        Geschreven door: <?php the_author_posts_link() ?>
                    </i>
                    <i>
                        <?php the_category() ?>
                    </i>
                </div>
            </div>
        <?php }
    ?>

    <div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>
</div>

<?php get_footer(); ?>

