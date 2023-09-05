<<<<<<< HEAD
import {useEffect, useRef} from 'react';
import {debounce} from 'lodash';

export default function useDebounce(callback) {
    const debouncedCallback = useRef(debounce(callback, 500)).current;
=======
import {useEffect, useRef} from "react";
import {debounce} from "lodash";

export default function useDebounce(callback){
    const debouncedCallback = useRef(
        debounce(callback,
            500
        )
    ).current;
>>>>>>> fb785cbb (Initial commit)

    useEffect(() => {
        return () => {
            debouncedCallback.cancel();
<<<<<<< HEAD
        };
=======
        }
>>>>>>> fb785cbb (Initial commit)
    }, []);

    return debouncedCallback;
}
<<<<<<< HEAD
=======

>>>>>>> fb785cbb (Initial commit)
