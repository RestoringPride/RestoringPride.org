<section role="search" class="site-search">
    <div class="site-search__content">
        <button aria-label="Close search box" class="site-search__close-button closeSearch"><i class="far fa-times-circle"></i></button>
        <form method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label for="s"><?php _e( 'Search for anything:', 'presentation' ); ?></label>
            <div class="site-search__inputs">
                <input required autofocus type="search" placeholder="<?php echo esc_attr( 'Type some words', 'presentation' ); ?>" name="s" id="s" value="<?php echo esc_attr( get_search_query() ); ?>" style="margin-bottom:0" />
                <input type="submit" id="search-submit" value="Search" />
            </div>
        </form>
    </div>
</section>