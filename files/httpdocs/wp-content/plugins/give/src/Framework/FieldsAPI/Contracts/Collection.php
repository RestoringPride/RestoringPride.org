<?php

namespace Give\Framework\FieldsAPI\Contracts;

use Give\Framework\FieldsAPI\Field;

interface Collection
{
<<<<<<< HEAD
    /**
     * @since 2.10.2
     *
     * Fluently append nodes to the collection.
     *
     * @return $this do not add return type until PHP 7.4 is minimum
=======

    /**
     * Fluently append nodes to the collection.
     *
     * @param Node ...$nodes
     *
     * @return $this
>>>>>>> fb785cbb (Initial commit)
     */
    public function append(Node ...$nodes);

    /**
     * Fluently remove a named node.
     *
<<<<<<< HEAD
     * @since 2.10.2
     *
     * @return mixed
     */
    public function remove(string $name);
=======
     * @param string $name
     *
     * @return mixed
     */
    public function remove($name);
>>>>>>> fb785cbb (Initial commit)

    /**
     * Get all the nodes.
     *
<<<<<<< HEAD
     * @since 2.10.2
     *
     * @return Node[]
     */
    public function all(): array;
=======
     * @return Node[]
     */
    public function all();
>>>>>>> fb785cbb (Initial commit)

    /**
     * Count all the nodes.
     *
<<<<<<< HEAD
     * @since 2.10.2
     *
     * @return int
     */
    public function count(): int;
=======
     * @return int
     */
    public function count();
>>>>>>> fb785cbb (Initial commit)

    /**
     * Get a node’s index by its name.
     *
<<<<<<< HEAD
     * @since 2.10.2
     *
     * @return int|null
     */
    public function getNodeIndexByName(string $name);
=======
     * @param string $name
     *
     * @return int
     */
    public function getNodeIndexByName($name);
>>>>>>> fb785cbb (Initial commit)

    /**
     * Get a node by its name.
     *
<<<<<<< HEAD
     * @since 2.10.2
     *
     * @return Node|Collection
     */
    public function getNodeByName(string $name);
=======
     * @param string $name
     *
     * @return Node|Collection
     */
    public function getNodeByName($name);
>>>>>>> fb785cbb (Initial commit)

    /**
     * Get only the field nodes.
     *
     * @return Field[]
     */
<<<<<<< HEAD
    public function getFields(): array;

    /**
     * Inserts the given noe after the node with the given name.
     *
     * @since 2.10.2
     *
     * @return $this
     */
    public function insertAfter(string $siblingName, Node $node);

    /**
     * Inserts the given noe before the node with the given name.
     *
     * @since 2.10.2
     *
     * @return $this
     */
    public function insertBefore(string $siblingName, Node $node);
=======
    public function getFields();

    /**
     * @param string $siblingName
     * @param Node   $node
     *
     * @return $this
     */
    public function insertAfter($siblingName, Node $node);

    /**
     * @param string $siblingName
     * @param Node   $node
     *
     * @return $this
     */
    public function insertBefore($siblingName, Node $node);
>>>>>>> fb785cbb (Initial commit)

    /**
     * Walk through each node in the collection
     *
<<<<<<< HEAD
     * @since 2.10.2
=======
     * @param callable $callback
>>>>>>> fb785cbb (Initial commit)
     *
     * @return void
     */
    public function walk(callable $callback);
}
