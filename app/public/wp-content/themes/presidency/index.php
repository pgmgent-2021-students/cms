<?php get_header() ?>
    <div class="container">
        <h1>Elections 2020</h1>
        <?php the_title() ?>
        <?php
            while (have_posts()) { the_post() ?>
                <div class="blog">
                    <h2><?= the_title() ?></h2>
                    <div><?= the_content() ?></div>
                </div>
            <?php }
        ?>
    </div>
<?php get_footer() ?>
