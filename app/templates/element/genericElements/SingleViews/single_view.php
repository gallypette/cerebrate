<?php
/*
 *  echo $this->element('/genericElements/SingleViews/single_view', [
 *      'title' => '' //page title,
 *      'description' => '' //description,
 *      'description_html' => '' //html description, unsanitised,
 *      'data' => $data, // the raw data passed for display
 *      'fields' => [
 *           elements passed as to be displayed in the <ul> element.
 *           format:
 *           [
                 'key' => '' // key to be displayed
 *               'path' => '' // path for the value to be parsed
 *               'type' => '' // generic assumed if not filled, uses SingleViews/Fields/* elements
 *           ]
 *      ],
 *      'children' => [
 *          // Additional elements attached to the currently viewed object. index views will be appended via ajax calls below.
            [
 *               'title' => '',
 *               'url' => '', //cakephp compatible url, can be actual url or array for the constructor
 *               'collapsed' => 0|1  // defaults to 0, whether to display it by default or not
 *               'loadOn' => 'ready|expand'  // load the data directly or only when expanded from a collapsed state
 *
 *          ],
 *      ]
 *  ]);
 *
 */
    $listElements = '';
    if (!empty($fields)) {
        foreach ($fields as $field) {
            if (empty($field['type'])) {
                $field['type'] = 'generic';
            }
            $listElements .= sprintf(
                '<tr class="row"><td class="col-sm-2 font-weight-bold">%s</td><td class="col-sm-10">%s</td></tr>',
                h($field['key']),
                $this->element(
                    '/genericElements/SingleViews/Fields/' . $field['type'] . 'Field',
                    ['data' => $data, 'field' => $field]
                )
            );
        }
    }
    $ajaxLists = '';
    if (!empty($children)) {
        foreach ($children as $child) {
            $listElements .= $this->element(
                '/genericElements/SingleViews/child',
                array(
                    'value' => $child
                )
            );
        }
    }
    echo sprintf(
        '<div><h2>%s</h2>%s%s<table class="table table-striped col-sm-8">%s</table><div id="accordion">%s</div></div>',
        empty($title) ? __('%s View', h(\Cake\Utility\Inflector::humanize($this->request->getParam('controller')))) : h($title),
        empty($description) ? '' : sprintf('<p>%s</p>', h($description)),
        empty($description_html) ? '' : sprintf('<p>%s</p>', $description_html),
        $listElements,
        $ajaxLists
    );
