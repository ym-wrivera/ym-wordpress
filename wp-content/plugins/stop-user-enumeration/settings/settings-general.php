<?php
add_filter( 'wpsf_register_settings_sue_settings', 'sue_settings' );

function sue_settings( $wpsf_settings ) {
    // General Settings section
    $wpsf_settings[] = array(
        'section_id' => 'general',
        'section_title' => '',
        'section_description' => 'These settings let you control the functionality of the plugin. Keeping this plugin up to date takes time and effort,<br> if you appreciate this effort please consider a donation, <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4EMTVFMKXRRYY"><strong>by clicking here (even 50 cents is appreciated and can help keep this plugin current)</strong></a>',
        'section_order' => 5,
        'fields' => array(

            array(
                'id' => 'stop_rest_user',
                'title' => 'Stop REST API User calls',
                'desc' => 'WordPress allows anyone to find users by API call, by checking this box the calls will be restricted to logged in users only<br>
                only untick this box if you need to allow unfettered API access to users',
                'type' => 'checkbox',
                'default' => 1
            ),
            array(
                'id' => 'log_auth',
                'title' => 'log attempts to AUTH LOG',
                'desc' => 'Leave this ticked if you are using <a href="http://www.fail2ban.org/wiki/index.php/Main_Page" target="_blank">Fail2Ban</a> on
                  your VPS to block attempts at enumeration.<br> If you are not running Fail2Ban or on a shared host this does not need to be ticked, however it normally will not cause a problem being ticked.',
                'type' => 'checkbox',
                'default' => 1
            ),
            array(
                'id' => 'comment_jquery',
                'title' => 'Remove numbers from comment authors',
                'desc' => 'This plugin uses jQuery to remove any numbers from a comment author name, this is because numbers trigger enumeration checking.
                You can untick this if you do not use comments on your site or you use a different comment method than standard',
                'type' => 'checkbox',
                'default' => 1
            ),

        )
    );

    return $wpsf_settings;
}
