<?php

namespace Give\DonationForms;

<<<<<<< HEAD
use Give\DonationForms\ListTable\DonationFormsListTable;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\DonationForms\Repositories\DonationFormsRepository;
use Give\Helpers\Hooks;
use Give\ServiceProviders\ServiceProvider as ServiceProviderInterface;

/**
 * @since 2.19.0
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register()
    {
<<<<<<< HEAD
        give()->singleton('donationForms', DonationFormsRepository::class);
        give()->singleton(DonationFormsListTable::class, function() {
            $listTable = new DonationFormsListTable();
            Hooks::doAction('givewp_donation_forms_list_table', $listTable);

            return $listTable;
        });
=======
        give()->singleton('donationFormsRepository', DonationFormsRepository::class);
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * @inheritDoc
     */
    public function boot()
    {
        $userId = get_current_user_id();
        $showLegacy = get_user_meta($userId, '_give_donation_forms_archive_show_legacy', true);
        // only register new admin page if user hasn't chosen to use the old one
        if(empty($showLegacy))
        {
<<<<<<< HEAD
            Hooks::addAction('admin_menu', DonationFormsAdminPage::class, 'register', 0);
=======
            Hooks::addAction('admin_menu', DonationFormsAdminPage::class, 'register');
>>>>>>> fb785cbb (Initial commit)
            Hooks::addAction('admin_menu', DonationFormsAdminPage::class, 'highlightAllFormsMenuItem');

            if (DonationFormsAdminPage::isShowing()) {
                Hooks::addAction('admin_enqueue_scripts', DonationFormsAdminPage::class, 'loadScripts');
            }
        }
        elseif(DonationFormsAdminPage::isShowingLegacyPage())
        {
            Hooks::addAction( 'admin_head', DonationFormsAdminPage::class, 'renderReactSwitch');
        }
    }
}
