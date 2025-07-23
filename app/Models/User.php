<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id',
        'userName',
        'password',
        'isActive',
        'isAdmin',
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
            'person_id' => 'integer',
            'isActive' => 'boolean',
            'isAdmin' => 'boolean',
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

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }
}
