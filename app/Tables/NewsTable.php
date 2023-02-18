<?php

namespace App\Tables;

use App\Models\News;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class NewsTable extends AbstractTable
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
                    $query->orWhere('title', 'LIKE', "%{$value}%")->orWhere('status', 'LIKE', "%{$value}%")->orWhere('brief_overview', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(News::class)->defaultSort('title')->allowedSorts(['id', 'title', 'status', 'brief_overview'])->allowedFilters(['id', 'title', 'status', 'brief_overview', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table->column('id', sortable: true)->withGlobalSearch()->defaultSort('title')->column(key: 'title', sortable: true, searchable: true)->column(key: 'brief_overview', sortable: true, searchable: true)->column(key: 'reading_time', sortable: false, searchable: false)->column(key: 'status', sortable: true, searchable: true)->column('action')->selectFilter(key: 'status', options: ['draft' => 'Draft', 'published' => 'Published',])->paginate(10);
    }
}
