<<<<<<< HEAD
=======
import accounting from 'accounting';

>>>>>>> fb785cbb (Initial commit)
/**
 * @since 2.17.0
 */
window.GiveDonationSummary = {
    init: function () {
        GiveDonationSummary.initAmount();
        GiveDonationSummary.initFrequency();
<<<<<<< HEAD
=======
        GiveDonationSummary.initFees();
>>>>>>> fb785cbb (Initial commit)
        GiveDonationSummary.initTotal();
    },

    /**
<<<<<<< HEAD
     * This function returns formated donation amount.
     *
     * @since 2.23.1
     * @return {string}
     */
    getFormattedDonationAmount: function ($form) {
        const unFormattedAmount = Give.fn.unFormatCurrency(
            $form.find('[name="give-amount"]').val(),
            Give.form.fn.getInfo('decimal_separator', $form)
        );

        return Give.fn.formatCurrency(
            unFormattedAmount,
            {symbol: Give.form.fn.getInfo('currency_symbol', $form)},
            $form
        );
    },

    /**
     * @since 2.17.0
     *
     * @since 2.24.0 add eventlistner for custom input amount changes.
     */
    initAmount: function () {
        GiveDonationSummary.observe('[name="give-amount"]', function (targetNode, $form) {
            $form.find('[data-tag="amount"]').html(GiveDonationSummary.getFormattedDonationAmount($form));
        });

        const targetNode = document.querySelector('[name="give-amount"]');
        if (targetNode) {
            const $form = jQuery(targetNode.closest('.give-form'));

            targetNode.addEventListener('change', function () {
                $form.find('[data-tag="amount"]').html(GiveDonationSummary.getFormattedDonationAmount($form));
            });
        }
=======
     * @since 2.17.0
     */
    initAmount: function () {
        GiveDonationSummary.observe('[name="give-amount"]', function (targetNode, $form) {
            $form.find('[data-tag="amount"]').html(GiveDonationSummary.format_amount(targetNode.value, $form));
        });
>>>>>>> fb785cbb (Initial commit)
    },

    /**
     * Recurring frequency
     *
     * @since 2.17.0
     */
    initFrequency: function () {
        // Donor's Choice Recurring
        GiveDonationSummary.observe(
            '[name="give-recurring-period"]',
            GiveDonationSummary.handleDonorsChoiceRecurringFrequency
        );

        // Admin Defined Recurring
        GiveDonationSummary.observe('[name="give-price-id"]', GiveDonationSummary.handleAdminDefinedRecurringFrequency);

        // Admin Defined Recurring - "Set Donation"
        GiveDonationSummary.observe(
            '[name="_give_is_donation_recurring"]',
            GiveDonationSummary.handleAdminDefinedSetDonationFrequency
        );

        // Admin Defined Recurring - "Multi-level"
        GiveDonationSummary.observe('[name="give-price-id"]', GiveDonationSummary.handleAdminDefinedRecurringFrequency);
    },

    /**
     * @since 2.18.0
     */
    handleDonorsChoiceRecurringFrequency: function (targetNode, $form) {
        $form.find('.js-give-donation-summary-frequency-help-text').toggle(!targetNode.checked);
        $form.find('[data-tag="frequency"]').toggle(!targetNode.checked);
        $form.find('[data-tag="recurring"]').toggle(targetNode.checked).html(targetNode.dataset['periodLabel']);

        // Donor's Choice Period
        const donorsChoice = document.querySelector('[name="give-recurring-period-donors-choice"]');
        if (donorsChoice) {
            const donorsChoiceValue = donorsChoice.options[donorsChoice.selectedIndex].value || false;
            if (donorsChoiceValue) {
                $form
                    .find('[data-tag="recurring"]')
                    .html(GiveDonationSummaryData.recurringLabelLookup[donorsChoiceValue]);
            }
        }
    },

    /**
     * @since 2.18.0
     */
    handleAdminDefinedRecurringFrequency: function (targetNode, $form) {
        const priceID = targetNode.value;
        const recurringDetailsEl = document.querySelector('.give_recurring_donation_details');

        if (!recurringDetailsEl) {
            return;
        }

        const recurringDetails = JSON.parse(recurringDetailsEl.value);

        if ('undefined' !== typeof recurringDetails['multi']) {
            const isRecurring = 'yes' === recurringDetails['multi'][priceID]['_give_recurring'];
            const periodLabel = recurringDetails['multi'][priceID]['give_recurring_pretty_text'];

            $form.find('.js-give-donation-summary-frequency-help-text').toggle(!isRecurring);
            $form.find('[data-tag="frequency"]').toggle(!isRecurring);
            $form.find('[data-tag="recurring"]').toggle(isRecurring).html(periodLabel);
        }
    },

    handleAdminDefinedSetDonationFrequency: function (targetNode, $form) {
        const isRecurring = targetNode.value;
        const adminChoice = document.querySelector('.give-recurring-admin-choice');

        if (isRecurring && adminChoice) {
            $form.find('.js-give-donation-summary-frequency-help-text').toggle(!isRecurring);
            $form.find('[data-tag="frequency"]').toggle(!isRecurring);
            $form.find('[data-tag="recurring"]').html(adminChoice.textContent);
        }
    },

    /**
<<<<<<< HEAD
     * @since 2.23.1 Remove dependency on checkbox. Removed first argument.
     * @since 2.18.0
     */
    handleFees: function ($form) {
        const feeModeEnableElement = $form.find('[name="give-fee-mode-enable"]');

        if (!feeModeEnableElement || 'true' !== $form.find('[name="give-fee-mode-enable"]').val()) {
            $form.find('.js-give-donation-summary-fees').toggle(false);
            return;
        }

        $form.find('.js-give-donation-summary-fees').toggle(true);

        const feeMessageTemplateParts = $form.find('.give-fee-message-label').attr('data-feemessage').split(' ');
        const feeMessageParts = $form.find('.give-fee-message-label-text').text().split(' ');
        const formattedFeeAmount = feeMessageParts
            .filter((messagePart) => !feeMessageTemplateParts.includes(messagePart))
            .pop();
        $form.find('[data-tag="fees"]').html(formattedFeeAmount);
=======
     * @since 2.17.0
     */
    initFees: function () {
        GiveDonationSummary.observe('.give_fee_mode_checkbox', GiveDonationSummary.handleFees);
    },

    /**
     * @since 2.18.0
     */
    handleFees: function (targetNode, $form) {
        $form.find('.fee-break-down-message').hide();
        $form.find('.js-give-donation-summary-fees').toggle(targetNode.checked);

        if (!targetNode.checked) {
            return;
        }

        // Hack: (Currency Switcher) The total is always stored using a the decimal separator as set by the primary currency.
        const formData = new FormData($form[0]);
        const fee = formData.get('give-fee-amount');
        $form.find('[data-tag="fees"]').html(GiveDonationSummary.format_amount(fee, $form));
>>>>>>> fb785cbb (Initial commit)
    },

    /**
     * @since 2.17.0
     */
    initTotal: function () {
        GiveDonationSummary.observe('.give-final-total-amount', function (targetNode, $form) {
<<<<<<< HEAD
            $form.find('[data-tag="total"]').html(targetNode.textContent);

            GiveDonationSummary.handleFees($form);
        });

        // Force an initial mutation for the Total Amount observer
        const totalAmount = document.querySelector('.give-final-total-amount');
        if (totalAmount) {
            totalAmount.textContent = totalAmount.textContent;
=======
            // Hack: (Currency Switcher) The total is always stored using a the decimal seperator as set by the primary currency.
            const total = targetNode.dataset.total.replace('.', Give.form.fn.getInfo('decimal_separator', $form));
            $form.find('[data-tag="total"]').html(GiveDonationSummary.format_amount(total, $form));
        });

        // Hack: Force an initial mutation for the Total Amount observer
        const totalAmount = document.querySelector('.give-final-total-amount');
        if (totalAmount) {
            totalAmount.dataset.total = totalAmount.dataset.total;
>>>>>>> fb785cbb (Initial commit)
        }
    },

    /**
<<<<<<< HEAD
     * Placeholder callback, which is only used when the gateway changes.
=======
     * Hack: Placeholder callback, which is only used when the gateway changes.
>>>>>>> fb785cbb (Initial commit)
     */
    handleNavigateBack: function () {},

    /**
<<<<<<< HEAD
     * Changing gateways re-renders parts of the form via AJAX.
=======
     * Hack: Changing gateways re-renders parts of the form via AJAX.
>>>>>>> fb785cbb (Initial commit)
     */
    onGatewayLoadSuccess: function () {
        const inserted = jQuery('#give_purchase_form_wrap .give-donation-summary-section').detach();
        if (inserted.length) {
            jQuery('.give-donation-summary-section').remove();
            inserted.appendTo('#donate-fieldset');
            GiveDonationSummary.initTotal();

            // Overwrite the handler because updating the gateway breaks the original binding.
            GiveDonationSummary.handleNavigateBack = function (e) {
                e.stopPropagation();
                e.preventDefault();
                window.formNavigator.back();
            };
        }
    },

    /**
     * Observe an element and respond to changes to that element.
     *
     * @since 2.17.0
     *
     * @param {string} selectors
     * @param {callable} callback
     * @param {boolean} callImmediately
     */
    observe: function (selectors, callback, callImmediately = true) {
        const targetNode = document.querySelector(selectors);

        if (!targetNode) return;

        const $form = jQuery(targetNode.closest('.give-form'));

        new MutationObserver(function (mutationsList) {
            for (const mutation of mutationsList) {
                // Use traditional 'for loops' for IE 11
                if (mutation.type === 'attributes') {
                    /**
                     * @param targetNode The node matching the element as defined by the specific selectors
                     * @param $form The closest `.give-form` node to the targetNode, wrapped in jQuery
                     */
                    callback(mutation.target, $form);
                }
            }
        }).observe(targetNode, {attributes: true});

        if (callImmediately) {
            callback(targetNode, $form);
        }
    },
<<<<<<< HEAD
=======

    /**
     * Helper function to get the formatted amount
     *
     * @since 2.17.0
     *
     * @param {string/number} amount
     * @param {jQuery} $form
     */
    format_amount: function (amount, $form) {
        // Normalize amounts to JS number format
        amount = amount
            .replace(Give.form.fn.getInfo('thousands_separator', $form), '')
            .replace(Give.form.fn.getInfo('decimal_separator', $form), '.');

        const currency = Give.form.fn.getInfo('currency_code', $form);
        const precision = GiveDonationSummaryData.currencyPrecisionLookup[currency];

        // Format with accounting.js, according to the configuration
        return accounting.formatMoney(amount, {
            symbol: Give.form.fn.getInfo('currency_symbol', $form),
            format: 'before' === Give.form.fn.getInfo('currency_position', $form) ? '%s%v' : '%v%s',
            decimal: Give.form.fn.getInfo('decimal_separator', $form),
            thousand: Give.form.fn.getInfo('thousands_separator', $form),
            precision: precision,
        });
    },
>>>>>>> fb785cbb (Initial commit)
};

jQuery(document).on('give:postInit', GiveDonationSummary.init);
jQuery(document).on('Give:onGatewayLoadSuccess', GiveDonationSummary.onGatewayLoadSuccess);
