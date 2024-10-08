<?php
namespace App\Http\Controllers\Traits ;

trait Authorize
{
    public function __construct()
    {
          Auth()->loginUsingId(1);

        $resourceMap = [
            'index' => 'read',
            'show' => 'read',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'edit',
            'update' => 'edit',
            'destroy' => 'delete',

        ] ;
        $this->authorize('access',[$resourceMap[Request()->route()->getActionMethod()],Request()->segment(2)]);
    }
}
