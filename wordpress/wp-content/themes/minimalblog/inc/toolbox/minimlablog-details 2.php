<?php
function minimalblog_helper_bar() {
        ?>
        <div class="minimalblog-admin-notice notice is-dismissible">
            <a href="?minimalblog_notice_dismiss" target="_self" class="minimalblog-notice-dismiss"><span class="screen-reader-text">Dissmiss</span></a>
            
            <p style="font-size:16px; font-weight: 600;"><?php echo wp_kses_post('Thank you for choosing minimalblog WordPress theme for your website.');?>
                <a href="<?php echo esc_url('https://theimran.com/themes/uncategorized/minimalblog-wordpress-theme-free/');?>" style="background-color: #f16334; border-color: #f16334" class="button button-primary"><?php esc_html_e('View Details', 'minimalblog');?></a>
                <a href="<?php echo esc_url('https://theimran.com/minimal-blog-video-documentation/');?>" style="background-color: #f16334; border-color: #f16334" class="button button-primary"><?php esc_html_e('Documentation', 'minimalblog');?></a>
                <a href="<?php echo esc_url('https://theimran.com/themes/uncategorized/minimalblog-wordpress-theme-free/#freevspro');?>" style="background-color: #f16334; border-color: #f16334" class="button button-primary"><?php esc_html_e('Free VS PRO', 'minimalblog');?></a>
            </p>
        </div>
        <?php
}
add_action('admin_notices', 'minimalblog_helper_bar');
