<?php

namespace Give\Framework\FieldsAPI;

use Give\Framework\FieldsAPI\Contracts\Collection;
use Give\Framework\FieldsAPI\Contracts\Node;

/**
<<<<<<< HEAD
 * @since      2.12.0
 * @since      2.13.0 Support visibility conditions
 * @since 2.22.0 Add TapNode trait
=======
 * @since 2.12.0
 * @since 2.13.0 Support visibility conditions
>>>>>>> fb785cbb (Initial commit)
 */
class Group implements Node, Collection
{
    use Concerns\HasName;
    use Concerns\HasNodes;
    use Concerns\HasType;
    use Concerns\HasVisibilityConditions;
    use Concerns\InsertNode;
    use Concerns\MoveNode;
    use Concerns\NameCollision;
    use Concerns\RemoveNode;
    use Concerns\SerializeAsJson;
<<<<<<< HEAD
    use Concerns\TapNode;
=======
>>>>>>> fb785cbb (Initial commit)
    use Concerns\WalkNodes;

    /**
     * @since 2.12.2
     */
    const TYPE = 'group';

    /**
<<<<<<< HEAD
     * @since      2.12.0
     * @since 2.23.1 Make constructor final to avoid unsafe usage of `new static()`.
     *
     * @param $name
     */
    final public function __construct($name)
=======
     * @since 2.12.0
     *
     * @param $name
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
        return 'group';
    }

    /**
     * @since 2.12.0
     *
     * @param $name
     *
     * @return static
     */
    public static function make($name)
    {
        return new static($name);
    }
<<<<<<< HEAD

    /**
     * Gives th ability to fluently "tap" a specific node within the group. This is useful when fluently calling methods
     * on the group, and making a change to a specific node without breaking the fluency.
     *
     * @since 2.22.0
     *
     * @return $this
     */
    public function tapNode(string $name, callable $callback)
    {
        $callback($this->getNodeByName($name));

        return $this;
    }
=======
>>>>>>> fb785cbb (Initial commit)
}
