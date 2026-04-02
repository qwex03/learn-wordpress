<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="visually-hidden" for="theme-search-field">Rechercher</label>
    <input
        type="search"
        id="theme-search-field"
        class="search-field"
        placeholder="Rechercher un article..."
        value="<?php echo get_search_query(); ?>"
        name="s"
    >
    <button type="submit" class="search-submit">Rechercher</button>
</form>
