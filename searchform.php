<div id="searchform">
    <form role="search" method="get" id="search" action="<?php echo home_url('/'); ?>">
        <div>
            <input type="text" value="<?php the_search_query(); ?>" placeholder="What are you looking for?" name="s" id="s" /><br>
            <input type="submit" id="searchsubmit" value="Search" />
        </div>
    </form>
</div>