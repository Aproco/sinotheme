<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label for="s" class="screen-reader-text"><?php _e('Search for:','html5reset'); ?></label>
        <input type="search" id="s" name="s" value="" placeholder="<?php the_field('translation_searchterm', 'option'); ?>" />
        
        <input type="submit" value="<?php the_field('translation_search', 'option'); ?>" id="searchsubmit" />
    </div>
</form>