<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'country_code',
        'contact_no',
        'status',
        'group_id',
    ];
    public function groups()
    {
        return $this->belongsToMany(Groups::class, 'contact_groups', 'contact_id', 'group_id');
    }
}
