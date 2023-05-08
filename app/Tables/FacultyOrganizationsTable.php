<?php

namespace App\Tables;

use App\Models\FacultyOrganization;
use App\Models\FacultyOrganizations;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FacultyOrganizationsTable extends AbstractTable
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
                    $query->orWhere('code_faculty_organization', 'LIKE', "%{$value}%")
                        ->orWhere('name_faculty_organization', 'LIKE', "%{$value}%")
                        ->orWhereHas('faculty', function ($query) use ($value) {
                            $query->where('faculty_name', 'LIKE', "%{$value}%");
                        });
                });
            });
        });
        $faculty_organization = FacultyOrganization::query()
            ->with('faculty')
            ->orderBy('code_faculty_organization', 'desc');
        return QueryBuilder::for($faculty_organization)->allowedSorts(['code_faculty_organization', 'name_faculty_organization'])->allowedFilters(['name_faculty_organization', 'code_faculty_organization', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table->withGlobalSearch()->column(key: 'code_faculty_organization', sortable: true, searchable: true)->column(key: 'name_faculty_organization', sortable: true, searchable: true)->column(key: 'student_organization')->column('action')->paginate(10);
    }
}
