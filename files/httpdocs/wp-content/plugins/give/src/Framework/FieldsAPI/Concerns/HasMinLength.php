<?php

namespace Give\Framework\FieldsAPI\Concerns;

<<<<<<< HEAD
use Give\Vendors\StellarWP\Validation\Rules\Min;

/**
 * @since 2.24.0 update to new validation system
 * @since 2.14.0
 */
trait HasMinLength
{
    /**
     * Set the value’s minimum length.
     *
     * @since 2.24.0 update to new validation system
     * @since 2.14.0
     */
    public function minLength(int $minLength): self
    {
        if ( $this->hasRule('min') ) {
            /** @var Min $rule */
            $rule = $this->getRule('min');
            $rule->size($minLength);
        }

        $this->rules("min:$minLength");
=======
/**
 * @since 2.14.0
 *
 * @property ValidationRules $validationRules
 */
trait HasMinLength
{

    /**
     * Set the value’s minimum length.
     *
     * @since 2.14.0
     *
     * @param int $minLength
     *
     * @return $this
     */
    public function minLength($minLength)
    {
        $this->validationRules->rule('minLength', $minLength);
>>>>>>> fb785cbb (Initial commit)

        return $this;
    }

    /**
     * Get the value’s minimum length.
     *
<<<<<<< HEAD
     * @since 2.24.0 update to use the new validation system
=======
>>>>>>> fb785cbb (Initial commit)
     * @since 2.14.0
     *
     * @return int|null
     */
    public function getMinLength()
    {
<<<<<<< HEAD
        $rule = $this->getRule('min');

        return $rule instanceof Min ? $rule->getSize() : null;
=======
        return $this->validationRules->getRule('minLength');
>>>>>>> fb785cbb (Initial commit)
    }
}
