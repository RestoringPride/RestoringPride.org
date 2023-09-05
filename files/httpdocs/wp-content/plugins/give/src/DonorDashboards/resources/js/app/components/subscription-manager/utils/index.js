<<<<<<< HEAD
import {store} from '../../../tabs/recurring-donations/store';
import {donorDashboardApi} from '../../../utils';
import {fetchSubscriptionsDataFromAPI} from '../../../tabs/recurring-donations/utils';
import {setError} from '../../../tabs/recurring-donations/store/actions';

export const updateSubscriptionWithAPI = ({id, amount, paymentMethod}) => {
    const {dispatch} = store;
=======
import {donorDashboardApi} from '../../../utils';
import {fetchSubscriptionsDataFromAPI} from '../../../tabs/recurring-donations/utils';

export const updateSubscriptionWithAPI = ({id, amount, paymentMethod}) => {
>>>>>>> fb785cbb (Initial commit)
    return donorDashboardApi
        .post(
            'recurring-donations/subscription/update',
            {
                id: id,
                amount: amount,
                payment_method: paymentMethod,
            },
<<<<<<< HEAD
            {},
        )
        .then(async (response) => {
            if (response.data.status === 400) {
                dispatch(setError(response.data.body_response.message));
                return;
            }
=======
            {}
        )
        .then(async (response) => {
>>>>>>> fb785cbb (Initial commit)
            await fetchSubscriptionsDataFromAPI();
            return response;
        });
};
