<<<<<<< HEAD
import {useRef, useEffect} from 'react';
=======
import { useRef, useEffect } from 'react'
>>>>>>> fb785cbb (Initial commit)

// use fallbackData as the initial data on component mount, instead of default data whenever there's a cache miss
// adapted from https://viralganatra.com/how-to-fix-swr-to-work%20correctly-with-initialData-or-fallbackData/

export default function useFallbackAsInitial(useSWRNext) {
    return (key, fetcher, config) => {
<<<<<<< HEAD
=======

>>>>>>> fb785cbb (Initial commit)
        const hasMounted = useRef(false);

        useEffect(() => {
            hasMounted.current = true;
        }, []);

        // Actual SWR hook.
        const swr = useSWRNext(key, fetcher, {
            ...config,
            fallbackData: hasMounted.current ? undefined : config?.fallbackData,
            revalidateOnMount: hasMounted.current && config?.fallbackData,
        });

        return swr;
<<<<<<< HEAD
    };
=======
    }
>>>>>>> fb785cbb (Initial commit)
}
