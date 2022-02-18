<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const NORM_NITROGEN = 'norm_nitrogen';
    public const NORM_PHOSPHORUS = 'norm_phosphorus';
    public const NORM_POTASSIUM = 'norm_potassium';
    public const CULTURE_IDS = 'culture_ids';
    public const DISTRICTS = 'districts';
    public const COSTS = 'costs';
    public const DESCRIPTION = 'description';
    public const APPOINTMENT = 'appointment';
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
//        dd($this);
        return [
            self::NAME => [$this, 'name'],
            self::NORM_NITROGEN => [$this, 'normNitrogen'],
            self::NORM_PHOSPHORUS => [$this, 'normPhosphorus'],
            self::NORM_POTASSIUM => [$this, 'normPotassium'],
            self::CULTURE_IDS => [$this, 'cultureIds'],
            self::DISTRICTS => [$this, 'districts'],
            self::COSTS => [$this, 'costs'],
            self::DESCRIPTION => [$this, 'description'],
            self::APPOINTMENT => [$this, 'appointment'],
            self::SORT => [$this, 'sort'],
        ];
    }

    public function name(Builder $builder, $value)
    {
//        dd($builder);
        $builder->where('name', 'like', "%{$value}%");
    }

    public function normNitrogen(Builder $builder, $array)
    {
        $valueFrom = $array[0];
        $valueTo = $array[1];
//        dd($builder);
        $builder->whereBetween('norm_nitrogen', [$valueFrom, $valueTo]);
    }

    public function normPhosphorus(Builder $builder, $array)
    {
        $valueFrom = $array[0];
        $valueTo = $array[1];
//        dd($builder);
        $builder->whereBetween('norm_phosphorus', [$valueFrom, $valueTo]);
    }

    public function normPotassium(Builder $builder, $array)
    {
        $valueFrom = $array[0];
        $valueTo = $array[1];
//        dd($builder);
        $builder->whereBetween('norm_potassium', [$valueFrom, $valueTo]);
    }

    public function cultureIds(Builder $builder, $arrayOfIds)
    {
        $builder->whereIn('culture_id', $arrayOfIds);
    }

    public function districts(Builder $builder, $arrayOfIds)
    {
        $builder->whereIn('district', $arrayOfIds);
    }

    public function costs(Builder $builder, $arrayOfIds)
    {
        $builder->whereIn('cost', $arrayOfIds);
    }

    public function description(Builder $builder, $value)
    {
//        dd($value);
        $builder->whereBetween('description', $value);
    }

    public function appointment(Builder $builder, $value)
    {
//        dd($value);
        $builder->whereBetween('appointment', $value);
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
