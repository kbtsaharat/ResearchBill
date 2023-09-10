<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    // Specify the table associated with this model
    protected $table = 'form_submissions';

    // Define the fillable fields that can be mass-assigned
    protected $fillable = [
        'bill_date',
        'project_name',
        'project_type',
        'description',
        'file_path', // You can add the appropriate field name for file paths if needed
        'quantity', // Add the new column to the fillable array
    ];

    // If your table has timestamps (created_at and updated_at columns)
    // and you want to utilize them, set this property to true
    public $timestamps = true;
}
