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

if ($mode == 'view_all') {

    Tygh::$app['session']['continue_url'] = "departments.view_all";

    $params = $_REQUEST;  
    $params['user_id'] =  Tygh::$app['session']['auth']['user_id'];

    list($departments, $search) = fn_get_departments($params, Registry::get('settings.Appearance.elements_per_page'), CART_LANGUAGE);

    Tygh::$app['view']->assign([
        'departments' => $departments,
        'search' => $search,
        'columns' => $columns,
       ]); 

    fn_add_breadcrumb(__("departments.departments"));  

} elseif ($mode === 'view_info') {

    $department_data = [];
    $department_id = !empty($_REQUEST['department_id']) ? $_REQUEST['department_id'] :0;
    $department_data = fn_get_department_data($department_id, CART_LANGUAGE);
    if (empty($department_data)) {
        return [CONTROLLER_STATUS_NO_PAGE];
    }

    Tygh::$app['view']->assign('department_data', $department_data);

    fn_add_breadcrumb(__("departments.departments"), "?dispatch=departments.view_all");   
    fn_add_breadcrumb(__("departments.info"));

    $params = $_REQUEST;  //receiving params 
    $params['extend'] = ['description']; //add description
    $params['item_ids'] = !empty($_REQUEST['employee_ids']) ? implode(',', $department_data['employee_ids']) : -1;  
    // when the department has no employees

    if ($items_per_page = fn_change_session_param(Tygh::$app['session']['search_params'], $_REQUEST, 'items_per_page')) {
        $params['items_per_page'] = $items_per_page;
    }
    if ($sort_by = fn_change_session_param(Tygh::$app['session']['search_params'], $_REQUEST, 'sort_by')) {
        $params['sort_by'] = $sort_by;
    }
    if ($sort_order = fn_change_session_param(Tygh::$app['session']['search_params'], $_REQUEST, 'sort_order')) {
        $params['sort_order'] = $sort_order;
    }
}