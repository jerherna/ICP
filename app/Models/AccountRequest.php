<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AccountRequest extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['church_name', 'location', 'about', 'description', 'vision', 'mission', 'email', 'mobile', 'denomination_affiliation', 'church_type', 'church_and_staff_leaders', 'telephone', 'facebook_handle', 'twitter_handle', 'instagram_handle', 'linkedin_handle', 'website_handle', 'status', 'request_status'];

    protected $auditExclude = ['cid', 'requestor', 'id'];

    protected $auditEvents = ['updated'];
}
