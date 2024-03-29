<?php

namespace App\Tables;

use App\Models\CampusOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CampusOrganizationsTable extends AbstractTable
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
                    $query->orWhere('name_campus_organization', 'LIKE', "%{$value}%")->orWhere('code_campus_organization', 'LIKE', "%{$value}%");
                });
            });
        });
        $campus_organizations = CampusOrganization::orderBy('code_campus_organization', 'asc');
        return QueryBuilder::for($campus_organizations)->allowedSorts(['code_campus_organization', 'name_campus_organization'])->allowedFilters([$globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table->withGlobalSearch()->column(key: 'code_campus_organization', sortable: true)->column(key: 'name_campus_organization', sortable: true)->column('action')->paginate(10);
    }
}
