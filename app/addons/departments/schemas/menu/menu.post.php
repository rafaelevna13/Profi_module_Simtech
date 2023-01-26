<?php
/***************************************************************************
*                                                                          *
*   (c) Simtech Development                                                *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
***************************************************************************/

defined('BOOTSTRAP') or die('Access denied');

$schema['central']['customers']['items']['departments'] = [
    'attrs' => [
        'class'=>'is-addon'
        ],
        'href' => 'departments.manage_department',
        'alt' => 'departments.manage_department',
        'position' => 400,
    ];

return $schema;
