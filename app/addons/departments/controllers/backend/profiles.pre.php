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

if (isset($_REQUEST['pre_profiles_to_departments'])){
    $auth = & Tygh::$app['session']['auth'];
        if ($mode == "picker") {
            $params = $_REQUEST;
            $params['skip_view'] = 'Y';

            list($users, $search) = fn_get_users($params, $auth, Registry::get('settings.Appearance.admin_elements_per_page'));

            Tygh::$app['view']->assign([
                'users'=> $users,
                'search'=> $search,
                'countries'=> fn_get_simple_countries(true, CART_LANGUAGE),
                'states'=> fn_get_all_states(),
                'usergroups'=> fn_get_usergroups(array('status' => ['A', 'H']), CART_LANGUAGE),
            ]);

            Tygh::$app['view']->display('pickers/users/picker_contents.tpl');
            exit;
        }
    }