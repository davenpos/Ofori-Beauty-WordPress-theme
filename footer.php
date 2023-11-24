        </div>
        <footer>
            <div class="threeColumns">
                <div>
                    <?php if (count(wp_get_nav_menu_items('Resources'))): ?>
                        <h2>Resources</h2>
                        <?php wp_nav_menu(array('theme_location' => 'resourcesMenu'));
                    endif; ?>
                </div>
                <div>
                    <?php if (count(wp_get_nav_menu_items('Policies'))): ?>
                        <h2>Policies</h2>
                        <?php wp_nav_menu(array('theme_location' => 'policiesMenu'));
                    endif; ?>
                </div>
                <a class="logoFooter" href="<?php echo esc_url(site_url('/')); ?>">
                    <img class="siteLogo" src="<?php echo get_theme_file_uri('/images/logo.png'); ?>" alt="Ofori Beauty logo" height="100">
                </a>
            </div>
            <div id="socials">
                <a href="https://www.instagram.com/oforibeautyy/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
            </div>
            <p id="smallFooterText">&copy; <?php echo date("Y"); ?> Ofori Beauty<br>WordPress site created by Simeon Davenport</p>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>