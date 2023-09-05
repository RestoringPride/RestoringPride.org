<?php

namespace Give\Subscriptions;

use Give\Framework\Migrations\MigrationsRegister;
use Give\Helpers\Hooks;
use Give\ServiceProviders\ServiceProvider as ServiceProviderInterface;
use Give\Subscriptions\LegacyListeners\DispatchGiveSubscriptionPostCreate;
use Give\Subscriptions\LegacyListeners\DispatchGiveSubscriptionPreCreate;
<<<<<<< HEAD
use Give\Subscriptions\ListTable\SubscriptionsListTable;
use Give\Subscriptions\Migrations\AddPaymentModeToSubscriptionTable;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Subscriptions\Migrations\CreateSubscriptionTables;
use Give\Subscriptions\Repositories\SubscriptionRepository;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        give()->singleton('subscriptions', SubscriptionRepository::class);
<<<<<<< HEAD
        give()->singleton(SubscriptionsListTable::class, function() {
            $listTable = new SubscriptionsListTable();
            Hooks::doAction('givewp_subscriptions_list_table', $listTable);

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
<<<<<<< HEAD
        $this->registerMigrations();

        $userId = get_current_user_id();
        $showLegacy = get_user_meta($userId, '_give_subscriptions_archive_show_legacy', true);
        // only register new admin page if user hasn't chosen to use the old one
        if (empty($showLegacy) && SubscriptionsAdminPage::isShowing()) {
            Hooks::addAction('admin_enqueue_scripts', SubscriptionsAdminPage::class, 'loadScripts');
        } elseif (SubscriptionsAdminPage::isShowing()) {
            Hooks::addAction('admin_head', SubscriptionsAdminPage::class, 'renderReactSwitch');
        }
=======

        give(MigrationsRegister::class)->addMigration(CreateSubscriptionTables::class);
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Legacy Listeners
     *
     * @since 2.19.6
     */
    private function bootLegacyListeners()
    {
        Hooks::addAction('givewp_subscription_creating', DispatchGiveSubscriptionPreCreate::class);
        Hooks::addAction('givewp_subscription_created', DispatchGiveSubscriptionPostCreate::class);
    }
<<<<<<< HEAD

    /**
     * Registers database migrations with the MigrationsRunner
     *
     * @since 2.24.0
     */
    private function registerMigrations()
    {
        /** @var MigrationsRegister $register */
        $register = give(MigrationsRegister::class);
        $register->addMigrations([
            CreateSubscriptionTables::class,
            AddPaymentModeToSubscriptionTable::class,
        ]);
    }
=======
>>>>>>> fb785cbb (Initial commit)
}
