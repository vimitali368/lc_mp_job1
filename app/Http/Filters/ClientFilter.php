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
        return [
            self::NAME => [$this, 'name'],
            self::CONTRACT_DATE => [$this, 'contractDate'],
            self::DELIVERY_COST => [$this, 'deliveryCost'],
            self::REGION => [$this, 'region'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function contractDate(Builder $builder, $contractDateFrom, $contractDateTo)
    {
        $builder->whereBetween('contract_date', [$contractDateFrom, $contractDateTo]);
    }

    public function deliveryCost(Builder $builder, $deliveryCostFrom, $deliveryCostTo)
    {
        $builder->whereBetween('delivery_cost', [$deliveryCostFrom, $deliveryCostTo]);
    }

    public function region(Builder $builder, $arrayOfIds)
    {
        $builder->whereIn('region', $arrayOfIds);
    }
}
