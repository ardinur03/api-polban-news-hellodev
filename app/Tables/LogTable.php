<?php

namespace App\Tables;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class LogTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query->orWhere('id', 'LIKE', "%{$value}%")
                        ->orWhere('log_name', 'LIKE', "%{$value}%")
                        ->orWhere('subject_type', 'LIKE', "%{$value}%")
                        ->orWhere('causer_id', 'LIKE', "%{$value}%");
                });
            });
        });
        $categories = Activity::orderBy('id', 'desc');
        return QueryBuilder::for($categories)->allowedSorts(['id', 'log_name', 'event', 'subject_type', 'causer_id', 'properties'])->allowedFilters([$globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table->withGlobalSearch()->column('id', sortable: true)->column(key: 'log_name', sortable: true)->column(key: 'event', sortable: true)->column(key: 'subject_type', sortable: true)->column(key: 'causer_id', sortable: true)->column(key: 'properties', sortable: false)->paginate(10);
    }
}
