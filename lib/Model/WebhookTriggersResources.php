<?php
/**
 * WebhookTriggersResources
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
 * WebhookTriggersResources Class Doc Comment
 *
 * @category Class
 * @package  ExaVault
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class WebhookTriggersResources implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'WebhookTriggers_resources';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'upload' => 'bool',
'download' => 'bool',
'delete' => 'bool',
'rename' => 'bool',
'copy' => 'bool',
'move' => 'bool',
'compress' => 'bool',
'extract' => 'bool',
'createFolder' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'upload' => null,
'download' => null,
'delete' => null,
'rename' => null,
'copy' => null,
'move' => null,
'compress' => null,
'extract' => null,
'createFolder' => null    ];

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
        'upload' => 'upload',
'download' => 'download',
'delete' => 'delete',
'rename' => 'rename',
'copy' => 'copy',
'move' => 'move',
'compress' => 'compress',
'extract' => 'extract',
'createFolder' => 'createFolder'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'upload' => 'setUpload',
'download' => 'setDownload',
'delete' => 'setDelete',
'rename' => 'setRename',
'copy' => 'setCopy',
'move' => 'setMove',
'compress' => 'setCompress',
'extract' => 'setExtract',
'createFolder' => 'setCreateFolder'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'upload' => 'getUpload',
'download' => 'getDownload',
'delete' => 'getDelete',
'rename' => 'getRename',
'copy' => 'getCopy',
'move' => 'getMove',
'compress' => 'getCompress',
'extract' => 'getExtract',
'createFolder' => 'getCreateFolder'    ];

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
        $this->container['upload'] = isset($data['upload']) ? $data['upload'] : null;
        $this->container['download'] = isset($data['download']) ? $data['download'] : null;
        $this->container['delete'] = isset($data['delete']) ? $data['delete'] : null;
        $this->container['rename'] = isset($data['rename']) ? $data['rename'] : null;
        $this->container['copy'] = isset($data['copy']) ? $data['copy'] : null;
        $this->container['move'] = isset($data['move']) ? $data['move'] : null;
        $this->container['compress'] = isset($data['compress']) ? $data['compress'] : null;
        $this->container['extract'] = isset($data['extract']) ? $data['extract'] : null;
        $this->container['createFolder'] = isset($data['createFolder']) ? $data['createFolder'] : null;
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
     * Gets upload
     *
     * @return bool
     */
    public function getUpload()
    {
        return $this->container['upload'];
    }

    /**
     * Sets upload
     *
     * @param bool $upload Send webhook messages when resources are uploaded.
     *
     * @return $this
     */
    public function setUpload($upload)
    {
        $this->container['upload'] = $upload;

        return $this;
    }

    /**
     * Gets download
     *
     * @return bool
     */
    public function getDownload()
    {
        return $this->container['download'];
    }

    /**
     * Sets download
     *
     * @param bool $download Send webhook messages when resources are downloaded.
     *
     * @return $this
     */
    public function setDownload($download)
    {
        $this->container['download'] = $download;

        return $this;
    }

    /**
     * Gets delete
     *
     * @return bool
     */
    public function getDelete()
    {
        return $this->container['delete'];
    }

    /**
     * Sets delete
     *
     * @param bool $delete Send webhook messages when resources are deleted
     *
     * @return $this
     */
    public function setDelete($delete)
    {
        $this->container['delete'] = $delete;

        return $this;
    }

    /**
     * Gets rename
     *
     * @return bool
     */
    public function getRename()
    {
        return $this->container['rename'];
    }

    /**
     * Sets rename
     *
     * @param bool $rename Send webhook messages when resources are renamed.
     *
     * @return $this
     */
    public function setRename($rename)
    {
        $this->container['rename'] = $rename;

        return $this;
    }

    /**
     * Gets copy
     *
     * @return bool
     */
    public function getCopy()
    {
        return $this->container['copy'];
    }

    /**
     * Sets copy
     *
     * @param bool $copy Send webhook messages when resources are copied.
     *
     * @return $this
     */
    public function setCopy($copy)
    {
        $this->container['copy'] = $copy;

        return $this;
    }

    /**
     * Gets move
     *
     * @return bool
     */
    public function getMove()
    {
        return $this->container['move'];
    }

    /**
     * Sets move
     *
     * @param bool $move Send webhook messages when resources are moved.
     *
     * @return $this
     */
    public function setMove($move)
    {
        $this->container['move'] = $move;

        return $this;
    }

    /**
     * Gets compress
     *
     * @return bool
     */
    public function getCompress()
    {
        return $this->container['compress'];
    }

    /**
     * Sets compress
     *
     * @param bool $compress Send webhook messages when resources are compressed into an archive.
     *
     * @return $this
     */
    public function setCompress($compress)
    {
        $this->container['compress'] = $compress;

        return $this;
    }

    /**
     * Gets extract
     *
     * @return bool
     */
    public function getExtract()
    {
        return $this->container['extract'];
    }

    /**
     * Sets extract
     *
     * @param bool $extract Send webhook messages when resources are extracted from an archive.
     *
     * @return $this
     */
    public function setExtract($extract)
    {
        $this->container['extract'] = $extract;

        return $this;
    }

    /**
     * Gets createFolder
     *
     * @return bool
     */
    public function getCreateFolder()
    {
        return $this->container['createFolder'];
    }

    /**
     * Sets createFolder
     *
     * @param bool $createFolder Send webhook messages when a new folder is created.
     *
     * @return $this
     */
    public function setCreateFolder($createFolder)
    {
        $this->container['createFolder'] = $createFolder;

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
