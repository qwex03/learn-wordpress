<?php get_header(); ?>

<div class="container news-page">
    <div class="news-page-header">
        <span class="news-page-kicker">Recherche</span>
        <h1 class="news-page-title">
            Resultats pour "<?php echo esc_html(get_search_query()); ?>"
        </h1>
        <p class="news-page-intro">
            <?php echo esc_html($wp_query->found_posts); ?> resultat(s) trouve(s).
        </p>
    </div>

    <div class="content-grid">
        <section class="content-main">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="content-stack-item">
                        <article class="custom-article">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="custom-article-image">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="custom-article-content">
                                <h2 class="custom-article-title"><?php the_title(); ?></h2>
                                <p class="custom-article-date">
                                    Publie le <?php echo get_the_date(); ?>
                                </p>
                                <p class="custom-article-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="custom-article-link text-orange">Lire plus</a>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="empty-state-card">
                    <h2>Aucun resultat</h2>
                    <p>Aucun article ne correspond a votre recherche. Essayez avec un autre mot-cle.</p>
                </div>
            <?php endif; ?>
        </section>

        <aside class="content-sidebar">
            <div class="sidebar-box content-stack-item">
                <h2 class="sidebar-title">Nouvelle recherche</h2>
                <?php get_search_form(); ?>
            </div>

            <div class="sidebar-box">
                <h2 class="sidebar-title">Dernieres actualites</h2>
                <ul class="recent-posts-list">
                    <?php
                    $recent_posts = wp_get_recent_posts([
                        'numberposts' => 5,
                        'post_status' => 'publish',
                    ]);
                    ?>

                    <?php foreach ($recent_posts as $recent_post) : ?>
                        <li>
                            <a href="<?php echo esc_url(get_permalink($recent_post['ID'])); ?>">
                                <?php echo esc_html($recent_post['post_title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
