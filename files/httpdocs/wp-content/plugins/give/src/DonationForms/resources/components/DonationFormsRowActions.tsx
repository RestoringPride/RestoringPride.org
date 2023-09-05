<<<<<<< HEAD
import {__} from '@wordpress/i18n';
import {useSWRConfig} from 'swr';
import RowAction from '@givewp/components/ListTable/RowAction';
import ListTableApi from '@givewp/components/ListTable/api';
import {useContext} from 'react';
import {ShowConfirmModalContext} from '@givewp/components/ListTable/ListTablePage';
import {Interweave} from 'interweave';
=======
import {__, sprintf} from "@wordpress/i18n";
import {useSWRConfig} from "swr";
import RowAction from "@givewp/components/ListTable/RowAction";
import ListTableApi from "@givewp/components/ListTable/api";
import {useContext} from "react";
import {ShowConfirmModalContext} from "@givewp/components/ListTable";
>>>>>>> fb785cbb (Initial commit)

const donationFormsApi = new ListTableApi(window.GiveDonationForms);

export function DonationFormsRowActions({data, item, removeRow, addRow, setUpdateErrors, parameters}) {
    const {mutate} = useSWRConfig();
    const showConfirmModal = useContext(ShowConfirmModalContext);
    const trashEnabled = Boolean(data?.trash);
<<<<<<< HEAD
    const deleteEndpoint = trashEnabled && !item.status.includes('trash') ? '/trash' : '/delete';
=======
    const deleteEndpoint = trashEnabled && item.status !== 'trash' ? '/trash' : '/delete';
>>>>>>> fb785cbb (Initial commit)

    const fetchAndUpdateErrors = async (parameters, endpoint, id, method) => {
        const response = await donationFormsApi.fetchWithArgs(endpoint, {ids: [id]}, method);
        setUpdateErrors(response);
        await mutate(parameters);
        return response;
<<<<<<< HEAD
    };
=======
    }
>>>>>>> fb785cbb (Initial commit)

    const deleteForm = async (selected) => await fetchAndUpdateErrors(parameters, deleteEndpoint, item.id, 'DELETE');

    const confirmDeleteForm = (selected) => (
        <p>
<<<<<<< HEAD
            {__('Really delete the following form?', 'give')}
            <br />
            <Interweave content={item?.title} />
=======
            {sprintf(__('Really delete %s?', 'give'), item.name)}
>>>>>>> fb785cbb (Initial commit)
        </p>
    );

    const confirmModal = (event) => {
        showConfirmModal(__('Delete', 'give'), confirmDeleteForm, deleteForm, 'danger');
<<<<<<< HEAD
    };
=======
    }
>>>>>>> fb785cbb (Initial commit)

    return (
        <>
            {parameters.status === 'trash' ? (
                <>
                    <RowAction
<<<<<<< HEAD
                        onClick={removeRow(
                            async () => await fetchAndUpdateErrors(parameters, '/restore', item.id, 'POST')
                        )}
                        actionId={item.id}
                        displayText={__('Restore', 'give')}
                        hiddenText={item?.name}
=======
                        onClick={removeRow(async () => await fetchAndUpdateErrors(parameters, '/restore', item.id, 'POST'))}
                        actionId={item.id}
                        displayText={__('Restore', 'give')}
                        hiddenText={item.name}
>>>>>>> fb785cbb (Initial commit)
                    />
                    <RowAction
                        onClick={confirmModal}
                        actionId={item.id}
                        displayText={__('Delete Permanently', 'give')}
<<<<<<< HEAD
                        hiddenText={item?.name}
=======
                        hiddenText={item.name}
>>>>>>> fb785cbb (Initial commit)
                        highlight
                    />
                </>
            ) : (
                <>
<<<<<<< HEAD
                    <RowAction href={item.edit} displayText={__('Edit', 'give')} hiddenText={item?.name} />
=======
                    <RowAction
                        href={item.edit}
                        displayText={__('Edit', 'give')}
                        hiddenText={item.name}
                    />
>>>>>>> fb785cbb (Initial commit)
                    <RowAction
                        onClick={trashEnabled ? removeRow(deleteForm) : confirmModal}
                        actionId={item.id}
                        highlight={!trashEnabled}
                        displayText={trashEnabled ? __('Trash', 'give') : __('Delete', 'give')}
<<<<<<< HEAD
                        hiddenText={item?.name}
                    />
                    <RowAction href={item.permalink} displayText={__('View', 'give')} hiddenText={item?.name} />
=======
                        hiddenText={item.name}
                    />
                    <RowAction
                        href={item.permalink}
                        displayText={__('View', 'give')}
                        hiddenText={item.name}
                    />
>>>>>>> fb785cbb (Initial commit)
                    <RowAction
                        onClick={addRow(async (id) => await fetchAndUpdateErrors(parameters, '/duplicate', id, 'POST'))}
                        actionId={item.id}
                        displayText={__('Duplicate', 'give')}
<<<<<<< HEAD
                        hiddenText={item?.name}
=======
                        hiddenText={item.name}
>>>>>>> fb785cbb (Initial commit)
                    />
                </>
            )}
        </>
    );
}
