<?php if ( get_option('ajax_login_register_facebook') ) : ?>
    <!-- Start: Ajax Login Register Facebook meta tags -->
    <?php
    $a = New Login;
    $fb = $a->get_settings();
    foreach( $fb['facebook'] as $setting ) :

        if ( $setting['key'] == 'admins' || $setting['key'] == 'app_id' ) {
            $key = 'fb';
        } else {
            $key = 'og';
        }

        $value = get_option( $setting['key'] );

        ?>
        <?php if ( ! empty( $value ) ) : ?>
            <meta property="<?php echo $key; ?>:<?php echo $value; ?>" content="<?php print $value; ?>" />
        <?php endif; ?>
    <?php endforeach; ?>
    <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
    <!-- End: Ajax Login Register Facebook meta tags -->
<?php endif; ?>

<?php if ( get_option('ajax_login_register_facebook') ) : ?>
    <?php $app_id = $setting['key'] == 'app_id' ? get_option( $setting['key'] ) : null; ?>
    <!-- Start: Ajax Login Register Facebook script -->
    <script type="text/javascript">
        window.fbAsyncInit = function() {
            FB.init({
                appId      : <?php print $app_id; ?>, // App ID
                channelUrl : '//'+location.origin+'/channel.html', // Channel File
                status     : true, // check login status
                cookie     : true, // enable cookies to allow the server to access the session
                xfbml      : true  // parse XFBML
            });
        };
        (function(d){
            var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement('script'); js.id = id; js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        }(document));
    </script>
    <!-- End: Ajax Login Register Facebook script -->
<?php endif; ?>

<?php $styling = get_option('ajax_login_register_additional_styling');
if ( $styling ) : ?>
<!-- Start: Ajax Login Register Additional Styling -->
<style type="text/css">
    <?php echo wp_kses_stripslashes( $styling ); ?>
</style>
<!-- End: Ajax Login Register Additional Styling -->
<?php endif; ?>