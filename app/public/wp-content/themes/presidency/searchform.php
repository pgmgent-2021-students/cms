<form action="<?php echo esc_url(site_url('/')) ?>" method="get">
    <input type="search" name="s" value="<?php the_search_query() ?>">
    <button>Zoeken!</button>
</form>