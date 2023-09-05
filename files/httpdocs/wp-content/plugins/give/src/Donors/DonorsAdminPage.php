<?php

namespace Give\Donors;

<<<<<<< HEAD
use Give\Donors\ListTable\DonorsListTable;
use Give\Framework\Database\DB;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Helpers\EnqueueScript;

class DonorsAdminPage
{
    /**
     * Root URL for this page's endpoints
     * @var string
     */
    private $apiRoot;

    /**
     * Nonce for authentication with WP REST API
     * @var string
     */
    private $apiNonce;

    /**
<<<<<<< HEAD
     * @var string
     */
    private $adminUrl;

    /**
=======
>>>>>>> fb785cbb (Initial commit)
     * @since 2.20.0
     */
    public function __construct()
    {
        $this->apiRoot = esc_url_raw(rest_url('give-api/v2/admin/donors'));
        $this->apiNonce = wp_create_nonce('wp_rest');
<<<<<<< HEAD
        $this->adminUrl = admin_url();
=======
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * @since 2.20.0
     */
    public function registerMenuItem()
    {
        remove_submenu_page(
            'edit.php?post_type=give_forms',
            'give-donors'
        );

        add_submenu_page(
            'edit.php?post_type=give_forms',
            esc_html__('Donors', 'give'),
            esc_html__('Donors', 'give'),
            'edit_give_forms',
            'give-donors',
<<<<<<< HEAD
            [$this, 'render']
=======
            [$this, 'render'],
            5
>>>>>>> fb785cbb (Initial commit)
        );
    }

    /**
     * @since 2.20.0
     */
    public function loadScripts()
    {
        $data = [
            'apiRoot' => $this->apiRoot,
            'apiNonce' => $this->apiNonce,
<<<<<<< HEAD
            'forms' => $this->getForms(),
            'table' => give(DonorsListTable::class)->toArray(),
            'adminUrl' => $this->adminUrl,
=======
            'preload' => $this->preloadDonors(),
            'forms' => $this->getForms(),
>>>>>>> fb785cbb (Initial commit)
        ];

        EnqueueScript::make('give-admin-donors', 'assets/dist/js/give-admin-donors.js')
            ->loadInFooter()
            ->registerTranslations()
            ->registerLocalizeData('GiveDonors', $data)->enqueue();

        wp_enqueue_style(
            'give-admin-ui-font',
            'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400..700&display=swap',
            [],
            null
        );
    }

    /**
<<<<<<< HEAD
=======
     * Make REST request to Donors endpoint before page load
     * @since 2.20.0
     */
    public function preloadDonors(){
        $queryParameters = [
            'page' => 1,
            'perPage' => 30,
            'search' => '',
        ];

        $url = add_query_arg(
            $queryParameters,
            $this->apiRoot
        );

        $request = \WP_REST_Request::from_url($url);
        $response = rest_do_request($request);

        return $response->get_data();
    }

    /**
>>>>>>> fb785cbb (Initial commit)
     * Preload initial table data
     * @since 2.20.0
     */
    public function getForms(){
<<<<<<< HEAD
        $options = DB::table('posts')
            ->select(
                ['ID', 'value'],
                ['post_title', 'text']
            )
            ->where('post_type', 'give_forms')
            ->whereIn('post_status', ['publish', 'draft', 'pending', 'private'])
            ->getAll(ARRAY_A);

        return array_merge([
            [
                'value' => '0',
                'text' => 'Any',
            ]
        ], $options);
=======
        $queryParameters = [
            'page' => 1,
            'perPage' => 50,
            'search' => '',
            'status' => 'any'
        ];

        $url = esc_url_raw(add_query_arg(
            $queryParameters,
            rest_url('give-api/v2/admin/forms')
        ));

        $request = \WP_REST_Request::from_url($url);
        $response = rest_do_request($request);

        $response = $response->get_data();
        $forms = $response['items'];

        $emptyOption = [
                [
                'value' => '0',
                'text' => 'Any',
            ]
        ];
        $formOptions = array_map(function($form){
            return [
                'value' => $form['id'],
                'text' => $form['name'],
            ];
        }, $forms);
        return array_merge($emptyOption, $formOptions);
>>>>>>> fb785cbb (Initial commit)
    }

    /**
     * Render admin page container
     * @since 2.20.0
     */
    public function render()
    {
        echo '<div id="give-admin-donors-root"></div>';
    }

    /**
     * Display a button on the old donation forms table that switches to the React view
     *
     * @since 2.20.0
     */
    public function renderReactSwitch()
    {
        ?>
        <script type="text/javascript">
            function showReactTable () {
                fetch( '<?php echo esc_url_raw(rest_url('give-api/v2/admin/donors/view?isLegacy=0')) ?>', {
                    method: 'GET',
                    headers: {
                        ['X-WP-Nonce']: '<?php echo wp_create_nonce('wp_rest') ?>'
                    }
                })
                    .then((res) => {
                        window.location.reload();
                    });
            }
            jQuery( function() {
                jQuery(jQuery(".wrap .wp-header-end")).before(
                    '<button class="page-title-action" onclick="showReactTable()">Switch to New View</button>'
                );
            });
        </script>
        <?php
    }

    /**
     * Helper function to determine if current page is Give Donors admin page
     * @since 2.20.0
     *
     * @return bool
     */
    public static function isShowing()
    {
        return isset($_GET['page']) && $_GET['page'] === 'give-donors' && !isset($_GET['id']);
    }
}
