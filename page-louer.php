<?php get_header(); ?>

<div class="container news-page">
    <div class="news-page-header">
        <h1 class="news-page-title">Louer un bien</h1>
        <p class="news-page-intro">
            Découvrez nos biens disponibles à la location. Que vous cherchiez un appartement, une maison ou un local commercial, nous avons des options pour répondre à vos besoins.
        </p>
    </div>

    <?php
    $biens = new WP_Query([
        'post_type' => 'bien',
        'posts_per_page' => -1,
    ]);

    if ($biens->have_posts()) : ?>
        <div class="biens-list">
            <?php while ($biens->have_posts()) : $biens->the_post(); ?>
                <?php
                $prix = get_post_meta(get_the_ID(), 'prix', true);
                ?>
                <article class="bien-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="bien-image">
                            <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
                        </a>
                    <?php endif; ?>

                    <div class="bien-card-body">
                        <p class="bien-date"><?php echo esc_html(get_the_date()); ?></p>

                        <div class="bien-bottom-row">
                            <h2 class="bien-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <?php if ($prix !== '') : ?>
                                <span class="bien-price"><?php echo esc_html(number_format((float) $prix, 0, ',', ' ')); ?> €</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Aucun bien disponible pour le moment.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
