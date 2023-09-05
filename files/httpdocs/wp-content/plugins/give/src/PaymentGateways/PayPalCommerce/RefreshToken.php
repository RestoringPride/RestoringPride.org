<?php

namespace Give\PaymentGateways\PayPalCommerce;

<<<<<<< HEAD
use Give\Framework\Exceptions\Primitives\Exception;
use Give\Log\Log;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\PaymentGateways\PayPalCommerce\Models\MerchantDetail;
use Give\PaymentGateways\PayPalCommerce\Repositories\MerchantDetails;
use Give\PaymentGateways\PayPalCommerce\Repositories\PayPalAuth;

/**
 * Class RefreshToken
 *
 * @since 2.9.0
 */
class RefreshToken
{
    /* @var MerchantDetail */
    private $merchantDetail;

    /**
     * @since 2.9.0
     *
     * @var MerchantDetails
     */
    private $detailsRepository;

    /**
     * @since 2.9.0
     *
     * @var PayPalAuth
     */
    private $payPalAuth;

    /**
<<<<<<< HEAD
     * This time reduced from token expiration time to refresh token before it expires.
     *
     * @since 2.25.0
     *
     * @var int $expirationTimeOffset Expiration time offset in seconds.
     */
    private $expirationTimeOffset = 1800; // 30 minutes

    /**
=======
>>>>>>> fb785cbb (Initial commit)
     * RefreshToken constructor.
     *
     * @since 2.9.0
     * @since 2.9.6 Add MerchantDetail constructor param.
     *
     * @param MerchantDetails $detailsRepository
<<<<<<< HEAD
     * @param PayPalAuth $payPalAuth
     * @param MerchantDetail $merchantDetail
=======
     * @param PayPalAuth      $payPalAuth
     * @param MerchantDetail  $merchantDetail
>>>>>>> fb785cbb (Initial commit)
     */
    public function __construct(
        MerchantDetails $detailsRepository,
        PayPalAuth $payPalAuth,
        MerchantDetail $merchantDetail
    ) {
        $this->detailsRepository = $detailsRepository;
        $this->payPalAuth = $payPalAuth;
        $this->merchantDetail = $merchantDetail;
    }

    /**
     * Return cron json name which uses to refresh token.
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    private function getCronJobHookName(): string
=======
     *
     * @return string
     */
    private function getCronJobHookName()
>>>>>>> fb785cbb (Initial commit)
    {
        return 'give_paypal_commerce_refresh_token';
    }

    /**
     * Register cron job to refresh access token.
     * Note: only for internal use.
     *
     * @since 2.9.0
     *
     * @param string $tokenExpires
     *
     */
    public function registerCronJobToRefreshToken($tokenExpires)
    {
<<<<<<< HEAD
        // Refresh token before half hours of expires date.
        wp_schedule_single_event(
            time() + ($tokenExpires - $this->expirationTimeOffset),
=======
        wp_schedule_single_event(
            time() + ($tokenExpires - 1800), // Refresh token before half hours of expires date.
>>>>>>> fb785cbb (Initial commit)
            $this->getCronJobHookName()
        );
    }

    /**
     * Delete cron job which refresh access token.
     * Note: only for internal use.
     *
     * @since 2.9.0
     *
     */
    public function deleteRefreshTokenCronJob()
    {
        wp_clear_scheduled_hook($this->getCronJobHookName());
    }

    /**
     * Refresh token.
     * Note: only for internal use
     *
<<<<<<< HEAD
     * @since 2.25.0 Handle exception. Refresh access token every 5 minute on faliure.
     * @since 2.9.6 Refresh token only if paypal merchant id exist.
     * @since 2.9.0
=======
     * @since 2.9.0
     * @since 2.9.6 Refresh token only if paypal merchant id exist.
>>>>>>> fb785cbb (Initial commit)
     */
    public function refreshToken()
    {
        // Exit if account is not connected.
<<<<<<< HEAD
        if (! $this->detailsRepository->accountIsConnected()) {
            return;
        }

        // Default expiration date of access token.
        // This is used when we are unable to get access token from PayPal.
        $expiresIn = $this->expirationTimeOffset - 1500; // 5 minutes

        try {
            $tokenDetails = $this->payPalAuth->getTokenFromClientCredentials(
                $this->merchantDetail->clientId,
                $this->merchantDetail->clientSecret
            );

            $this->merchantDetail->setTokenDetails($tokenDetails);
            $this->detailsRepository->save($this->merchantDetail);

            $expiresIn = $tokenDetails['expiresIn'];
        } catch (Exception $exception) {
            give(Log::class)->warning(
                'PayPal Commerce: Error refresh access token',
                [
                    'category' => 'Payment Gateway',
                    'source' => 'Paypal Commerce',
                    'exception' => $exception,
                ]
            );
        }

        $this->registerCronJobToRefreshToken($expiresIn);
=======
        if ( ! $this->detailsRepository->accountIsConnected()) {
            return;
        }

        $tokenDetails = $this->payPalAuth->getTokenFromClientCredentials(
            $this->merchantDetail->clientId,
            $this->merchantDetail->clientSecret
        );

        $this->merchantDetail->setTokenDetails($tokenDetails);
        $this->detailsRepository->save($this->merchantDetail);

        $this->registerCronJobToRefreshToken($tokenDetails['expiresIn']);
>>>>>>> fb785cbb (Initial commit)
    }
}
