<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpenseReport
 * @package App
 */
class ExpenseReport extends Model
{
    public function expenses (){
        return $this->hasMany(Expense::class);
    }
}
