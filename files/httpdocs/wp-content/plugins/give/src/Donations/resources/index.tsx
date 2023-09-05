import {StrictMode} from 'react';
import ReactDOM from 'react-dom';
<<<<<<< HEAD
import DonationsListTable from './components/DonationsListTable';

ReactDOM.render(
    <StrictMode>{<DonationsListTable />}</StrictMode>,
=======
import DonationsListTable from './ListTable';

ReactDOM.render(
    <StrictMode>
        {<DonationsListTable/>}
    </StrictMode>,
>>>>>>> fb785cbb (Initial commit)
    document.getElementById('give-admin-donations-root')
);
