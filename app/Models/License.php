<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class License extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $attributes = [
        'isActive'=> true
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'driver_id',
        'license_class_id',
        'issueDate',
        'expirationDate',
        'notes',
        'issueReason',
        'paidFees',
        'isActive',
        'created_by_user_id',
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
            'application_id' => 'integer',
            'driver_id' => 'integer',
            'license_class_id' => 'integer',
            'issueDate' => 'datetime',
            'expirationDate' => 'datetime',
            'paidFees' => 'decimal:2',
            'isActive' => 'boolean',
            'created_by_user_id' => 'integer',
        ];
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function person()
    {
        return $this->hasOneThrough(
            Person::class,
            Driver::class,
            'id',
            'id',
            'driver_id',
            'person_id'
        );
    }

    public function licenseClass(): BelongsTo
    {
        return $this->belongsTo(LicenseClass::class);
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter): Builder
    {
        return $filter->apply($builder);
    }
}
