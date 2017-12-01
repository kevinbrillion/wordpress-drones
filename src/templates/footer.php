        <footer>
            <a href="<?php  $url = home_url(); echo esc_url( $url ); ?>" class="footer__img"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" class="logoImg"></a>
            <div class="footerContainer">
                <div class="social">
                    <div class="margin__social">
                        <a href="https://www.flaticon.com/free-icon/facebook-logo-button_69407#term=facebook&page=1&position=2"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" alt=""></a>
                        <a href="https://www.flaticon.com/free-icon/twitter-logo-button_69480#term=twitter&page=1&position=2"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png" alt=""></a>
                        <a href="https://www.flaticon.com/free-icon/instagram-logo_69366#term=instagram&page=1&position=3"><img src="<?php bloginfo('template_directory'); ?>/img/instagram.png" alt=""></a>
                        <a href="https://www.flaticon.com/free-icon/youtube-logotype_49399#term=Youtube&page=1&position=6"><img src="<?php bloginfo('template_directory'); ?>/img/youtube.png" alt=""></a>
                    </div>
                </div>
                <div class="newsletter">
                    <div class="margin__newsletter">
                        <span>Ne ratez plus nos actualités</span>
                        <form action="" method="post" class="subscribe-form">
                            <input type="email" name="email" class="subscribe-input" placeholder="Abonnez-vous à la newsletter !">
                            <button type="submit" class="subscribe-submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
