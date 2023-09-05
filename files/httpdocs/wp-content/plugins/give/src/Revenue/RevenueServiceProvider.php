<?php

namespace Give\Revenue;

use Give\Framework\Migrations\MigrationsRegister;
use Give\Helpers\Hooks;
use Give\Revenue\Listeners\DeleteRevenueWhenDonationDeleted;
<<<<<<< HEAD
use Give\Revenue\Listeners\UpdateRevenueWhenDonationAmountUpdated;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Revenue\Migrations\AddPastDonationsToRevenueTable;
use Give\Revenue\Migrations\CreateRevenueTable;
use Give\Revenue\Migrations\RemoveRevenueForeignKeys;
use Give\ServiceProviders\ServiceProvider;

class RevenueServiceProvider implements ServiceProvider
{
    /**
     * @inheritDoc
     *
     * @since 2.9.0
     */
    public function register()
    {
        global $wpdb;

        $wpdb->give_revenue = "{$wpdb->prefix}give_revenue";
    }

    /**
     * @inheritDoc
     *
     * @since 2.9.0
     */
    public function boot()
    {
        $this->registerMigrations();

        Hooks::addAction('delete_post', DeleteRevenueWhenDonationDeleted::class, '__invoke', 10, 1);
        Hooks::addAction('give_insert_payment', DonationHandler::class, 'handle', 999, 1);
        Hooks::addAction('give_register_updates', AddPastDonationsToRevenueTable::class, 'register', 10, 1);
<<<<<<< HEAD
        Hooks::addAction('give_updated_edited_donation', UpdateRevenueWhenDonationAmountUpdated::class);
=======
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Registers database migrations with the MigrationsRunner
     */
    private function registerMigrations()
    {
        /** @var MigrationsRegister $register */
        $register = give(MigrationsRegister::class);

        $register->addMigrations(
            [
                CreateRevenueTable::class,
                RemoveRevenueForeignKeys::class,
            ]
        );
    }
}
