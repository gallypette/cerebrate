<?php
echo $this->element('genericElements/IndexTable/index_table', [
    'data' => [
        'data' => $data,
        'top_bar' => [
            'pull' => 'right',
            'children' => [
                [
                    'type' => 'search',
                    'button' => __('Filter'),
                    'placeholder' => __('Enter value to search'),
                    'data' => '',
                    'searchKey' => 'value'
                ]
            ]
        ],
        'fields' => [
            [
                'name' => '#',
                'sort' => 'id',
                'class' => 'short',
                'data_path' => 'id',
            ],
            [
                'name' => __('Name'),
                'class' => 'short',
                'data_path' => 'name',
            ],
            [
                'name' => __('UUID'),
                'sort' => 'uuid',
                'class' => 'short',
                'data_path' => 'uuid',
            ],
            [
                'name' => __('Members'),
                'data_path' => 'alignments',
                'element' =>  'count_summary',
                'url' => '/individuals/index/?organisation_id={{url_data}}',
                'url_data_path' => 'id'
            ],
            [
                'name' => __('URL'),
                'sort' => 'url',
                'class' => 'short',
                'data_path' => 'url',
            ],
            [
                'name' => __('Nationality'),
                'data_path' => 'nationality',
            ],
            [
                'name' => __('Sector'),
                'data_path' => 'sector',
            ],
            [
                'name' => __('Type'),
                'data_path' => 'type',
            ]
        ],
        'title' => __('ContactDB Organisation Index'),
        'description' => __('A list of organisations known by your Cerebrate instance. This list can get populated either directly, by adding new organisations or by fetching them from trusted remote sources.'),
        'pull' => 'right',
        'actions' => [
            [
                'url' => '/organisations/view',
                'url_params_data_paths' => ['id'],
                'icon' => 'eye'
            ],
            [
                'url' => '/organisations/edit',
                'url_params_data_paths' => ['id'],
                'icon' => 'edit'
            ],
            [
                'onclick' => 'populateAndLoadModal(\'/organisations/delete/[onclick_params_data_path]\');',
                'onclick_params_data_path' => 'id',
                'icon' => 'trash'
            ]
        ]
    ]
]);
echo '</div>';
?>
