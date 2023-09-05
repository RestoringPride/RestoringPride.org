<?php

namespace Give\Donors;

<<<<<<< HEAD
use Give\Donors\ListTable\DonorsListTable;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Donors\Repositories\DonorRepositoryProxy;
use Give\Helpers\Hooks;
use Give\ServiceProviders\ServiceProvider as ServiceProviderInterface;

/**
 * @since 2.19.6
 */
class ServiceProvider implements ServiceProviderInterface
{

    /**
     * @inheritDoc
     */
    public function register()
    {
        give()->singleton('donors', DonorRepositoryProxy::class);
<<<<<<< HEAD
        give()->singleton(DonorsListTable::class, function() {
            $listTable = new DonorsListTable();
            Hooks::doAction('givewp_donors_list_table', $listTable);

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
        $userId = get_current_user_id();
        $showLegacy = get_user_meta($userId, '_give_donors_archive_show_legacy', true);
        // only register new admin page if user hasn't chosen to use the old one
        if(empty($showLegacy)) {
<<<<<<< HEAD
            Hooks::addAction('admin_menu', DonorsAdminPage::class, 'registerMenuItem', 30);
=======
            Hooks::addAction('admin_menu', DonorsAdminPage::class, 'registerMenuItem');
>>>>>>> fb785cbb (Initial commit)

            if (DonorsAdminPage::isShowing()) {
                Hooks::addAction('admin_enqueue_scripts', DonorsAdminPage::class, 'loadScripts');
            }
        }
        elseif(DonorsAdminPage::isShowing())
        {
            Hooks::addAction( 'admin_head', DonorsAdminPage::class, 'renderReactSwitch');
        }
    }
}
