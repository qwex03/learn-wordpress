<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container mt-4">
        <h1 class="mb-3"><?php the_title(); ?></h1>
        <div class="mb-4 text-muted">
            Publié le <?php the_date(); ?> par <?php the_author(); ?>
        </div>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; else : ?>
    <div class="container mt-4">
        <h1>Article non trouvé</h1>
        <p>Désolé, l'article que vous cherchez n'existe pas.</p>
    </div>
<?php endif; ?>

<?php get_footer(); ?>