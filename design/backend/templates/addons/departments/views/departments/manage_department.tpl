{** departments section **}

{capture name="mainbox"}   

    <form action="{""|fn_url}" method="post" id="departments_form" name="departments_form" enctype="multipart/form-data">  
        <input type="hidden" name="fake" value="1" />
        {include "common/pagination.tpl" save_current_page=true save_current_url=true div_id="pagination_contents_departments"}

        {assign var="c_url" value=$config.current_url|fn_query_remove:"sort_by":"sort_order"}
        {$rev=$smarty.request.content_id|default:"pagination_contents_departments"}
        {assign var="c_icon" value="<i class=\"icon-`$search.sort_order_rev`\"></i>"}
        {assign var="c_dummy" value="<i class=\"icon-dummy\"></i>"} 
        

        {if $departments}
            <div class="table-responsive-wrapper">
                <table class="table table-middle table--relative table-responsive">
                    <thead>
                        <th class="left mobile-hide">
                            {include "common/check_items.tpl" class ="cm-no-hide-input"}
                        </th>
                        <th width="5%">
                            <a class="cm-ajax" href="{"`$c_url`&sort_by=position&sort_order=`$search.sort_order_rev`"|fn_url}"
                            data-ca-target-id={$rev}>{__("departments.position")}{if $search.sort_by === "position"}{$c_icon nofilter}{/if}</a>
                        </th>
                        <th width="3%">
                            <a class="cm-ajax" href="{"`$c_url`&sort_by=logo&sort_order=`$search.sort_order_rev`"|fn_url}" data-ca-target-id={$rev}>{__("departments.logo")}{if $search.sort_by === "logo"}{$c_icon nofilter}{else}{$c_dummy nofilter}{/if}</a>
                        </th>
                        <th width="15%">
                            <a class="cm-ajax" href="{"`$c_url`&sort_by=name&sort_order=`$search.sort_order_rev`"|fn_url}" data-ca-target-id={$rev}>{__("departments.name")}{if $search.sort_by === "name"}{$c_icon nofilter}{else}{$c_dummy nofilter}{/if}</a>
                        </th>
                        <th width="15%">
                            <a class="cm-ajax" href="{"`$c_url`&sort_by=timestamp&sort_order=`$search.sort_order_rev`"|fn_url}" data-ca-target-id={$rev}>{__("departments.creation_date")}{if $search.sort_by === "timestamp"}{$c_icon nofilter}{else}{$c_dummy nofilter}{/if}</a>
                        </th>
                        <th width="6%" class="mobile-hide">&nbsp;</th>
                        <th width="10%" class="right">
                            <a class="cm-ajax" href="{"`$c_url`&sort_by=status&sort_order=`$search.sort_order_rev`"|fn_url}" data-ca-target-id={$rev}>{__("departments.status")}{if $search.sort_by === "status"}{$c_icon nofilter}{/if}</a>
                        </th>
                    </tr>
                    </thead>
                {foreach from=$departments item=department}                
                    <tr class="cm-row-status-{$department.status|lower}">
                        {$allow_save=true}

                        {if $allow_save}
                            {assign var="no_hide_input" value="cm-no-hide-input"}
                        {else}
                            {assign var="no_hide_input" value=""}
                        {/if}
             
                        <td width="6%" class="left mobile-hide">
                            <input type="checkbox" name="department_ids[]" value="{$department.department_id}" class="cm-item {$no_hide_input}"/>
                        </td>
                        <td>
                            <input type="text" name="departments_data[{$department.department_id}][position]"
                            value="{$department.position}" size="3" class="input-micro {$no_hide_input}">
                        </td>
                        <td width="7%" class="departments-list__image">
                        {include file="common/image.tpl"
                                image=$department.main_pair.icon|default:$department.main_pair.detailed
                                image_id=$department.main_pair.image_id
                                image_width=$image_width
                                image_height=$image_height
                                href="department.update_department?department_id=`$department.department_id`"|fn_url
                                image_css_class="departments-list__image--img"
                                link_css_class="departments-list__image--link"
                        }
                        </td>
                        <td class="{$no_hide_input}" data-th="{__('name')}">
                            <a class="row-status" href="{"departments.update_department?department_id=`$department.department_id`"|fn_url}">{$department.department}</a>
                        </td>
                        <td data-th="{__("departments.creation_date")}">
                            {$department.timestamp|date_format:"`$settings.Appearance.date_format`, `$settings.Appearance.time_format`"}
                        </td>
                        <td width="6%" class="mobile-hide">
                            {capture name="tools_list"}
                                <li>{btn type="list" text="{__("departments.edit")}" href="departments.update_department?department_id=`$department.department_id`"}</li>
                            {if $allow_save}
                                <li>{btn type="list" class="cm-confirm" text="{__("departments.delete")}" href="departments.delete_department?department_id=`$department.department_id`" method="POST"}</li>
                            {/if}
                            {/capture}
                            <div class="hidden-tools">
                                {dropdown content=$smarty.capture.tools_list}
                            </div>
                        </td>
                        <td width="10%" class="right" data-th="{__("status")}">
                            {include "common/select_popup.tpl" id=$department.department_id status=$department.status object_id_name="department_id" table="departments" popup_additional_class="`$no_hide_input` dropleft" hidden=false}
                        </td>
                    </tr>
                {/foreach}
                </table>
            </div>

            {include "common/context_menu_wrapper.tpl"
                form="departments_form"
                object="departments"
                items=$smarty.capture.departments_table
            }
        {else}
            <p class="no-items">{__("departments.no_data")}</p>
        {/if}

        {include "common/pagination.tpl" div_id="pagination_contents_departments"}


        {capture name="buttons"}
            {capture name="tools_list"}
                {if $departments}
                    <li>{btn type="list" class="cm-confirm" text=__("departments.delete") dispatch="dispatch[departments.delete_departments]" form="departments_form"}</li>
                {/if}
            {/capture}
            {dropdown content=$smarty.capture.tools_list}

            {if $departments}
                {include "buttons/save.tpl" 
                but_name="dispatch[departments.update_departments]" 
                but_role="action" 
                but_target_form="departments_form" 
                but_meta="cm-submit"}
            {/if}
        {/capture}

        {capture name="adv_buttons"}
            {hook name="departments:adv_buttons"}
            {include "common/tools.tpl" tool_href="departments.add_department" prefix="top" hide_tools="true" title=__("departments.add") icon="icon-plus"}
            {/hook}
        {/capture}
    </form>
{/capture}

    {capture name="sidebar"}
        {hook name="departments:manage_sidebar"}
        {include "common/saved_search.tpl" dispatch="departments.manage_department" view_type="departments"}
        {include "addons/departments/views/departments/components/departments_search_form.tpl" dispatch="departments.manage_department"}
        {/hook}
    {/capture}

{hook name="departments:manage_mainbox_params"}
    {$page_title =__("departments.departments")}
    {$select_languages = true}
{/hook}

{include "common/mainbox.tpl" 
    title=$page_title 
    content=$smarty.capture.mainbox 
    buttons=$smarty.capture.buttons
    adv_buttons=$smarty.capture.adv_buttons 
    select_languages=$select_languages 
    sidebar=$smarty.capture.sidebar
}
{** ad section **}