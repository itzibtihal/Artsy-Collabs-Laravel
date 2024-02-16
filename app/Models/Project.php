<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'budget',
        'start_date',
        'end_date',
        'requirements',
        'status',
        'description',
        'cover_image',
    ];

    const STATUS_RADIO = [
        0 => 'Pending',
        1 => 'Approved',
        2 => 'Declined',
    ];

    // protected $dates = ['start_date', 'end_date'];

  
public function artists()
{
    return $this->belongsToMany(User::class, 'project_artist', 'project_id', 'artist_id');
}

public function partners()
{
    return $this->belongsToMany(Partner::class, 'project_partner', 'project_id', 'partner_id');
}



}
