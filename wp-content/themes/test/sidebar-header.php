<?php if (!is_page() && is_active_sidebar('sidebar-top')): ?>
    <div  class="header-bottom">
                <span>
                    <?php dynamic_sidebar('sidebar-top'); ?>
                </span>
    </div>
<?php endif; ?>