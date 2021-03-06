<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Account extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = ['church_name', 'location', 'about', 'description', 'vision', 'mission', 'email', 'mobile', 'denomination_affiliation', 'church_type', 'church_and_staff_leaders', 'telephone', 'facebook_handle', 'twitter_handle', 'instagram_handle', 'linkedin_handle', 'website_handle', 'status', 'change_request_by', 'church_photo'];
}
