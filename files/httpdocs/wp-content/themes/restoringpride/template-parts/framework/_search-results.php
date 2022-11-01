<li class="search-results__item">
    <a class="search-results__link" href="<?php the_permalink(); ?>">
        <h2 
        class="search-results__title"
        <?php if(!get_the_excerpt()): ?>style="margin-bottom:0"<?php endif; ?>
        >
        <?php the_title(); ?>
        </h2>
        <div class="search-results__excerpt"><?php the_excerpt(); ?></div>
    </a>
</li>