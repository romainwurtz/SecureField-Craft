<?php
namespace Craft;

/**
 * Secure Field
 *
 * @author    Romain Wurtz
 * @link      http://www.t3kila.com
 */

/**
 * Secure Field type class
 */
class SecureField_SecureFieldType extends BaseFieldType
{

    /**
     * Returns the name of the plugin
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('Secure Field');
    }

    /**
     * Returns the field's input HTML.
     *
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        return craft()->templates->render('securefield/_fieldtypes/field', array(
                                                                                'value' => $value,
                                                                                'name' => $name,
                                                                           ));
    }

    /**
     * Returns the input value as it should be saved to the database.
     * Encryption using YII security manager
     *
     * @param mixed $value
     * @return mixed
     */
    public function prepValueFromPost($value)
    {
        $key = craft()->secureField_settings->getSetting('secureFieldKey');
        return $value ? base64_encode(craft()->getSecurityManager()->encrypt($value, (($key) ? $key : null))): "";
    }

    /**
     * Preps the field value for use.
     * Encryption using YII security manager
     *
     * @param mixed $value
     * @return mixed
     */
    public function prepValue($value)
    {
        $key = craft()->secureField_settings->getSetting('secureFieldKey');
        return $value ? craft()->getSecurityManager()->decrypt(base64_decode($value), (($key) ? $key : null)) : "";
    }
}
