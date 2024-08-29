<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Session;

class ApplicationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Session::has('applicationIds')) {
            $applicationIds = Session::get('applicationIds');
            $builder
                ->whereHas('applications', function ($query) use ($applicationIds) {
                    $query->whereIn('applications.id', $applicationIds);
                })
                ->where('tenant_id', Session::get('tenant_id'));
        }
    }
}
