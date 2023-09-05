/**
 * WordPress dependencies
 */
<<<<<<< HEAD
import {__} from '@wordpress/i18n';

=======
import { __ } from '@wordpress/i18n'
>>>>>>> fb785cbb (Initial commit)
const {InnerBlocks} = wp.blockEditor;
const {useEffect} = wp.element;
const {select, dispatch} = wp.data;

const edit = ({isSelected, clientId}) => {
    // When adding a new Multi-Form Goal block, select the inner Progress Bar block by default
    useEffect(() => {
        if (isSelected) {
            selectProgressBar();
        }
    }, []);

    const selectProgressBar = () => {
        const parentBlock = select('core/editor').getBlocksByClientId(clientId)[0];
        const progressBarBlock = parentBlock.innerBlocks[parentBlock.innerBlocks.length - 1];
<<<<<<< HEAD
        // prevent error if progressBarBlock is slow to load
        if (progressBarBlock) {
            dispatch('core/block-editor').selectBlock(progressBarBlock.clientId);
        }
=======
        dispatch('core/block-editor').selectBlock(progressBarBlock.clientId);
>>>>>>> fb785cbb (Initial commit)
    };

    const blockTemplate = [
        [
            'core/media-text',
            {
                imageFill: true,
            },
            [
                [
                    'core/heading',
                    {
                        placeholder: __('Heading', 'give'),
                    },
                ],
                [
                    'core/paragraph',
                    {
                        placeholder: __('Summary', 'give'),
                    },
                ],
            ],
        ],
        ['give/progress-bar', {}],
    ];

    return (
        <div className="give-multi-form-goal-block">
            <InnerBlocks template={blockTemplate} templateLock="all" />
        </div>
    );
};
export default edit;
