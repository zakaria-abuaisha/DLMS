<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LicenseClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'className',
        'classDescription',
        'minimumAllowedAge',
        'defaultValidityLength',
        'classFees',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'minimumAllowedAge' => 'integer',
            'defaultValidityLength' => 'integer',
            'classFees' => 'decimal:2',
        ];
    }

    public function Licenses(): hasMany
    {
        return $this->hasMany(License::class);
    }

    public function LocalDrivingLicenseApplications(): hasMany
    {
        return $this->hasMany(LocalDrivingLicenseApplication::class);
    }

}
