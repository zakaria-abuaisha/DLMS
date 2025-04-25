<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'personId',
        'userName',
        'password',
        'isActive',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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
            'personId' => 'integer',
            'isActive' => 'boolean',
        ];
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    function drivers(): hasMany
    {
        return $this->hasMany(Driver::class, 'created_by_user_id');
    }

    function createdDetainedLicenses(): hasMany
    {
        return $this->hasMany(DetainedLicense::class, "created_by_user_id");
    }

    function createdLicenses(): hasMany
    {
        return $this->hasMany(License::class, "created_by_user_id");
    }

    function releasedDetainedCards(): hasMany
    {
        return $this->hasMany(DetainedLicense::class, "released_by_user_id");
    }

    function createdTests(): hasMany
    {
        return $this->hasMany(Test::class, "created_by_user_id");
    }

    function createdTestAppointments(): hasMany
    {
        return $this->hasMany(TestAppointment::class, "created_by_user_id");
    }

    function createdApplications(): hasMany
    {
        return $this->hasMany(Application::class, "created_by_user_id");
    }
}
