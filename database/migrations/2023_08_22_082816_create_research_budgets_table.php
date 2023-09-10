<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchBudgetsTable extends Migration
{
    public function up()
    {
        Schema::create('research_budgets', function (Blueprint $table) {
            $table->id();
            $table->string('itemList');
            $table->decimal('amount', 10, 2);
            $table->string('researchCategory');
            $table->integer('budgetInstallments');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('research_budgets');
    }
}
