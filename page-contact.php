<?php get_header(); ?>

<div class="container news-page">
    <div class="news-page-header">
        <h1 class="news-page-title">Contact</h1>
        <p class="news-page-intro">Contactez-nous pour plus d'informations</p>
    </div>

    <form>
        <input type="text"  placeholder="Votre prénom" required>
        <input type="text"  placeholder="Votre nom" required>
        <input type="email"  placeholder="Votre email" required>
        <textarea  placeholder="Votre message" rows="5" required></textarea>
        <button type="submit">Envoyer</button>
    </form>


</div>

<?php get_footer(); ?>