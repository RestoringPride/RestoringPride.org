<<<<<<< HEAD
import {useEffect} from 'react';
=======
import {useEffect} from "react";
>>>>>>> fb785cbb (Initial commit)

export const useResetPage = (data, page, setPage, filters) => {
    //if we're displaying a non-existent page (like after deleting an item), go to the last available page
    useEffect(() => {
<<<<<<< HEAD
        if (data?.totalPages && page > data.totalPages) {
=======
        if(data?.totalPages && page > data.totalPages){
>>>>>>> fb785cbb (Initial commit)
            setPage(data.totalPages);
        }
    }, [data]);

    //go back to the first page whenever filters change
    useEffect(() => {
        setPage(1);
    }, [filters]);
<<<<<<< HEAD
};
=======
}
>>>>>>> fb785cbb (Initial commit)
