<?php

namespace Give\Framework\FieldsAPI\Concerns;

use Give\Framework\FieldsAPI\Contracts\Collection;
use Give\Framework\FieldsAPI\Contracts\Node;
use Give\Framework\FieldsAPI\Field;

trait HasNodes
{
<<<<<<< HEAD
    /**
     * @var Node[]
     */
    protected $nodes = [];

    /**
     * @inheritdoc
     */
    public function getNodeIndexByName(string $name)
=======

    /** @var Node[] */
    protected $nodes = [];

    /**
     * {@inheritdoc}
     */
    public function getNodeIndexByName($name)
>>>>>>> fb785cbb (Initial commit)
    {
        foreach ($this->nodes as $index => $node) {
            if ($node->getName() === $name) {
                return $index;
            }
        }

<<<<<<< HEAD
        return null;
    }

    /**
     * @inheritdoc
     *
     * @return Node|null
     */
    public function getNodeByName(string $name)
=======
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getNodeByName($name)
>>>>>>> fb785cbb (Initial commit)
    {
        foreach ($this->nodes as $node) {
            if ($node->getName() === $name) {
                return $node;
            }
            if ($node instanceof Collection) {
                $nestedNode = $node->getNodeByName($name);
<<<<<<< HEAD
                if ($nestedNode !== null) {
=======
                if ( $nestedNode !== null ) {
>>>>>>> fb785cbb (Initial commit)
                    return $nestedNode;
                }
            }
        }

        return null;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
     */
    public function all(): array
=======
     * {@inheritdoc}
     */
    public function all()
>>>>>>> fb785cbb (Initial commit)
    {
        return $this->nodes;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
     *
     * @return Field[]
     */
    public function getFields(): array
=======
     * {@inheritdoc}
     */
    public function getFields()
>>>>>>> fb785cbb (Initial commit)
    {
        $fields = [];

        foreach ($this->nodes as $node) {
            if ($node instanceof Field) {
                $fields[] = $node;
            } elseif ($node instanceof Collection) {
<<<<<<< HEAD
                $nestedFields = $node->getFields();

                foreach($nestedFields as $field) {
                    $fields[] = $field;
                }
=======
                $fields = array_merge($fields, $node->getFields());
>>>>>>> fb785cbb (Initial commit)
            }
        }

        return $fields;
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
     */
    public function count(): int
=======
     * {@inheritdoc}
     */
    public function count()
>>>>>>> fb785cbb (Initial commit)
    {
        return count($this->nodes);
    }

}
