<?php

namespace Give\Framework\Models;

use Give\Framework\Exceptions\Primitives\InvalidArgumentException;
use Give\Framework\Models\ValueObjects\Relationship;
use Give\Framework\Support\Contracts\Arrayable;
use RuntimeException;

/**
 * @since 2.19.6
 */
abstract class Model implements Arrayable
{
<<<<<<< HEAD
=======

>>>>>>> fb785cbb (Initial commit)
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The model attribute's original state.
     *
     * @var array
     */
    protected $original = [];

    /**
     * The model properties assigned to their types
     *
     * @var array
     */
    protected $properties = [];

    /**
     * The model relationships assigned to their relationship types
     *
     * @var array
     */
    protected $relationships = [];

    /**
     * Relationships that have already been loaded and don't need to be loaded again.
     *
     * @var Model[]
     */
    private $cachedRelations = [];

    /**
     * Create a new model instance.
     *
<<<<<<< HEAD
     * @since      2.19.6
     * @since      2.20.0 add support for property defaults
     * @since 2.23.1 Make constructor final to avoid unsafe usage of `new static()`.
=======
     * @since 2.20.0 add support for property defaults
     * @since 2.19.6
>>>>>>> fb785cbb (Initial commit)
     *
     * @param array $attributes
     *
     * @return void
     */
<<<<<<< HEAD
    final public function __construct(array $attributes = [])
=======
    public function __construct(array $attributes = [])
>>>>>>> fb785cbb (Initial commit)
    {
        $this->fill(array_merge($this->getPropertyDefaults(), $attributes));

        $this->syncOriginal();
    }

    /**
     * Sync the original attributes with the current.
     *
     * @since 2.19.6
     *
     * @return $this
     */
    protected function syncOriginal()
    {
        $this->original = $this->attributes;

        return $this;
    }

    /**
     * Get the model's original attribute values.
     *
     * @since 2.19.6
     *
     * @param string|null $key
     *
     * @return mixed|array
     */
    public function getOriginal($key = null)
    {
        return $key ? $this->original[$key] : $this->original;
    }

    /**
     * Determine if a given attribute is dirty.
     *
     * @since 2.19.6
     *
     * @param string|null $attribute
     *
     * @return bool
     */
    public function isDirty($attribute = null)
    {
<<<<<<< HEAD
        if ( ! $attribute) {
=======
        if (!$attribute) {
>>>>>>> fb785cbb (Initial commit)
            return (bool)$this->getDirty();
        }

        return array_key_exists($attribute, $this->getDirty());
    }

    /**
     * Determine if a given attribute is clean.
     *
     * @since 2.19.6
     *
     * @param string|null $attribute
     *
     * @return bool
     */
    public function isClean($attribute = null)
    {
<<<<<<< HEAD
        return ! $this->isDirty($attribute);
=======
        return !$this->isDirty($attribute);
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Get the attributes that have been changed since last sync.
     *
     * @since 2.19.6
     *
     * @return array
     */
    public function getDirty()
    {
        $dirty = [];

        foreach ($this->attributes as $key => $value) {
<<<<<<< HEAD
            if ( ! array_key_exists($key, $this->original) || $value !== $this->original[$key]) {
=======
            if (!array_key_exists($key, $this->original) || $value !== $this->original[$key]) {
>>>>>>> fb785cbb (Initial commit)
                $dirty[$key] = $value;
            }
        }

        return $dirty;
    }

    /**
     * Fill the model with an array of attributes.
     *
     * @since 2.19.6
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * Get an attribute from the model.
     *
<<<<<<< HEAD
     * @since 2.23.0 use the existence validation method
     * @since 2.19.6
     *
=======
     * @since 2.19.6
     *
     * @param string $key
     *
>>>>>>> fb785cbb (Initial commit)
     * @return mixed
     *
     * @throws RuntimeException
     */
<<<<<<< HEAD
    public function getAttribute(string $key)
    {
        $this->validatePropertyExists($key);
=======
    public function getAttribute($key)
    {
        if (!array_key_exists($key, $this->properties)) {
            throw new InvalidArgumentException("$key is not a valid property.");
        }
>>>>>>> fb785cbb (Initial commit)

        return $this->attributes[$key] ?? null;
    }

    /**
     * Set a given attribute on the model.
     *
<<<<<<< HEAD
     * @since 2.23.0 validate that the property exists before setting
     * @since 2.19.6
     *
     * @param string $key
     * @param mixed  $value
     * @return void
     */
    public function setAttribute(string $key, $value)
    {
        $this->validatePropertyExists($key);
        $this->validatePropertyType($key, $value);

        $this->attributes[$key] = $value;
    }

    public function hasProperty($key): bool
    {
        return array_key_exists($key, $this->properties);
=======
     * @since 2.19.6
     *
     * @param string $key
     * @param mixed $value
     */
    public function setAttribute($key, $value)
    {
        $this->validatePropertyType($key, $value);

        $this->attributes[$key] = $value;

        return $this;
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Validate an attribute to a PHP type.
     *
     * @since 2.19.6
     *
     * @param string $key
<<<<<<< HEAD
     * @param mixed  $value
=======
     * @param mixed $value
>>>>>>> fb785cbb (Initial commit)
     *
     * @return bool
     */
    public function isPropertyTypeValid($key, $value)
    {
        if (is_null($value)) {
            return true;
        }

        $type = $this->getPropertyType($key);

        switch ($type) {
            case 'int':
                return is_int($value);
            case 'string':
                return is_string($value);
            case 'bool':
                return is_bool($value);
            case 'array':
                return is_array($value);
            default:
                return $value instanceof $type;
        }
    }

    /**
<<<<<<< HEAD
     * Validates that the given value is a valid type for the given property.
     *
     * @since 2.19.6
     *
     * @param string $key
     * @param mixed  $value
=======
     * Validate property type
     *
     * @param string $key
     * @param mixed $value
     *
>>>>>>> fb785cbb (Initial commit)
     * @return void
     *
     * @throws InvalidArgumentException
     */
<<<<<<< HEAD
    protected function validatePropertyType(string $key, $value)
    {
        if ( ! $this->isPropertyTypeValid($key, $value)) {
=======
    protected function validatePropertyType($key, $value)
    {
        if (!$this->isPropertyTypeValid($key, $value)) {
>>>>>>> fb785cbb (Initial commit)
            $type = $this->getPropertyType($key);

            throw new InvalidArgumentException("Invalid attribute assignment. '$key' should be of type: '$type'");
        }
    }

    /**
<<<<<<< HEAD
     * Validates that the given property exists
     *
     * @since 2.23.0
     *
     * @return void
     * @throws InvalidArgumentException
     */
    protected function validatePropertyExists(string $key)
    {
        if ( !$this->hasProperty($key) ) {
            throw new InvalidArgumentException("Invalid property. '$key' does not exist.");
        }
    }

    /**
     * Get the property type
     *
     * @since 2.19.6
     */
    protected function getPropertyType(string $key): string
=======
     * Get the property type
     *
     * @since 2.19.6
     *
     * @param $key
     *
     * @return string
     */
    protected function getPropertyType($key)
>>>>>>> fb785cbb (Initial commit)
    {
        $type = is_array($this->properties[$key]) ? $this->properties[$key][0] : $this->properties[$key];

        return strtolower(trim($type));
    }

    /**
     * Get the default for a property if one is provided, otherwise default to null
     *
     * @since 2.20.0
     *
     * @param $key
     *
     * @return mixed|null
     */
    protected function getPropertyDefault($key)
    {
        return is_array($this->properties[$key]) && isset($this->properties[$key][1])
            ? $this->properties[$key][1]
            : null;
    }

    /**
     * Returns the defaults for all the properties. If a default is omitted it defaults to null.
     *
     * @since 2.20.0
<<<<<<< HEAD
     */
    protected function getPropertyDefaults(): array
=======
     *
     * @return array
     */
    protected function getPropertyDefaults()
>>>>>>> fb785cbb (Initial commit)
    {
        $defaults = [];
        foreach (array_keys($this->properties) as $property) {
            $defaults[$property] = $this->getPropertyDefault($property);
        }

        return $defaults;
    }

    /**
     * @since 2.19.6
<<<<<<< HEAD
     */
    public function toArray(): array
=======
     *
     * @return array
     */
    public function toArray()
>>>>>>> fb785cbb (Initial commit)
    {
        return $this->attributes;
    }

    /**
     * @since 2.19.6
<<<<<<< HEAD
     */
    public function getAttributes(): array
=======
     *
     * @return array
     */
    public function getAttributes()
>>>>>>> fb785cbb (Initial commit)
    {
        return $this->attributes;
    }

    /**
     * @return int[]|string[]
     */
<<<<<<< HEAD
    public static function propertyKeys(): array
    {
        return array_keys((new static())->properties);
=======
    public static function propertyKeys()
    {
        return array_keys((new static)->properties);
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @since 2.19.6
     *
<<<<<<< HEAD
     * @return mixed
     */
    public function __get(string $key)
=======
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
>>>>>>> fb785cbb (Initial commit)
    {
        if (array_key_exists($key, $this->relationships)) {
            return $this->getRelationship($key);
        }

        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @since 2.19.6
     *
     * @param string $key
<<<<<<< HEAD
     * @param mixed  $value
=======
     * @param mixed $value
>>>>>>> fb785cbb (Initial commit)
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * Determine if an attribute exists on the model.
     *
     * @since 2.19.6
     *
     * @param string $key
     *
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }

    /**
     * @since 2.20.0 cache the relations after first load
     * @since 2.19.6
     *
     * @param $key
     *
     * @return Model|Model[]
     *
     * @throws InvalidArgumentException
     */
    protected function getRelationship($key)
    {
<<<<<<< HEAD
        if ( ! is_callable([$this, $key])) {
=======
        if (!is_callable([$this, $key])) {
>>>>>>> fb785cbb (Initial commit)
            throw new InvalidArgumentException("$key() does not exist.");
        }

        if ($this->hasCachedRelationship($key)) {
            return $this->cachedRelations[$key];
        }

        $relationship = new Relationship($this->relationships[$key]);

        switch (true) {
            case ($relationship->equals(Relationship::BELONGS_TO())):
            case ($relationship->equals(Relationship::HAS_ONE())):
                return $this->cachedRelations[$key] = $this->$key()->get();
            case ($relationship->equals(Relationship::HAS_MANY())):
            case ($relationship->equals(Relationship::BELONGS_TO_MANY())):
            case ($relationship->equals(Relationship::MANY_TO_MANY())):
                return $this->cachedRelations[$key] = $this->$key()->getAll();
        }

        return null;
    }

    /**
     * Checks whether a relationship has already been loaded.
     *
     * @since 2.20.0
     */
    protected function hasCachedRelationship(string $key): bool
    {
        return array_key_exists($key, $this->cachedRelations);
    }
}
