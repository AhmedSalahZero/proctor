<?php
namespace App\Models\Traits;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait FormRequest
{
    public function data($model , $moreData = [])
    {
        $route = request()->route()->getName();
        $modelBind = $model->BindKey ?? 'id' ;

        if (request()->routeIs('*.edit')) {
            $route = str_replace('edit', 'update', $route);

            $route = route($route, $model->{$modelBind});


        } else {
            $route = str_replace('create', 'store', $route);
            $route = route($route);
        }

        $columns = Schema::getColumnListing(($model)->getTable());

        foreach ($columns as $column) {
            $data[$column] = $model->{$modelBind} == null ? old($column) : $model->$column;
        }

        $data['route'] = $route;

        return array_merge($data , $moreData);
    }
}
