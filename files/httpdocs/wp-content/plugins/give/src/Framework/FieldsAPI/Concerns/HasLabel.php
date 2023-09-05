<?php

namespace Give\Framework\FieldsAPI\Concerns;

trait HasLabel
{
<<<<<<< HEAD
=======

>>>>>>> fb785cbb (Initial commit)
    /** @var string */
    protected $label;

    /**
<<<<<<< HEAD
     * @since 2.24.0 add types
     */
    public function label(string $label): self
=======
     * @param string $label
     *
     * @return $this
     */
    public function label($label)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->label = $label;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @since 2.24.0 add types
     *
     * @return string|null
=======
     * @return string
>>>>>>> fb785cbb (Initial commit)
     */
    public function getLabel()
    {
        return $this->label;
    }
}
