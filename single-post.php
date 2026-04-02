<?php get_header(); ?>

<div class="single-news-page">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="single-news-hero">
                <a href="<?php echo esc_url(get_home_url(null, '/actualites')); ?>" class="single-news-back">
                    Retour aux Actualité
                </a>

                <div class="single-news-meta-top">
                    <span class="single-news-badge">Actualite</span>
                    <span class="single-news-date">
                        Publié le <?php echo esc_html(get_the_date()); ?>
                    </span>
                </div>

                <h1 class="single-news-title"><?php the_title(); ?></h1>

                <p class="single-news-author">
                    Rédigé par <?php the_author(); ?>
                </p>
            </div>

            <div class="content-grid">
                <section class="content-main">
                    <article class="single-news-article">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="single-news-thumbnail">
                                <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                            </div>
                        <?php endif; ?>

                        <div class="single-news-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </section>

                <aside class="content-sidebar">
                    <div class="sidebar-box content-stack-item">
                        <h2 class="sidebar-title">Recherche</h2>
                        <?php get_search_form(); ?>
                    </div>

                    <div class="sidebar-box">
                        <h2 class="sidebar-title">Dernières Actualités</h2>
                        <ul class="recent-posts-list">
                            <?php
                            $recent_posts = wp_get_recent_posts([
                                'numberposts' => 5,
                                'post_status' => 'publish',
                                'exclude' => [get_the_ID()],
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
        <?php endwhile; ?>
    <?php else : ?>
        <section class="single-news-empty">
            <h1>Article non trouve</h1>
            <p>Desole, l'article que vous cherchez n'existe pas.</p>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
