<?php
$alignments = '';
if ($field['scope'] === 'individuals') {
    foreach ($data['alignments'] as $alignment) {
        $alignments .= sprintf(
            '<div><span class="font-weight-bold">%s</span> @ %s <a href="#" class="fas fa-trash text-black" onClick="%s"></a></div>',
            h($alignment['type']),
            sprintf(
                '<a href="/organisations/view/%s">%s</a>',
                h($alignment['organisation']['id']),
                h($alignment['organisation']['name'])
            ),
            sprintf(
                "populateAndLoadModal(%s);",
                sprintf(
                    "'/alignments/delete/%s'",
                    $alignment['id']
                )
            )
        );
    }
} else if ($field['scope'] === 'organisations') {
    foreach ($data['alignments'] as $alignment) {
        $alignments .= sprintf(
            '<div>[<span class="font-weight-bold">%s</span>] %s <a href="#" class="fas fa-trash text-black" onClick="%s"></a></div>',
            h($alignment['type']),
            sprintf(
                '<a href="/individuals/view/%s">%s</a>',
                h($alignment['individual']['id']),
                h($alignment['individual']['email'])
            ),
            sprintf(
                "populateAndLoadModal(%s);",
                sprintf(
                    "'/alignments/delete/%s'",
                    $alignment['id']
                )
            )
        );
    }
}
echo sprintf(
    '<div class="alignments-list">%s</div><div class="alignments-add-container"><button class="alignments-add-button btn btn-secondary btn-sm" onclick="%s">%s</button></div>',
    $alignments,
    sprintf(
        "populateAndLoadModal('/alignments/add/%s/%s');",
        h($field['scope']),
        h($data['id'])
    ),
    $field['scope'] === 'individuals' ? __('Add organisation') : __('Add individual')
);
