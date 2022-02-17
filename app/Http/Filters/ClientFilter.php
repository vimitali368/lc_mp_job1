<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const CONTRACT_DATE = 'contract_date';
    public const DELIVERY_COST = 'delivery_cost';
    public const REGION = 'region';

    protected function getCallbacks(): array
    {
//        dd($this);
        return [
            self::NAME => [$this, 'name'],
            self::CONTRACT_DATE => [$this, 'contractDateFrom', 'contractDateTo'],
            self::DELIVERY_COST => [$this, 'deliveryСost'],
            self::REGION => [$this, 'region'],
        ];
    }

    public function name(Builder $builder, $value)
    {
//        dd($builder);
        $builder->where('name', 'like', "%{$value}%");
    }

    public function contractDate(Builder $builder, $contractDateFrom, $contractDateTo)
    {
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
}
