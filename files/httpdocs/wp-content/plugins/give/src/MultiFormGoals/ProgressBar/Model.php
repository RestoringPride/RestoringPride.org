<?php

namespace Give\MultiFormGoals\ProgressBar;

use Give\ValueObjects\Money;

class Model
{

    // Settings
    protected $ids;
    protected $tags;
    protected $categories;
    protected $goal;
    protected $enddate;
    protected $color;

    // Internal
    protected $forms = [];
    protected $donationRevenueResults;

    /**
     * Constructs and sets up setting variables for a new Progress Bar model
     *
     * @since 2.9.0
     **@param array $args Arguments for new Progress Bar, including 'ids'
     */
    public function __construct(array $args)
    {
        isset($args['ids']) ? $this->ids = $args['ids'] : $this->ids = [];
        isset($args['tags']) ? $this->tags = $args['tags'] : $this->tags = [];
        isset($args['categories']) ? $this->categories = $args['categories'] : $this->categories = [];
        isset($args['goal']) ? $this->goal = $args['goal'] : $this->goal = '1000';
        isset($args['enddate']) ? $this->enddate = $args['enddate'] : $this->enddate = '';
        isset($args['color']) ? $this->color = $args['color'] : $this->color = '#28c77b';
    }

    /**
     * Get forms associated with Progress Bar
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getForms(): array
=======
     **@return array
     */
    protected function getForms()
>>>>>>> fb785cbb (Initial commit)
    {
        if ( ! empty($this->forms)) {
            return $this->forms;
        }

        $query_args = [
            'post_type' => 'give_forms',
            'post_status' => 'publish',
            'post__in' => $this->ids,
            'posts_per_page' => -1,
            'fields' => 'ids',
            'tax_query' => [
                'relation' => 'AND',
            ],
        ];

        if ( ! empty($this->tags)) {
            $query_args['tax_query'][] = [
                'taxonomy' => 'give_forms_tag',
                'terms' => $this->tags,
            ];
        }

        if ( ! empty($this->categories)) {
            $query_args['tax_query'][] = [
                'taxonomy' => 'give_forms_category',
                'terms' => $this->categories,
            ];
        }

        $query = new \WP_Query($query_args);

        if ($query->posts) {
            $this->forms = $query->posts;

            return $query->posts;
        } else {
            return false;
        }
    }

<<<<<<< HEAD
    /**
     * @since 2.9.0
     */
    public function getDonations(): array
=======
    protected function getDonations()
>>>>>>> fb785cbb (Initial commit)
    {
        $query_args = [
            'post_status' => [
                'publish',
                'give_subscription',
            ],
            'number' => -1,
            'give_forms' => $this->getForms(),
        ];
        $query = new \Give_Payments_Query($query_args);

        return $query->get_payments();
    }

    /**
     * Get output markup for Progress Bar
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getOutput(): string
=======
     **@return string
     */
    public function getOutput()
>>>>>>> fb785cbb (Initial commit)
    {
        ob_start();
        $output = '';
        require $this->getTemplatePath();
<<<<<<< HEAD
        return ob_get_clean();
=======
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Returns query results for Donation Revenue.
     * @since 2.9.0
     * @return stdClass seem MultiFormGoals/ProgressBar/Query.php
     */
<<<<<<< HEAD
    public function getDonationRevenueResults()
=======
    protected function getDonationRevenueResults()
>>>>>>> fb785cbb (Initial commit)
    {
        if ( ! $this->donationRevenueResults) {
            $query = new Query($this->getForms());
            $this->donationRevenueResults = $query->getResults();
        }

        return $this->donationRevenueResults;
    }

    /**
     * Get raw earnings value for Progress Bar
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getTotal(): string
=======
     **@return string
     */
    protected function getTotal()
>>>>>>> fb785cbb (Initial commit)
    {
        $query = new Query($this->getForms());
        $results = $query->getResults();

        return Money::ofMinor($results->total, give_get_option('currency'))->getAmount();
    }

    /**
     * Get number of donations for Progress Bar
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getDonationCount(): int
=======
     **@return int
     */
    protected function getDonationCount()
>>>>>>> fb785cbb (Initial commit)
    {
        $results = $this->getDonationRevenueResults();

        return $results->count;
    }

    /**
     * Get formatted total remaining (ex: $75)
     *
     * @since 2.9.0
     */
    protected function getFormattedTotalRemaining()
    {
        $total_remaining = ($this->getGoal() - $this->getTotal()) > 0 ? ($this->getGoal() - $this->getTotal()) : 0;

        return give_currency_filter(
            give_format_amount(
                $total_remaining,
                [
                    'sanitize' => false,
                    'decimal' => false,
                ]
            )
        );
    }

    /**
     * Get goal for Progress Bar
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getGoal(): string
=======
     **@return string
     */
    protected function getGoal()
>>>>>>> fb785cbb (Initial commit)
    {
        return $this->goal;
    }

    /**
     * Get goal color for Progress Bar
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getColor(): string
=======
     **@return string
     */
    protected function getColor()
>>>>>>> fb785cbb (Initial commit)
    {
        return $this->color;
    }

    /**
     * Get template path for Progress Bar component template
     * @since 2.9.0
     **/
    public function getTemplatePath()
    {
        return GIVE_PLUGIN_DIR . '/src/MultiFormGoals/resources/views/progressbar.php';
    }

<<<<<<< HEAD
    /**
     * @since 2.24.0
     *
     * @return mixed|string
     */
    public function getFormattedTotal()
=======
    protected function getFormattedTotal()
>>>>>>> fb785cbb (Initial commit)
    {
        return give_currency_filter(
            give_format_amount(
                $this->getTotal(),
                [
                    'sanitize' => false,
                    'decimal' => false,
                ]
            )
        );
    }

<<<<<<< HEAD
    /**
     * @since 2.24.0
     *
     * @return mixed|string
     */
    public function getFormattedGoal()
=======
    protected function getFormattedGoal()
>>>>>>> fb785cbb (Initial commit)
    {
        return give_currency_filter(
            give_format_amount(
                $this->getGoal(),
                [
                    'sanitize' => false,
                    'decimal' => false,
                ]
            )
        );
    }

    /**
     * Get end date for Progress Bar
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getEndDate(): string
=======
     **@return string
     */
    protected function getEndDate()
>>>>>>> fb785cbb (Initial commit)
    {
        return $this->enddate;
    }

    /**
     * Get minutes remaining before Progress Bar end date
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getMinutesRemaining(): string
=======
     **@return string
     */
    protected function getMinutesRemaining()
>>>>>>> fb785cbb (Initial commit)
    {
        $enddate = strtotime($this->getEndDate());
        if ($enddate) {
            $now = current_time('timestamp', false);

            return $now < $enddate ? ($enddate - $now) / 60 : 0;
        } else {
            return false;
        }
    }

    /**
     * Get time remaining before Progress Bar end date
     *
     * @since 2.9.0
<<<<<<< HEAD
     *
     * @return float|int
     */
    public function getTimeToGo()
    {
        $minutes = $this->getMinutesRemaining();

=======
     **@return string
     */
    protected function getTimeToGo()
    {
        $minutes = $this->getMinutesRemaining();
>>>>>>> fb785cbb (Initial commit)
        switch ($minutes) {
            case $minutes > 1440:
            {
                return round($minutes / 1440);
            }
            case $minutes < 1440 && $minutes > 60:
            {
                return round($minutes / 60);
            }
            case $minutes < 60:
            {
                return round($minutes);
            }
<<<<<<< HEAD
            default:
            {
                return 0;
            }
=======
>>>>>>> fb785cbb (Initial commit)
        }
    }

    /**
     * Get time remaining before Progress Bar end date
     *
     * @since 2.9.0
<<<<<<< HEAD
     */
    public function getTimeToGoLabel(): string
    {
        $minutes = $this->getMinutesRemaining();

=======
     **@return string
     */
    protected function getTimeToGoLabel()
    {
        $minutes = $this->getMinutesRemaining();
>>>>>>> fb785cbb (Initial commit)
        switch ($minutes) {
            case $minutes > 1440:
            {
                return _n('day to go', 'days to go', $this->getTimeToGo(), 'give');
            }
            case $minutes < 1440 && $minutes > 60:
            {
                return _n('hour to go', 'hours to go', $this->getTimeToGo(), 'give');
            }
            case $minutes < 60:
            {
                return _n('minute to go', 'minutes to go', $this->getTimeToGo(), 'give');
            }
<<<<<<< HEAD
            default:
                return '';
=======
>>>>>>> fb785cbb (Initial commit)
        }
    }
}
