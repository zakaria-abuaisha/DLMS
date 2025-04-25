<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetainedLicense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_id',
        'detainDate',
        'fineFees',
        'created_by_user_id',
        'isReleased',
        'releaseDate',
        'released_by_user_id',
        'release_application_id',
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
            'license_id' => 'integer',
            'detainDate' => 'timestamp',
            'fineFees' => 'decimal:2',
            'created_by_user_id' => 'integer',
            'isReleased' => 'boolean',
            'releaseDate' => 'datetime',
            'released_by_user_id' => 'integer',
            'release_application_id' => 'integer',
        ];
    }

    public function license(): BelongsTo
    {
        return $this->belongsTo(License::class);
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function releasedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function releaseApplication(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}
