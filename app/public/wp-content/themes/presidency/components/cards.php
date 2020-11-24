<?php

$loop = new WP_Query( array(
    'post_type' => $args['type'] ? $args['type'] : null,
    'posts_per_page' => 1,
));

while ($loop->have_posts()) { $loop->the_post() ?>
    <div class="blog">
        <h2>
            <a  href="<?php the_permalink() ?>">
                <?= the_title() ?>
            </a>
        </h2>
    </div>
<?php } wp_reset_postdata(); ?>