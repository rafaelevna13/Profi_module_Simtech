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

use Tygh\Registry;

defined('BOOTSTRAP') or die('Access denied');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $suffix = '';

    if ($mode == 'update_department') {      

        $department_id = !empty($_REQUEST['department_id']) ? $_REQUEST['department_id'] : 0;
        $data = !empty($_REQUEST['department_data']) ? $_REQUEST['department_data'] : [];
        $department_id = fn_update_department($data, $department_id);

        if (!empty($department_id)) {
            $suffix = ".update_department?department_id={$department_id}";
        } else {
            $suffix = ".add_department";
        }

    } elseif ($mode == 'update_departments') {     

        if (!empty($_REQUEST['departments_data'])) {
            foreach ($_REQUEST['departments_data'] as $department_id => $data) {
                fn_update_department($data, $department_id);
            }
        }

        $suffix = ".manage_department";

    } elseif ($mode == 'delete_department') {       

        $department_id = !empty($_REQUEST['department_id']) ? $_REQUEST['department_id'] : 0;
        fn_delete_department($department_id);

        return [CONTROLLER_STATUS_REDIRECT, 'departments.manage_department'];

    } elseif ($mode == 'delete_departments') {     

        if (!empty($_REQUEST['department_ids'])) {
            foreach ($_REQUEST['department_ids'] as $department_id) {
                fn_delete_department($department_id);
            }
        }   
        return [CONTROLLER_STATUS_REDIRECT, 'departments.manage_department'];
    }
    return [CONTROLLER_STATUS_OK, 'departments' .  $suffix];
}
if ($mode == 'add_department' || $mode == 'update_department') {
    $department_id = !empty($_REQUEST['department_id']) ? $_REQUEST['department_id'] :0;
    $department_data = fn_get_department_data($department_id, DESCR_SL);
    if (empty($department_data) && $mode === 'update') {
        return [CONTROLLER_STATUS_NO_PAGE];
    }
    Tygh::$app['view']->assign([
        'department_data'=> $department_data,
        'admin_info'=> !empty($department_data['admin_id']) ? fn_get_user_short_info($department_data['admin_id']) :[],
    ]);
} elseif ($mode == 'manage_department') {
    list($departments, $search) = fn_get_departments($_REQUEST, Registry::get('settings.Appearance.admin_elements_per_page'),DESCR_SL);
    Tygh::$app['view']->assign([
        'departments'=> $departments,
        'search'=> $search,
    ]);
}