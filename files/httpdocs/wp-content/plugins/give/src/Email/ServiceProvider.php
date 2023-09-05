<?php

namespace Give\Email;

<<<<<<< HEAD
use Give\Email\Notifications\DonationProcessingReceipt;
use Give\Helpers\Hooks;
use Give_Email_Notification;
=======
use Give\Helpers\Hooks;
>>>>>>> fb785cbb (Initial commit)

/**
 * @since 2.17.1
 */
class ServiceProvider implements \Give\ServiceProviders\ServiceProvider
{

    /**
     * @inheritDoc
     */
    public function register()
    {
    }

    /**
     * @inheritDoc
     */
    public function boot()
    {
<<<<<<< HEAD
        Hooks::addFilter('give_email_notifications', self::class, 'loadEmailNotifications');
        Hooks::addAction('admin_init', GlobalSettingValidator::class);
    }

    /**
     * @since 2.24.0
     *
     * @param Give_Email_Notification[] $emails
     *
     * @return Give_Email_Notification[]
     */
    public function loadEmailNotifications(array $emails): array
    {
        array_splice($emails, 2, 0, [DonationProcessingReceipt::get_instance()]);

        return $emails;
    }
=======
        Hooks::addAction('admin_init', GlobalSettingValidator::class);
    }
>>>>>>> fb785cbb (Initial commit)
}
