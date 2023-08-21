<?php

namespace App\Http\Components;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Paginator
{
    public static function sort(Request $request, Builder $qb, array $allowed): Builder
    {
        $orderBy = $request->get('order', 'id');
        if (!in_array($orderBy, $allowed)) {
            $orderBy = 'id';
        }

        $sort = $request->get('sort', 'asc');
        if (!in_array(strtolower($sort), ['asc','desc'])) {
            $sort = 'asc';
        }

        return $qb->orderBy($orderBy, $sort);
    }

    public static function paginate($paginator): array
    {
        return [
            'total' => $paginator->total(),
            'per_page' => $paginator->perPage(),
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
            'next_page_url' => $paginator->nextPageUrl(),
            'prev_page_url' => $paginator->previousPageUrl(),
        ];
    }
}

