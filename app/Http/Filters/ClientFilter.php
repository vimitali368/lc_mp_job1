<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const CONTRACT_DATE = 'contract_date';
    public const DELIVERY_COST = 'delivery_cost';
    public const REGION = 'region';
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
//        dd($this);
        return [
            self::NAME => [$this, 'name'],
            self::CONTRACT_DATE => [$this, 'contractDate'],
            self::DELIVERY_COST => [$this, 'deliveryСost'],
            self::REGION => [$this, 'region'],
            self::SORT => [$this, 'sort'],
        ];
    }

    public function name(Builder $builder, $value)
    {
//        dd($builder);
        $builder->where('name', 'like', "%{$value}%");
    }

    public function contractDate(Builder $builder, $array)
    {
        $contractDateFrom = $array[0];
        $contractDateTo = $array[1];
//        dd($builder);
        $builder->whereBetween('contract_date', [$contractDateFrom, $contractDateTo]);
    }

    public function deliveryСost(Builder $builder, $value)
    {
//        dd($value);
        $builder->whereBetween('delivery_cost', $value);
    }

    public function region(Builder $builder, $arrayOfIds)
    {
        $builder->whereIn('region', $arrayOfIds);
    }

    public function sort(Builder $builder, $arrayOfSort)
    {
        $sort = $arrayOfSort[0];
        $order = $arrayOfSort[1];
//        dd($sort);
//        dd($order);
        $builder->orderBy($sort, $order);
    }
}
