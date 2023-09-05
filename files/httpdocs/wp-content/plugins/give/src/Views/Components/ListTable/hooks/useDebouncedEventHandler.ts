<<<<<<< HEAD
import useDebounce from '@givewp/components/ListTable/hooks/useDebounce';

export default function useDebouncedEventHandler(eventHandler) {
=======
import useDebounce from "@givewp/components/ListTable/hooks/useDebounce";

export default function useDebouncedEventHandler(eventHandler){
>>>>>>> fb785cbb (Initial commit)
    const debouncedCallback = useDebounce(eventHandler);
    return (event) => {
        event.persist();
        debouncedCallback(event);
    };
}
<<<<<<< HEAD
=======

>>>>>>> fb785cbb (Initial commit)
