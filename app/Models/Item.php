<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'category_id', 'description', 'owner', 'price', 'status', 'condition', 'type', 'owner_name', 'address', 'contact_number'];
}
