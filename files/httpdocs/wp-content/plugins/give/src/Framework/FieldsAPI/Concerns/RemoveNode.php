<?php

namespace Give\Framework\FieldsAPI\Concerns;

use Give\Framework\FieldsAPI\Contracts\Collection;

trait RemoveNode
{
<<<<<<< HEAD
    /**
     * @since 2.10.2
     *
     * @return static
     */
    public function remove(string $name)
=======

    public function remove($name)
>>>>>>> fb785cbb (Initial commit)
    {
        foreach ($this->nodes as $index => $node) {
            if ($node->getName() === $name) {
                unset($this->nodes[$index]);

                return $this;
            }
            if ($node instanceof Collection) {
                return $node->remove($name);
            }
        }

<<<<<<< HEAD
        // Maybe need to throw an exception if no node is removed.
=======
        // Maybe need to throw an exception of no node is removed.
>>>>>>> fb785cbb (Initial commit)
        return $this;
    }
}
