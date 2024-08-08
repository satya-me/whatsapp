<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'contacts_allowed',
        'contact_id',
    ];

    public function contacts()
    {
        return $this->belongsToMany(Contacts::class, 'contact_groups', 'group_id', 'contact_id');
    }
}
