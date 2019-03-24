<?php

class Resource
{
    public function getAll()
    {
        $resources = DB::query('SELECT resource_id, resource_name FROM resources')
                ->getObjects();

        $links = DB::query('SELECT resource_id, link_id, link_name, link_link FROM resource_links')
                ->getObjects();

        foreach ($resources as $r) {
            $r->links = [];
            foreach ($links as $l) {
                if ($l->resource_id === $r->resource_id) {
                    $r->links[] = $l;
                }
            }
        }

        return $resources;
    }
}