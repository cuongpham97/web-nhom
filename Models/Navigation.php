<?php

class Navigation
{
    public function getMenu()
    {
        $menu = DB::query( 'SELECT menu_id, menu_name, menu_link, menu_order FROM menu ORDER BY  menu_order')
                ->getObjects();

        $submenu = DB::query('SELECT submenu_id, submenu_name, submenu_link, submenu_order, submenu_parent FROM sub_menu ORDER BY  submenu_order')
                ->getObjects();
        
        //Đổ menu con vào menu cha
        foreach ($menu as $parent) {
            foreach ($submenu as $child) {
                if ($child->submenu_parent == $parent->menu_id) {
                    $parent->childs[] = $child;
                }
            }
        }
        return $menu;
    }
}