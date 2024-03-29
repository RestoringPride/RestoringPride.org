<?php

namespace Give\PaymentGateways\Gateways\TestGateway;

use Give\Donations\Models\Donation;
use Give\Donations\Models\DonationNote;
use Give\Donations\ValueObjects\DonationStatus;
use Give\Framework\Exceptions\Primitives\Exception;
use Give\Framework\Http\Response\Types\RedirectResponse;
<<<<<<< HEAD
use Give\Framework\PaymentGateways\Commands\GatewayCommand;
use Give\Framework\PaymentGateways\Commands\RedirectOffsite;
use Give\Framework\PaymentGateways\PaymentGateway;
use Give\Helpers\Form\Utils as FormUtils;
use Give\PaymentGateways\Gateways\PayPalStandard\Actions\GenerateDonationReceiptPageUrl;
use Give\PaymentGateways\Gateways\TestGateway\Views\LegacyFormFieldMarkup;

use Give\Subscriptions\Models\Subscription;

use Give\Subscriptions\ValueObjects\SubscriptionStatus;

=======
use Give\Framework\PaymentGateways\Commands\RedirectOffsite;
use Give\Framework\PaymentGateways\Exceptions\PaymentGatewayException;
use Give\Framework\PaymentGateways\PaymentGateway;
use Give\Helpers\Form\Utils as FormUtils;
use Give\PaymentGateways\Gateways\TestGateway\Views\LegacyFormFieldMarkup;

>>>>>>> fb785cbb (Initial commit)
use function Give\Framework\Http\Response\response;

/**
 * Class TestGatewayOffsite
 * @since 2.18.0
 */
class TestGatewayOffsite extends PaymentGateway
{
    /**
     * @inheritDoc
     */
<<<<<<< HEAD
=======
    public $routeMethods = [
        'returnFromOffsiteRedirect'
    ];

    /**
     * @inheritDoc
     */
>>>>>>> fb785cbb (Initial commit)
    public $secureRouteMethods = [
        'securelyReturnFromOffsiteRedirect'
    ];

    /**
     * @inheritDoc
     */
    public static function id(): string
    {
        return 'test-gateway-offsite';
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return self::id();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return __('Test Gateway Offsite', 'give');
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMethodLabel(): string
    {
        return __('Test Gateway Offsite', 'give');
    }

    /**
     * @inheritDoc
     */
    public function getLegacyFormFieldMarkup(int $formId, array $args): string
    {
        if (FormUtils::isLegacyForm($formId)) {
            return false;
        }

        /** @var LegacyFormFieldMarkup $legacyFormFieldMarkup */
        $legacyFormFieldMarkup = give(LegacyFormFieldMarkup::class);

        return $legacyFormFieldMarkup();
    }

    /**
     * @inheritDoc
     */
    public function createPayment(Donation $donation, $gatewayData = null)
    {
        $redirectUrl = $this->generateSecureGatewayRouteUrl(
            'securelyReturnFromOffsiteRedirect',
            $donation->id,
            ['give-donation-id' => $donation->id]
        );

        return new RedirectOffsite($redirectUrl);
    }

<<<<<<< HEAD
    public function createSubscription(
        Donation $donation,
        Subscription $subscription,
        $gatewayData = null
    ): GatewayCommand {
        $redirectUrl = $this->generateSecureGatewayRouteUrl(
            'securelyReturnFromOffsiteRedirect',
            $donation->id,
            [
                'give-donation-id' => $donation->id,
                'give-subscription-id' => $subscription->id,
            ]
        );

        return new RedirectOffsite($redirectUrl);
=======
    /**
     * An example of using a routeMethod for extending the Gateway API to handle a redirect.
     *
     * @since 2.21.0 update to use Donation model
     * @since 2.19.0
     *
     * @param array $queryParams
     *
     * @return RedirectResponse
     * @throws Exception
     * @throws PaymentGatewayException
     */
    protected function returnFromOffsiteRedirect(array $queryParams): RedirectResponse
    {
        $donation = Donation::find($queryParams['give-donation-id']);

        $this->updateDonation($donation);

        return response()->redirectTo(give_get_success_page_uri());
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * An example of using a secureRouteMethod for extending the Gateway API to handle a redirect.
     *
     * @since 2.21.0 update to use Donation model
     * @since 2.19.0
     *
     * @param array $queryParams
     *
     * @return RedirectResponse
     * @throws Exception
     */
    protected function securelyReturnFromOffsiteRedirect(array $queryParams): RedirectResponse
    {
        $donation = Donation::find($queryParams['give-donation-id']);

        $this->updateDonation($donation);

<<<<<<< HEAD
        if ( $donation->type->isSubscription() ) {
            $subscription = Subscription::find($queryParams['give-subscription-id']);
            $this->updateSubscription($subscription);
        }

        return response()->redirectTo((new GenerateDonationReceiptPageUrl())($donation->id));
    }

    /**
     * @since 2.20.0
     * @inerhitDoc
     * @throws Exception
     */
    public function refundDonation(Donation $donation)
    {
        $donation->status = DonationStatus::REFUNDED();
        $donation->save();
=======
        return response()->redirectTo(give_get_success_page_uri());
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * @param Donation $donation
     *
     * @return void
     * @throws Exception
     */
    private function updateDonation(Donation $donation)
    {
        $donation->status = DonationStatus::COMPLETE();
        $donation->gatewayTransactionId = "test-gateway-transaction-id";
        $donation->save();

        DonationNote::create([
            'donationId' => $donation->id,
            'content' => 'Donation Completed from Test Gateway Offsite.'
        ]);
    }

    /**
<<<<<<< HEAD
     * @since 2.23.0
     *
     * @return void
     */
    private function updateSubscription(Subscription $subscription)
    {
        $subscription->status = SubscriptionStatus::ACTIVE();
        $subscription->transactionId = "test-gateway-transaction-id";
        $subscription->save();
=======
     * @since 2.20.0
     * @inerhitDoc
     * @throws Exception
     */
    public function refundDonation(Donation $donation)
    {
        throw new Exception('Method has not been implemented yet. Please use the legacy method in the meantime.');
>>>>>>> fb785cbb (Initial commit)
    }
}
