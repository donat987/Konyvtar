<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = [
        "name",
        "dateOfBirth",
        "mobilNumber",
        "email",
        "townID",
        "town",
        "street",
        "houseNumber",
        "motherName",
        "type",
        "personID"
    ];
    use HasFactory;
}
