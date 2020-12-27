<?php
namespace App\Support;

use Illuminate\Support\Facades\Validator;

trait DataTablePaginate
{
    protected $operators = [
        'equal_to' => '=',
        'less_than' => '<',
        'greater_than' => '>',
        'like' => 'LIKE',
        'in' => 'IN',
        'not_in' => 'NOT_IN',
        'between' => 'BETWEEN',
    ];
    public function scopeDataTablePaginate($query, $request)
    {
        $v = Validator::make($request->all(), [
            'page' => 'required|min:1',
            'per_page' => 'required|min:1',
            'sort_column' => 'required|in:' . implode(',', $this->filter),
            'direction' => 'required|in:desc,asc',
            'search_column' => 'nullable|in:' . implode(',', $this->filter),
            'search_operator' => 'nullable|in:' . implode(',', array_keys($this->operators)),
            'search_query_1' => 'nullable|max:255',
        ]);

        // dd($request->search_query_1);
        if ($v->fails()) {
            dd($v->messages());
        }
        return $query->where('status', true)->orderBy($request->sort_column, $request->direction)
            ->where(function ($query) use ($request) {
                if ($request->has('search_query_1') && $request->search_query_1 !== null) {
                    $this->buildQuery($request, $query);
                }
            })
            ->with('userCre:id,name')
            ->paginate($request->per_page);
    }

    protected function buildQuery($request, $query)
    {
        $column = $request->search_column;
        $operator = $request->search_operator;

        switch ($operator) {
            case 'equal_to':
            case 'less_than':
            case 'greater_than':
                $query->where($column, $this->operators[$operator], $request->search_query_1);
                break;

            case 'like':
                $query->where($column, 'like', '%' . $request->search_query_1 . '%');
                break;
            case 'in':
                $query->whereIn($column, explode(',', $request->search_query_1));
                break;
            case 'not_in':
                $query->whereNotIn($column, explode(',', $request->search_query_1));
                break;
            case 'between':
                $query->whereBetween($column, [
                    $request->search_query_1,
                    $request->search_query_2,
                ]);
                break;

            default:
                $query->where($column, $this->operators[$operator], $request->search_query_1);
                break;
        }
    }
}