    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="site-footer-top footer-grid">
                <div class="footer-column">
                    <h2 class="site-footer-title">Pages</h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '<ul class="list-unstyled">%3$s</ul>',
                        'depth'          => 1,
                        'fallback_cb'    => false
                    ));
                    ?>
                </div>
                <div class="footer-column">
                    <h2 class="site-footer-title">Pages</h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '<ul class="list-unstyled">%3$s</ul>',
                        'depth'          => 1,
                        'fallback_cb'    => false
                    ));
                    ?>
                </div>
                <div class="footer-column">
                    <h2 class="site-footer-title">Pages</h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '<ul class="list-unstyled">%3$s</ul>',
                        'depth'          => 1,
                        'fallback_cb'    => false
                    ));
                    ?>
                </div>
                <div class="footer-column">
                    <h2 class="site-footer-title">Pages</h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '<ul class="list-unstyled">%3$s</ul>',
                        'depth'          => 1,
                        'fallback_cb'    => false
                    ));
                    ?>
                </div>
            </div>

            <div class="site-footer-bottom">
                <p class="site-footer-copy">
                    <?php echo esc_html(get_bloginfo('name')); ?> - <?php echo esc_html(date_i18n('Y')); ?> Quentin Lecordier
                </p>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>
