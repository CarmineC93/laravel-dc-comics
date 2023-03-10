<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'thumb', 'price', 'series', 'sale_date', 'type'];
    //necessario per l'edit e l'update, deve autorizzare ogni cambiamento e iniezione di codice solamente sui campi
}
