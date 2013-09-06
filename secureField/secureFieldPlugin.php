<?php

namespace Craft;

class SecureFieldPlugin extends BasePlugin
{
    /**
     * Name of plugin
     *
     * @return null|string
     */
    public function getName()
    {
        return Craft::t('Secure Field');
    }

    /**
     * Version of plugin
     *
     * @return string
     */
    public function getVersion()
    {
        return '0.1';
    }

    /**
     * Developer
     * (alias me ;) )
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Romain Wurtz';
    }

    /**
     * Plugin Url
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://www.t3kila.com';
    }

    /**
     * CP setting
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * Defines the settings.
     *
     * @access protected
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'secureFieldKey' => array(AttributeType::String, 'default' => ''),
        );
    }

    /**
     * Returns the component's settings HTML.
     *
     * @return string|null
     */
    public function getSettingsHtml()
    {
        $config_settings = array();
        $config_settings['secureFieldKey'] = craft()->secureField_settings->getSetting('secureFieldKey');

        return craft()->templates->render('secureField/settings', array(
                                                                       'settings' => $this->getSettings(),
                                                                       'config_settings' => $config_settings
                                                                  ));
    }

}
