<form action="<?= get_home_url(); ?>/" method="get" class="search-form">
    <input class="search-form__input" type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="<?= translate('Search', 'bulpix'); ?>" />
    <input type="hidden" value="post" name="post_type" id="post_type" />
    <button class="search-form__btn" type="submit"><img class="search-form__btn-img" src="<?= get_template_directory_uri(); ?>/images/search.png"" alt=""></button>
</form>