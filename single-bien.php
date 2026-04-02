<?php get_header(); ?>

<div class="single-bien-page">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $prix = get_post_meta(get_the_ID(), 'prix', true);
            $surface = get_post_meta(get_the_ID(), 'surface', true);
            $nombre_pieces = get_post_meta(get_the_ID(), 'nombre_pieces', true);
            $localisation = get_post_meta(get_the_ID(), 'localisation', true);
            ?>

            <div class="single-bien-hero">
                <a href="<?php echo esc_url(get_home_url(null, '/louer')); ?>" class="single-bien-back">
                    Retour aux biens
                </a>

                <div class="single-bien-meta-top">
                    <span class="single-bien-date"><?php echo esc_html(get_the_date()); ?></span>
                    <?php if ($prix !== '') : ?>
                        <span class="single-bien-price"><?php echo esc_html(number_format((float) $prix, 0, ',', ' ')); ?> €</span>
                    <?php endif; ?>
                </div>

                <h1 class="single-bien-title"><?php the_title(); ?></h1>

                <div class="single-bien-infos">
                    <?php if ($localisation !== '') : ?>
                        <span class="single-bien-info"><?php echo esc_html($localisation); ?></span>
                    <?php endif; ?>
                    <?php if ($surface !== '') : ?>
                        <span class="single-bien-info"><?php echo esc_html($surface); ?> m²</span>
                    <?php endif; ?>
                    <?php if ($nombre_pieces !== '') : ?>
                        <span class="single-bien-info"><?php echo esc_html($nombre_pieces); ?> pièce<?php echo ((int) $nombre_pieces > 1) ? 's' : ''; ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <article class="single-bien-article">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-bien-thumbnail">
                        <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                    </div>
                <?php endif; ?>

                <div class="single-bien-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <section class="single-bien-empty">
            <h1>Bien non trouvé</h1>
            <p>Le bien demandé n'est pas disponible.</p>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
