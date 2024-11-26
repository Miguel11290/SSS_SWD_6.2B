<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Enbale Mass Assignment
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'address', 'company_id'];

    // Define a Many-to-One relationship with companies table
    public function company(){
        return $this->belongsTo(Company::class);
    }
}