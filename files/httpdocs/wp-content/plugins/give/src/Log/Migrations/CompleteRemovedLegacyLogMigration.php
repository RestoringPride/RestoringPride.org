<?php

namespace Give\Log\Migrations;

use Give\Framework\Migrations\Contracts\Migration;

/**
 * @since 2.21.2
 */
class CompleteRemovedLegacyLogMigration extends Migration
{
    /**
     * @since 2.21.2
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'complete-removed-legacy-log-migration';
    }

    /**
     * @since 2.21.2
     * @inheritdoc
     */
    public static function timestamp()
    {
        return strtotime('2022-06-16');
    }

    /**
     * @since 2.21.2
     * @inheritdoc
     */
    public static function title()
    {
<<<<<<< HEAD
        return esc_html__('Remove legacy Log table', 'give');
=======
        return esc_html__('Complete Removed Legacy Log Migration', 'give');
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * @since 2.21.2
     * @inheritdoc
     */
    public function run()
    {
        give_set_upgrade_complete('v20_logs_upgrades');
    }
}
