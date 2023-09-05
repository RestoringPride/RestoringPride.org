<?php

namespace Give\Framework\FieldsAPI\Concerns;

use Give\Framework\FieldsAPI\Contracts\Collection;
use Give\Framework\FieldsAPI\Contracts\Node;
<<<<<<< HEAD
use Give\Framework\FieldsAPI\Exceptions\NameCollisionException;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Framework\FieldsAPI\Exceptions\ReferenceNodeNotFoundException;

/**
 * @since 2.10.2
 */
trait InsertNode
{
<<<<<<< HEAD
    /**
     * @inheritDoc
     *
     * @since 2.10.2
     *
     * @throws ReferenceNodeNotFoundException|NameCollisionException
     */
    public function insertAfter(string $siblingName, Node $node): self
=======

    /**
     * @since 2.10.2
     *
     * @param string $siblingName
     * @param Node   $node
     *
     * @return $this
     * @throws ReferenceNodeNotFoundException
     */
    public function insertAfter($siblingName, Node $node)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->checkNameCollisionDeep($node);
        $this->insertAfterRecursive($siblingName, $node);

        return $this;
    }

    /**
     * @since 2.10.2
     *
<<<<<<< HEAD
     * @return void
     * @throws ReferenceNodeNotFoundException|NameCollisionException
     */
    protected function insertAfterRecursive(string $siblingName, Node $node)
    {
        $siblingIndex = $this->getNodeIndexByName($siblingName);
        if (null !== $siblingIndex) {
            $this->insert(
                $node,
                $siblingIndex + 1
=======
     * @param string $siblingName
     * @param Node   $node
     *
     * @return void
     * @throws ReferenceNodeNotFoundException
     *
     */
    protected function insertAfterRecursive($siblingName, Node $node)
    {
        $siblingIndex = $this->getNodeIndexByName($siblingName);
        if (false !== $siblingIndex) {
            $this->insertAtIndex(
                $siblingIndex + 1,
                $node
>>>>>>> fb785cbb (Initial commit)
            );

            return;
        }

        if ($this->nodes) {
            foreach ($this->nodes as $childNode) {
                if ($childNode instanceof Collection) {
                    $childNode->insertAfter($siblingName, $node);
                }
            }

            return;
        }

        throw new ReferenceNodeNotFoundException($siblingName);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     *
     * @since 2.10.2
     *
     * @throws ReferenceNodeNotFoundException|NameCollisionException
     */
    public function insertBefore(string $siblingName, Node $node): self
=======
     * @since 2.10.2
     *
     * @param string $siblingName
     * @param Node   $node
     *
     * @return $this
     * @throws ReferenceNodeNotFoundException
     *
     */
    public function insertBefore($siblingName, Node $node)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->checkNameCollisionDeep($node);
        $this->insertBeforeRecursive($siblingName, $node);

        return $this;
    }

    /**
     * @since 2.10.2
     *
<<<<<<< HEAD
     * @return void
     * @throws ReferenceNodeNotFoundException|NameCollisionException
     */
    protected function insertBeforeRecursive(string $siblingName, Node $node)
    {
        $siblingIndex = $this->getNodeIndexByName($siblingName);
        if (null !== $siblingIndex) {
            $this->insert(
                $node,
                $siblingIndex - 1
=======
     * @param string $siblingName
     * @param Node   $node
     *
     * @return void
     * @throws ReferenceNodeNotFoundException
     *
     */
    protected function insertBeforeRecursive($siblingName, Node $node)
    {
        $siblingIndex = $this->getNodeIndexByName($siblingName);
        if (false !== $siblingIndex) {
            $this->insertAtIndex(
                $siblingIndex - 1,
                $node
>>>>>>> fb785cbb (Initial commit)
            );

            return;
        }

        if ($this->nodes) {
            foreach ($this->nodes as $childNode) {
                if ($childNode instanceof Collection) {
                    $childNode->insertBefore($siblingName, $node);
                }
            }

            return;
        }

        throw new ReferenceNodeNotFoundException($siblingName);
    }

    /**
<<<<<<< HEAD
     * @since 2.24.0 Make index optional to avoid rebuilding array when appending
     * @since 2.10.2
     *
     * @param int|null $index appends to end if null
     *
     * @throws NameCollisionException
     */
    protected function insert(Node $node, int $index = null)
    {
        $this->checkNameCollisionDeep($node);

        if ($index === null) {
            $this->nodes[] = $node;
        } else {
            array_splice($this->nodes, $index, 0, [$node]);
        }
    }

    /**
     * @inheritdoc
     *
     * @since 2.10.2
     *
     * @throws NameCollisionException
     */
    public function append(Node ...$nodes): self
    {
        foreach ($nodes as $node) {
            $this->insert($node);
=======
     * @since 2.10.2
     */
    protected function insertAtIndex($index, $node)
    {
        $this->checkNameCollisionDeep($node);
        array_splice($this->nodes, $index, 0, [$node]);
    }

    /**
     * {@inheritdoc}
     */
    public function append(Node ...$nodes)
    {
        foreach ($nodes as $node) {
            $this->insertAtIndex($this->count(), $node);
>>>>>>> fb785cbb (Initial commit)
        }

        return $this;
    }
}
