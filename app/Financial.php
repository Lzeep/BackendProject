<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Sodium\add;

class Financial extends Model
{

    protected $casts = [
        'income' => 'collection',
        'consumption' => 'collection',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function add_income($income)
    {
        $income_temp = collect($income);
        $temp = collect($this->income);
        $temp->push($income_temp);
        $this->income = $temp;
        $total_income = 0;
        foreach ($temp as $item){
            $total_income += $item['sum'];
        }
        $this->total_income = $total_income;
        $this->total = $total_income - $this->total_consumption;
        $this->save();
    }

}
