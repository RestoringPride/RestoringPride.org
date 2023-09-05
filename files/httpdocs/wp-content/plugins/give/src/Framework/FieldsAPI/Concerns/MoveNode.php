<?php

namespace Give\Framework\FieldsAPI\Concerns;

trait MoveNode
{
<<<<<<< HEAD
    public function move($name): MoveNodeProxy
=======

    public function move($name)
>>>>>>> fb785cbb (Initial commit)
    {
        $collection = $this;
        $proxy = new MoveNodeProxy($collection);
        $proxy->move(
            $collection->getNodeByName($name)
        );

        return $proxy;
    }
}
