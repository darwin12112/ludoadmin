<?php

namespace App\Models\Kyc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kycdetail extends Eloquent
{
    use HasFactory;

     protected $fillable = [
            "document_number",
            "first_name",
            "last_name",
            "dob",
            "document_image",
            "document_type",
            "verification_status",
            "userid",
            "created_at",
        ];
}
