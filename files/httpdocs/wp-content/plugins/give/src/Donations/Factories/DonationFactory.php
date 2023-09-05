<?php

namespace Give\Donations\Factories;

use Exception;
use Give\Donations\ValueObjects\DonationMode;
use Give\Donations\ValueObjects\DonationStatus;
<<<<<<< HEAD
use Give\Donations\ValueObjects\DonationType;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Donors\Models\Donor;
use Give\Framework\Models\Factories\ModelFactory;
use Give\Framework\Support\ValueObjects\Money;
use Give\PaymentGateways\Gateways\TestGateway\TestGateway;

class DonationFactory extends ModelFactory
{

    /**
<<<<<<< HEAD
     * @since 2.22.0 add optional support for anonymous and company properties
     * @since 2.20.0 update default donorId to create factory
     * @since 2.19.6
     *
     * @throws Exception
     */
    public function definition(): array
=======
     * @since 2.20.0 update default donorId to create factory
     * @since 2.19.6
     *
     * @return array
     * @throws Exception
     */
    public function definition()
>>>>>>> fb785cbb (Initial commit)
    {
        return [
            'status' => DonationStatus::PENDING(),
            'gatewayId' => TestGateway::id(),
            'mode' => DonationMode::TEST(),
<<<<<<< HEAD
            'type' => DonationType::SINGLE(),
=======
>>>>>>> fb785cbb (Initial commit)
            'amount' => new Money($this->faker->numberBetween(50, 50000), 'USD'),
            'donorId' => Donor::factory()->create()->id,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->email,
            'formId' => 1,
            'formTitle' => 'Form Title',
<<<<<<< HEAD
            'anonymous' => $this->faker->optional(0.5, false)->boolean(true),
            'company' => $this->faker->optional()->company
=======
>>>>>>> fb785cbb (Initial commit)
        ];
    }
}
