<?php
/**
 * FormAttributes
 *
 * PHP version 5
 *
 * @category Class
 * @package  ExaVault
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * ExaVault API
 *
 * See our API reference documentation at https://www.exavault.com/developer/api-docs/
 *
 * OpenAPI spec version: 2.0
 * Contact: support@exavault.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.22
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace ExaVault\Model;

use \ArrayAccess;
use \ExaVault\ObjectSerializer;

/**
 * FormAttributes Class Doc Comment
 *
 * @category Class
 * @description Attributes of the form including it&#x27;s included fields and css styles
 * @package  ExaVault
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FormAttributes implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'FormAttributes';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'formDescription' => 'string',
'submitButtonText' => 'string',
'successMessage' => 'string',
'cssStyles' => 'string',
'elements' => '\ExaVault\Model\FormField[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'formDescription' => null,
'submitButtonText' => null,
'successMessage' => null,
'cssStyles' => null,
'elements' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'formDescription' => 'formDescription',
'submitButtonText' => 'submitButtonText',
'successMessage' => 'successMessage',
'cssStyles' => 'cssStyles',
'elements' => 'elements'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'formDescription' => 'setFormDescription',
'submitButtonText' => 'setSubmitButtonText',
'successMessage' => 'setSuccessMessage',
'cssStyles' => 'setCssStyles',
'elements' => 'setElements'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'formDescription' => 'getFormDescription',
'submitButtonText' => 'getSubmitButtonText',
'successMessage' => 'getSuccessMessage',
'cssStyles' => 'getCssStyles',
'elements' => 'getElements'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['formDescription'] = isset($data['formDescription']) ? $data['formDescription'] : null;
        $this->container['submitButtonText'] = isset($data['submitButtonText']) ? $data['submitButtonText'] : null;
        $this->container['successMessage'] = isset($data['successMessage']) ? $data['successMessage'] : null;
        $this->container['cssStyles'] = isset($data['cssStyles']) ? $data['cssStyles'] : null;
        $this->container['elements'] = isset($data['elements']) ? $data['elements'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets formDescription
     *
     * @return string
     */
    public function getFormDescription()
    {
        return $this->container['formDescription'];
    }

    /**
     * Sets formDescription
     *
     * @param string $formDescription Text that appears at the top of a receive form
     *
     * @return $this
     */
    public function setFormDescription($formDescription)
    {
        $this->container['formDescription'] = $formDescription;

        return $this;
    }

    /**
     * Gets submitButtonText
     *
     * @return string
     */
    public function getSubmitButtonText()
    {
        return $this->container['submitButtonText'];
    }

    /**
     * Sets submitButtonText
     *
     * @param string $submitButtonText Text that appears on the submit button for the form
     *
     * @return $this
     */
    public function setSubmitButtonText($submitButtonText)
    {
        $this->container['submitButtonText'] = $submitButtonText;

        return $this;
    }

    /**
     * Gets successMessage
     *
     * @return string
     */
    public function getSuccessMessage()
    {
        return $this->container['successMessage'];
    }

    /**
     * Sets successMessage
     *
     * @param string $successMessage Message displayed to submitter after files are uploaded
     *
     * @return $this
     */
    public function setSuccessMessage($successMessage)
    {
        $this->container['successMessage'] = $successMessage;

        return $this;
    }

    /**
     * Gets cssStyles
     *
     * @return string
     */
    public function getCssStyles()
    {
        return $this->container['cssStyles'];
    }

    /**
     * Sets cssStyles
     *
     * @param string $cssStyles CSS Styles of the form.
     *
     * @return $this
     */
    public function setCssStyles($cssStyles)
    {
        $this->container['cssStyles'] = $cssStyles;

        return $this;
    }

    /**
     * Gets elements
     *
     * @return \ExaVault\Model\FormField[]
     */
    public function getElements()
    {
        return $this->container['elements'];
    }

    /**
     * Sets elements
     *
     * @param \ExaVault\Model\FormField[] $elements Array of form fields defined for the form
     *
     * @return $this
     */
    public function setElements($elements)
    {
        $this->container['elements'] = $elements;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}