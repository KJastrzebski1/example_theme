

<footer class="site-footer">
    <div class="row">

        <div class="logo col-sm-6">
            <span><?php echo ucwords(strtolower(get_bloginfo('name'))); ?> - &copy; <?php echo date('Y'); ?></span>
        </div>
        <nav class="site-nav col-sm-6">
            <div id="bottom">
                <?php $args = ['theme_location' => 'footer']; ?>
                <?php echo wp_nav_menu($args); ?>
            </div>
        </nav>
    </div>
</footer>
<?php // all js scripts are loaded in library/bones.php ?>
<?php wp_footer(); ?>
</div> <!-- container -->
</body>

</html> <!-- end of site. what a ride! -->
