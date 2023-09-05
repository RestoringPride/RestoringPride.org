<?php

namespace Give\Framework\FieldsAPI;

<<<<<<< HEAD
use Give\Framework\ValidationRules\Rules\AllowedTypes;

=======
>>>>>>> fb785cbb (Initial commit)
use function get_allowed_mime_types;
use function wp_max_upload_size;

/**
 * A file upload field.
 *
<<<<<<< HEAD
 * @since      2.12.0
 * @since 2.23.1 Moved default rule values inline since inherited constructor is final.
=======
 * @since 2.12.0
>>>>>>> fb785cbb (Initial commit)
 */
class File extends Field
{

    use Concerns\AllowMultiple;
    use Concerns\HasEmailTag;
    use Concerns\HasHelpText;
    use Concerns\HasLabel;
    use Concerns\ShowInReceipt;
    use Concerns\StoreAsMeta;
    use Concerns\AllowMultiple;

    const TYPE = 'file';

    /**
<<<<<<< HEAD
=======
     * @since 2.16.0 File size unit is bytes, so no need to convert WordPress max file upload size to kilo bytes.
     *
     * @param string $name
     *
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->validationRules->rule('maxSize', wp_max_upload_size()); // in bytes
        $this->validationRules->rule('allowedTypes', get_allowed_mime_types());
    }

    /**
>>>>>>> fb785cbb (Initial commit)
     * Set the maximum file size.
     *
     * @param int $maxSize
     *
     * @return $this
     */
    public function maxSize($maxSize)
    {
<<<<<<< HEAD
        if ($this->hasRule('max')) {
            /** @var Max $rule */
            $rule = $this->getRule('max');
            $rule->size($maxSize);
        }

        $this->rules("max:$maxSize");
=======
        $this->validationRules->rule('maxSize', $maxSize);
>>>>>>> fb785cbb (Initial commit)

        return $this;
    }

    /**
     * Access the maximum file size.
<<<<<<< HEAD
     */
    public function getMaxSize(): int
    {
        if (!$this->hasRule('max')) {
            return wp_max_upload_size();
        }

        return $this->getRule('max')->getSize();
=======
     *
     * @return int
     */
    public function getMaxSize()
    {
        return $this->validationRules->getRule('maxSize');
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Set the allowed file types.
     *
     * @param string[] $allowedTypes
     *
     * @return $this
     */
<<<<<<< HEAD
    public function allowedTypes(array $allowedTypes)
    {
        if ($this->hasRule('allowedTypes')) {
            /** @var AllowedTypes $rule */
            $rule = $this->getRule('allowedTypes');
            $rule->setAllowedtypes($allowedTypes);
        }

        $this->rules('allowedTypes:' . implode(',', $allowedTypes));
=======
    public function allowedTypes($allowedTypes)
    {
        $this->validationRules->rule('allowedTypes', $allowedTypes);
>>>>>>> fb785cbb (Initial commit)

        return $this;
    }

    /**
     * Access the allowed file types.
     *
     * @return string[]
     */
    public function getAllowedTypes()
    {
<<<<<<< HEAD
        if (!$this->hasRule('allowedTypes')) {
            return get_allowed_mime_types();
        }

        return $this->getRule('allowedTypes')->getAllowedTypes();
=======
        return $this->validationRules->getRule('allowedTypes');
>>>>>>> fb785cbb (Initial commit)
    }
}
