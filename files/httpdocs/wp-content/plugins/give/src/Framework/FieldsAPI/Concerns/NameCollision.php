<?php

namespace Give\Framework\FieldsAPI\Concerns;

use Give\Framework\FieldsAPI\Contracts\Collection;
use Give\Framework\FieldsAPI\Contracts\Node;
use Give\Framework\FieldsAPI\Exceptions\NameCollisionException;

/**
 * @since 2.10.2
 */
trait NameCollision
{

    /**
<<<<<<< HEAD
     * @since 2.10.2
     *
     * @throws NameCollisionException
     */
    public function checkNameCollisionDeep(Node $node)
=======
     * @param Node $node
     *
     * @throws NameCollisionException
     */
    public function checkNameCollisionDeep($node)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->checkNameCollision($node);
        if ($node instanceof Collection) {
            $node->walk([$this, 'checkNameCollision']);
        }
    }

    /**
<<<<<<< HEAD
     * @since 2.10.2
     *
     * @throws NameCollisionException
     */
    public function checkNameCollision(Node $node)
=======
     * @param Node $node
     *
     * @throws NameCollisionException
     */
    public function checkNameCollision($node)
>>>>>>> fb785cbb (Initial commit)
    {
        if ($this->getNodeByName($node->getName())) {
            throw new NameCollisionException($node->getName());
        }
    }
}
