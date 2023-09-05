<?php

namespace Give\Donors\Factories;

use Give\Framework\Models\Factories\ModelFactory;
<<<<<<< HEAD
use Give\Framework\Support\ValueObjects\Money;
=======
>>>>>>> fb785cbb (Initial commit)

class DonorFactory extends ModelFactory
{
    /**
     * @since 2.19.6
<<<<<<< HEAD
     */
    public function definition(): array
=======
     *
     * @return array
     */
    public function definition()
>>>>>>> fb785cbb (Initial commit)
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'name' => trim("$firstName $lastName"),
<<<<<<< HEAD
            'email' => $this->faker->email,
            'totalAmountDonated' => new Money(0, 'USD'),
            'totalNumberOfDonations' => 0
=======
            'email' => $this->faker->email
>>>>>>> fb785cbb (Initial commit)
        ];
    }
}
