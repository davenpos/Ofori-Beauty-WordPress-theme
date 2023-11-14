        </div>
        <footer>
            <div id="threeColumns">
                <?php wp_nav_menu(array('theme_location' => 'resourcesMenu'));
                wp_nav_menu(array('theme_location' => 'policiesMenu'));
                ?>
                <a href="<?php echo esc_url(site_url('/')); ?>">
                    <img src="<?php echo get_theme_file_uri('/images/logo.png'); ?>" alt="Ofori Beauty logo" height="100">
                </a>
            </div>
            <p id="smallFooterText">&copy; 2023 Ofori Beauty<br>WordPress site created by Simeon Davenport</p>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>