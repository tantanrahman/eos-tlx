<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeProfile extends Model
{
    use HasFactory;

    protected $table = 'officeprofile';

    protected $fillable = [
        'name'
    ];
}
