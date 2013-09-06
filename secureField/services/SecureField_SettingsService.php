<?php
namespace Craft;

/**
 * Secure Field
 *
 * @author    Romain Wurtz
 * @link      http://www.t3kila.com
 */

/**
 * Secure Field settings manager
 */
class SecureField_SettingsService extends BaseApplicationComponent {

    private $settings = null;

    function __construct() {
        $this->_init_settings();
    }

    /**
     * Init settings
     */
    public function _init_settings() {
		$plugin = craft()->plugins->getPlugin('secureField');
        $this->settings = $plugin->getSettings();
	}

    /**
     * Get a specific setting
     *
     * @param $name
     * @return mixed
     */
    public function getSetting($name) {
        return $this->settings[$name];
	}
}