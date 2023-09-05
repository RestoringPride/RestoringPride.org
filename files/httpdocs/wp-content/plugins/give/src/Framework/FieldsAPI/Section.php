<?php

namespace Give\Framework\FieldsAPI;

use Give\Framework\FieldsAPI\Concerns\HasLabel;

/**
<<<<<<< HEAD
 * @since 2.22.0
=======
 * @unreleased
>>>>>>> fb785cbb (Initial commit)
 */
class Section extends Group
{
    use HasLabel;

    /**
<<<<<<< HEAD
     * @since 2.22.0
=======
     * @unreleased
>>>>>>> fb785cbb (Initial commit)
     */
    const TYPE = 'section';

    /**
     * @var string
     */
    protected $description;

    /**
<<<<<<< HEAD
     * @since 2.22.0
=======
     * @unreleased
>>>>>>> fb785cbb (Initial commit)
     */
    public function description(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
<<<<<<< HEAD
     * @since 2.22.0
=======
     * @unreleased
>>>>>>> fb785cbb (Initial commit)
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
