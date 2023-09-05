<?php

namespace Give\Framework\FieldsAPI;

use Give\Framework\FieldsAPI\Contracts\Node;

/**
<<<<<<< HEAD
 * @since      2.12.0
 * @since      2.13.0 Support visibility conditions
 * @since 2.22.0 Add TapNode trait
 */
abstract class Element implements Node
{
=======
 * @since 2.12.0
 * @since 2.13.0 Support visibility conditions
 */
abstract class Element implements Node
{

>>>>>>> fb785cbb (Initial commit)
    use Concerns\HasName;
    use Concerns\HasType;
    use Concerns\HasVisibilityConditions;
    use Concerns\SerializeAsJson;
<<<<<<< HEAD
    use Concerns\TapNode;

    /**
     * @since      2.12.0
     * @since 2.23.1 Make constructor final to avoid unsafe usage of `new static()`.
     *
     * @param string $name
     */
    final public function __construct($name)
=======

    /**
     * @since 2.12.0
     *
     * @param string $name
     */
    public function __construct($name)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function getNodeType(): string
    {
        return 'element';
    }

    /**
     * Create a named block.
     *
     * @since 2.12.0
     *
     * @param string $name
     *
     * @return static
     */
    public static function make($name)
    {
        return new static($name);
    }
}
