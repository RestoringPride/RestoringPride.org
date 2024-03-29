<?php

namespace Give\Promotions\InPluginUpsells;

use DateTimeImmutable;
use DateTimeZone;
<<<<<<< HEAD
use Exception;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Framework\Shims\Shim;

/**
 * @since 2.17.0
 */
class SaleBanners
{
    /**
     * @var string
     */
    private $optionName = 'give_hidden_sale_banners';

    /**
     * @var array
     */
    private $hiddenBanners;

<<<<<<< HEAD
    /**
     * @since 2.17.0
     */
=======
>>>>>>> fb785cbb (Initial commit)
    public function __construct()
    {
        $this->hiddenBanners = get_option($this->optionName, []);
    }

    /**
     * Get banners definitions
     *
<<<<<<< HEAD
     * @since 2.23.2 add Giving Tuesday 2022 banner
     * @since 2.17.0
     *
     * @note id must be unique for each definition
     */
    public function getBanners(): array
=======
     * @note id must be unique for each definition
     *
     * @return array[]
     */
    public function getBanners()
>>>>>>> fb785cbb (Initial commit)
    {
        return [
            [
                'id' => 'bfgt2021',
                'iconURL' => GIVE_PLUGIN_URL . 'assets/dist/images/admin/sale-icon.png',
                'accessibleLabel' => __('Black Friday/Giving Tuesday Sale', 'give'),
                'leadText' => __('Save 40% on all Plans for a limited time.', 'give'),
                'contentText' => __('Black Friday through Giving Tuesday.', 'give'),
                'actionText' => __('Shop Now', 'give'),
                'actionURL' => 'https://go.givewp.com/bfgt21',
                'startDate' => '2021-11-26 00:00',
                'endDate' => '2021-11-30 23:59',
            ],
<<<<<<< HEAD
            [
                'id' => 'bfgt2022',
                'iconURL' => GIVE_PLUGIN_URL . 'assets/dist/images/admin/sale-icon.png',
                'accessibleLabel' => __('Black Friday/Giving Tuesday Sale', 'give'),
                'leadText' => __('Save 40% on all Plans for a limited time.', 'give'),
                'contentText' => __('Black Friday through Giving Tuesday.', 'give'),
                'actionText' => __('Shop Now', 'give'),
                'actionURL' => 'https://go.givewp.com/bf22',
                'startDate' => '2022-11-01 00:00',
                'endDate' => '2022-11-29 23:59',
            ],
=======
>>>>>>> fb785cbb (Initial commit)
        ];
    }

    /**
     * Get the banners that should be displayed.
     *
<<<<<<< HEAD
     * @since 2.17.0
     */
    public function getVisibleBanners(): array
=======
     * @return array[]
     */
    public function getVisibleBanners()
>>>>>>> fb785cbb (Initial commit)
    {
        $currentDateTime = current_datetime();
        $currentUserId = get_current_user_id();
        $giveWPWebsiteTimezone = new DateTimeZone('America/Los_Angeles');

        return array_filter(
            $this->getBanners(),
            function ($banner) use ($currentDateTime, $currentUserId, $giveWPWebsiteTimezone) {
<<<<<<< HEAD
                $isHidden = in_array($banner['id'] . $currentUserId, $this->hiddenBanners, true);

                try {
                    $isFuture = $currentDateTime < new DateTimeImmutable($banner['startDate'], $giveWPWebsiteTimezone);
                    $isPast = $currentDateTime > new DateTimeImmutable($banner['endDate'], $giveWPWebsiteTimezone);
                } catch(Exception $exception) {
                    return false;
                }

                return !($isHidden || $isFuture || $isPast);
=======
                $isHidden = in_array($banner['id'] . $currentUserId, $this->hiddenBanners);
                $isFuture = $currentDateTime < new DateTimeImmutable($banner['startDate'], $giveWPWebsiteTimezone);
                $isPast = $currentDateTime > new DateTimeImmutable($banner['endDate'], $giveWPWebsiteTimezone);

                return ! ($isHidden || $isFuture || $isPast);
>>>>>>> fb785cbb (Initial commit)
            }
        );
    }

    /**
<<<<<<< HEAD
     * Marks the given banner id as hidden for the current user so it will not display again.
     *
     * @since 2.17.0
     *
     * @return void
     */
    public function hideBanner(string $banner)
=======
     * @param string $banner
     */
    public function hideBanner($banner)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->hiddenBanners[] = $banner;

        update_option(
            $this->optionName,
            array_unique($this->hiddenBanners)
        );
    }

    /**
     * Render admin page
<<<<<<< HEAD
     *
     * @since 2.17.0
=======
>>>>>>> fb785cbb (Initial commit)
     */
    public function render()
    {
        $banners = $this->getVisibleBanners();

<<<<<<< HEAD
        if (!empty($banners)) {
=======
        if ( ! empty($banners)) {
>>>>>>> fb785cbb (Initial commit)
            include __DIR__ . '/resources/views/sale-banners.php';
        }
    }

    /**
     * Load scripts
<<<<<<< HEAD
     *
     * @since 2.17.0
=======
>>>>>>> fb785cbb (Initial commit)
     */
    public function loadScripts()
    {
        wp_enqueue_script(
            'give-in-plugin-upsells-sale-banners',
            GIVE_PLUGIN_URL . 'assets/dist/js/admin-upsell-sale-banner.js',
            [],
            GIVE_VERSION,
            true
        );

        wp_localize_script(
            'give-in-plugin-upsells-sale-banners',
            'GiveSaleBanners',
            [
                'apiRoot' => esc_url_raw(rest_url('give-api/v2/sale-banner')),
                'apiNonce' => wp_create_nonce('wp_rest'),
            ]
        );

<<<<<<< HEAD
        wp_enqueue_style('givewp-admin-fonts');
=======
        wp_enqueue_style(
            'give-in-plugin-upsells-sale-banners-font',
            'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap',
            [],
            null
        );
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Helper function to determine if the current page Give admin page
     *
<<<<<<< HEAD
     * @since 2.17.0
     */
    public static function isShowing(): bool
=======
     * @return bool
     */
    public static function isShowing()
>>>>>>> fb785cbb (Initial commit)
    {
        return isset($_GET['post_type']) && $_GET['post_type'] === 'give_forms';
    }
}
