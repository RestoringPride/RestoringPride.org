<?php

namespace Give\Framework\FieldsAPI\Concerns;

<<<<<<< HEAD

use Give\Vendors\StellarWP\Validation\Rules\Max;

/**
 * @since 2.24.0 update to new validation system
 * @since 2.14.0
 */
trait HasMaxLength
{
    /**
     * Set the value’s maximum length.
     *
     * @since 2.24.0 update to use the new validation system
     * @since 2.14.0
     */
    public function maxLength(int $maxLength): self
    {
        if ( $this->hasRule('max') ) {
            /** @var Max $rule */
            $rule = $this->getRule('max');
            $rule->size($maxLength);
        }

        $this->rules("max:$maxLength");
=======
/**
 * @since 2.14.0
 *
 * @property ValidationRules $validationRules
 */
trait HasMaxLength
{

    /**
     * Set the value’s maximum length.
     *
     * @since 2.14.0
     *
     * @param int $maxLength
     *
     * @return $this
     */
    public function maxLength($maxLength)
    {
        $this->validationRules->rule('maxLength', $maxLength);
>>>>>>> fb785cbb (Initial commit)

        return $this;
    }

    /**
     * Get the value’s maximum length.
     *
<<<<<<< HEAD
     * @since 2.24.0 update to use the new validation system
=======
>>>>>>> fb785cbb (Initial commit)
     * @since 2.14.0
     *
     * @return int|null
     */
    public function getMaxLength()
    {
<<<<<<< HEAD
        if ( !$this->hasRule('max') ) {
            return null;
        }

        return $this->getRule('max')->getSize();
=======
        return $this->validationRules->getRule('maxLength');
>>>>>>> fb785cbb (Initial commit)
    }
}
