<?php

namespace Give\Donations;

<<<<<<< HEAD
use Give\Donations\LegacyListeners\ClearDonationPostCache;
use Give\Donations\LegacyListeners\DispatchDonationNoteEmailNotification;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Donations\LegacyListeners\DispatchGiveInsertPayment;
use Give\Donations\LegacyListeners\DispatchGivePreInsertPayment;
use Give\Donations\LegacyListeners\DispatchGiveRecurringAddSubscriptionPaymentAndRecordPayment;
use Give\Donations\LegacyListeners\DispatchGiveUpdatePaymentStatus;
use Give\Donations\LegacyListeners\InsertSequentialId;
use Give\Donations\LegacyListeners\RemoveSequentialId;
use Give\Donations\LegacyListeners\UpdateDonorPaymentIds;
<<<<<<< HEAD
use Give\Donations\ListTable\DonationsListTable;
use Give\Donations\Migrations\AddMissingDonorIdToDonationComments;
use Give\Donations\Migrations\SetAutomaticFormattingOption;
use Give\Donations\Models\Donation;
use Give\Donations\Repositories\DonationNotesRepository;
use Give\Donations\Repositories\DonationRepository;
use Give\Framework\Migrations\MigrationsRegister;
=======
use Give\Donations\LegacyListeners\UpdateSequentialId;
use Give\Donations\Models\Donation;
use Give\Donations\Repositories\DonationNotesRepository;
use Give\Donations\Repositories\DonationRepository;
use Give\Helpers\Call;
>>>>>>> fb785cbb (Initial commit)
use Give\Helpers\Hooks;
use Give\ServiceProviders\ServiceProvider as ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        give()->singleton('donations', DonationRepository::class);
        give()->singleton('donationNotes', DonationNotesRepository::class);
<<<<<<< HEAD
        give()->singleton(DonationsListTable::class, function () {
            $listTable = new DonationsListTable();
            Hooks::doAction('givewp_donations_list_table', $listTable);

            return $listTable;
        });
=======
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * @inheritDoc
     */
    public function boot()
    {
        $this->bootLegacyListeners();
        $this->registerDonationsAdminPage();
<<<<<<< HEAD

        give(MigrationsRegister::class)->addMigrations([
            AddMissingDonorIdToDonationComments::class,
            SetAutomaticFormattingOption::class,
        ]);
=======
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Legacy Listeners
<<<<<<< HEAD
     * @since 2.25.0 Call ClearDonationPostCache on the "givewp_donation_updated" hook
     * @since 2.24.0 Remove UpdateSequentialId from "givewp_donation_updated" action hook.
=======
     *
>>>>>>> fb785cbb (Initial commit)
     * @since 2.19.6
     */
    private function bootLegacyListeners()
    {
        Hooks::addAction('givewp_donation_creating', DispatchGivePreInsertPayment::class);

<<<<<<< HEAD
        add_action('givewp_donation_created', static function (Donation $donation) {
            (new InsertSequentialId())($donation);
            (new DispatchGiveInsertPayment())($donation);
            (new UpdateDonorPaymentIds())($donation);

            if ($donation->subscriptionId && $donation->type->isRenewal()) {
                (new DispatchGiveRecurringAddSubscriptionPaymentAndRecordPayment())($donation);
=======
        add_action('givewp_donation_created', function (Donation $donation) {
            Call::invoke(InsertSequentialId::class, $donation);
            Call::invoke(DispatchGiveInsertPayment::class, $donation);
            Call::invoke(UpdateDonorPaymentIds::class, $donation);

            if ($donation->subscriptionId) {
                Call::invoke(DispatchGiveRecurringAddSubscriptionPaymentAndRecordPayment::class, $donation);
>>>>>>> fb785cbb (Initial commit)
            }

            /**
             * @notice
             * Anytime we call give_update_payment_status the donor purchase_value and purchase_count get affected.
             * We are doing this in the gateway api and in many other places.
             * The listener below matches the functionality but the count seems to be overwritten elsewhere.
             * Leaving this commented out until resolved or needed.
             */
            //Call::invoke(UpdateDonorPurchaseValueAndCount::class, $donation);
        });

        add_action('givewp_donation_updated', function (Donation $donation) {
<<<<<<< HEAD
            (new ClearDonationPostCache())($donation);
            (new DispatchGiveUpdatePaymentStatus())($donation);
        });

        Hooks::addAction('givewp_donation_deleted', RemoveSequentialId::class);

        add_action('givewp_donation_note_created', static function ($donationNote) {
            if ($donationNote->type->isDonor()) {
                (new DispatchDonationNoteEmailNotification())($donationNote);
            }
        });
=======
            Call::invoke(DispatchGiveUpdatePaymentStatus::class, $donation);
            Call::invoke(UpdateSequentialId::class, $donation);
        });

        Hooks::addAction('givewp_donation_deleted', RemoveSequentialId::class);
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Donations Admin page
     *
     * @since 2.20.0
     */
    private function registerDonationsAdminPage()
    {
        $userId = get_current_user_id();
        $showLegacy = get_user_meta($userId, '_give_donations_archive_show_legacy', true);
        // only register new admin page if user hasn't chosen to use the old one
<<<<<<< HEAD
        if (empty($showLegacy)) {
            Hooks::addAction('admin_menu', DonationsAdminPage::class, 'registerMenuItem', 20);
=======
        if(empty($showLegacy))
        {
            Hooks::addAction('admin_menu', DonationsAdminPage::class, 'registerMenuItem');
>>>>>>> fb785cbb (Initial commit)

            if (DonationsAdminPage::isShowing()) {
                Hooks::addAction('admin_enqueue_scripts', DonationsAdminPage::class, 'loadScripts');
            }
        }
    }
}
