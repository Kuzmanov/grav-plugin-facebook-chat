<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class FacebookChatPlugin extends Plugin
{
	/**
     * Indicate that we want to act on the onPluginsInitialized event
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
        ];
    }
    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        $this->enable([
            'onTwigInitialized'     => ['onTwigInitialized', 0],
        ]);
    }

    public function onTwigInitialized()
    {
        $this->grav['twig']->twig()->addFunction(
            new \Twig_SimpleFunction('facebookChat', [$this, 'displayFacebookChat'])
        );
    }

    public function displayFacebookChat()
    {
        $output = '';

        if( empty( $this->config->get( 'plugins.facebook-chat.facebook_page_id' ) ) )
        {
            return '<em>ERROR: No Facebook Page ID provided.</em>';
        }

        $output = '<div id="fb-root"></div>';
        $output .= "<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>";
        $output .= '<div class="fb-customerchat" attribution=setup_tool page_id="' . $this->config->get( 'plugins.facebook-chat.facebook_page_id' ) . '" theme_color="' . $this->config->get( 'plugins.facebook-chat.theme_color' ) . '" logged_in_greeting="' . $this->config->get( 'plugins.facebook-chat.logged_in_greeting' ) . '" logged_out_greeting=' . $this->config->get( 'plugins.facebook-chat.logged_out_greeting' ) . '" greeting_dialog_delay="' . $this->config->get( 'plugins.facebook-chat.greeting_dialog_delay' ) . '"></div>';

        return $output;
    }
}