<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use Exception;

abstract class DataObject implements \JsonSerializable
{
    /**
     * Object attributes
     *
     * @var array
     */
    protected $_data = [];

    /**
     * Setter/Getter underscore transformation cache
     *
     * @var array
     */
    protected static $_underscoreCache = [];

    protected array $schema = [];

    protected array $collections = [];

    /**
     * Constructor
     *
     * By default is looking for first argument as array and assigns it as object attributes
     * This behavior may change in child classes
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->_data = $data;
    }

    /**
     * Schema
     * 
     * @return array
     */
    public function getSchema(): array
    {
        return $this->schema;
    }

    /**
     * Collections
     * 
     * @return array
     */
    public function getCollections(): array
    {
        return $this->collections;
    }

    protected function initializeCollection($class, $elements): array
    {
        $collection = [];
        foreach ($elements as $element) {
            if (!$element instanceof $class) {
                $element = new $class($element);
            }
            $collection[] = $element;
        }
        return $collection;
    }

    /**
     * Get value from _data array without parse key
     *
     * @param   string $key
     * @return  mixed
     */
    protected function getData($key)
    {
        if (isset($this->_data[$key])) {
            if (isset($this->collections[$key])) {
                $this->_data[$key] = $this->initializeCollection($this->collections[$key], $this->_data[$key]);
            }
            return $this->_data[$key];
        }
        return null;
    }

    /**
     * Overwrite data in the object.
     *
     * The $key parameter can be string or array.
     * If $key is string, the attribute value will be overwritten by $value
     *
     * If $key is an array, it will overwrite all the data in the object.
     *
     * @param string|array $key
     * @param mixed $value
     * @return $this
     */
    public function setData($key, $value = null)
    {
        if ($key === (array)$key) {
            $this->_data = $key;
        } else {
            if (array_key_exists($key, $this->getSchema())) {
                $expectedType = $this->getSchema()[$key];
                $currentType = gettype($value);
                if ($expectedType == 'numeric' && is_numeric($value)) 
                    $currentType = 'numeric';
                if ($expectedType != $currentType)
                    throw new Exception("Invalid type: $key expects $expectedType, $currentType given.");
            }
            $this->_data[$key] = $value;
        }
        return $this;
    }

    /**
     * Converts field names for setters and getters
     *
     * $this->setMyField($value) === $this->setData('my_field', $value)
     * Uses cache to eliminate unnecessary preg_replace
     *
     * @param string $name
     * @return string
     */
    protected function _underscore($name)
    {
        if (isset(self::$_underscoreCache[$name])) {
            return self::$_underscoreCache[$name];
        }
        $result = strtolower(trim(preg_replace('/([A-Z]|[0-9]+)/', "_$1", $name), '_'));
        self::$_underscoreCache[$name] = $result;
        return $result;
    }

    /**
     * Set/Get attribute wrapper
     *
     * @param string $method
     * @param array $args
     * @return mixed
     * @throws Exception
     */
    public function __call($method, $args)
    {
        switch (substr((string)$method, 0, 3)) {
            case 'get':
                $key = $this->_underscore(substr($method, 3));
                $index = isset($args[0]) ? $args[0] : null;
                return $this->getData($key, $index);
            case 'set':
                $key = $this->_underscore(substr($method, 3));
                $value = isset($args[0]) ? $args[0] : null;
                return $this->setData($key, $value);
        }
        $className = get_class($this);
        $message = "Invalid method $className::$method";
        throw new Exception($message);
    }

    public static function fromJson(array $data): self
    {
        return new self($data);
    }

    public function jsonSerialize(): mixed
    {
        return $this->_data;
    }
}
