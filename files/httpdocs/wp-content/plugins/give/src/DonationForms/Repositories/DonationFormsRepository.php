<?php

namespace Give\DonationForms\Repositories;

<<<<<<< HEAD
use Give\DonationForms\Models\DonationForm;
use Give\DonationForms\ValueObjects\DonationFormMetaKeys;
use Give\Donations\Models\Donation;
use Give\Framework\Models\ModelQueryBuilder;

/**
 * @since 2.24.0 add support methods for donation form model
=======
use Give\Donations\ValueObjects\DonationMetaKeys;
use Give\Framework\Database\DB;

/**
>>>>>>> fb785cbb (Initial commit)
 * @since 2.19.0
 */
class DonationFormsRepository
{
    /**
<<<<<<< HEAD
     * Get DonationForm By ID
     *
     * @since 2.24.0
     *
     * @return DonationForm|null
     */
    public function getById(int $donationFormId)
    {
        return $this->prepareQuery()
            ->where('ID', $donationFormId)
            ->get();
    }

    /**
     * @since 2.24.0
     *
     * @return ModelQueryBuilder<Donation>
     */
    public function prepareQuery(): ModelQueryBuilder
    {
        $builder = new ModelQueryBuilder(DonationForm::class);

        return $builder->from('posts')
            ->select(
                ['ID', 'id'],
                ['post_title', 'title'],
                ['post_date', 'createdAt'],
                ['post_modified', 'updatedAt'],
                ['post_status', 'status']
            )
            ->attachMeta(
                'give_formmeta',
                'ID',
                'form_id',
                ...DonationFormMetaKeys::getColumnsForAttachMetaQuery()
            )
            ->where('post_type', 'give_forms');
=======
     * @param int $formId
     *
     * @return int
     */
    public function getFormDonationsCount(int $formId): int
    {
        return DB::table('posts')
            ->leftJoin('give_donationmeta', 'ID', 'donation_id')
            ->where('meta_key', DonationMetaKeys::FORM_ID)
            ->where('meta_value', $formId)
            ->count();
>>>>>>> fb785cbb (Initial commit)
    }
}
