<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchBudget extends Model
{
    protected $fillable = [
        'itemList', 'amount', 'researchCategory', 'budgetInstallments',
    ];
}
