<?php

namespace Give\Donations\Factories;

use Give\Framework\Models\Factories\ModelFactory;

class DonationNoteFactory extends ModelFactory
{
    /**
<<<<<<< HEAD
     * @since 2.23.0 add array return type
     * @since 2.21.0
     */
    public function definition(): array
=======
     * @since 2.21.0
     *
     * @return array
     */
    public function definition()
>>>>>>> fb785cbb (Initial commit)
    {
        return [
            'donationId' => 1,
            'content' => $this->faker->text
        ];
    }
}
