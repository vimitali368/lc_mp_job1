<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const CONTRACT_DATE = 'contract_date';
    public const CONTRACT_DATE_FROM = 'contract_date_from';
    public const CONTRACT_DATE_TO = 'contract_date_to';
    public const DELIVERY_COST = 'delivery_cost';
    public const DELIVERY_COST_FROM = 'delivery_cost_from';
    public const DELIVERY_COST_TO = 'delivery_cost_to';
    public const REGION = 'regions';
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
//        dd($this);
        return [
            self::NAME => [$this, 'name'],
            self::CONTRACT_DATE => [$this, 'contractDate'],
            self::CONTRACT_DATE_FROM => [$this, 'contractDateFrom'],
            self::CONTRACT_DATE_TO => [$this, 'contractDateTo'],
            self::DELIVERY_COST => [$this, 'deliveryСost'],
            self::DELIVERY_COST_FROM => [$this, 'deliveryСostFrom'],
            self::DELIVERY_COST_TO => [$this, 'deliveryСostTo'],
            self::REGION => [$this, 'regions'],
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
        $valueFrom = $array[0];
        $valueTo = $array[1];
//        dd($builder);
        $builder->whereBetween('contract_date', [$valueFrom, $valueTo]);
    }

    public function contractDateFrom(Builder $builder, $value)
    {
        $valueFrom = $value;
//        dd($valueFrom);
//        dd($builder);
        $builder->where('contract_date', '>=', $value);
    }

    public function contractDateTo(Builder $builder, $value)
    {
        $valueTo = $value;
//        dd($valueTo);
//        dd($builder);
        $builder->where('contract_date', '<=', $value);
    }

    public function deliveryСost(Builder $builder, $array)
    {
        $valueFrom = $array[0];
        $valueTo = $array[1];
        $builder->whereBetween('delivery_cost', [$valueFrom, $valueTo]);
    }

    public function deliveryСostFrom(Builder $builder, $value)
    {
        $builder->where('delivery_cost', '>=', $value);
    }

    public function deliveryСostTo(Builder $builder, $value)
    {
        $builder->where('delivery_cost', '<=', $value);
    }

    public function regions(Builder $builder, $arrayOfIds)
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
