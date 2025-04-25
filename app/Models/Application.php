<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_person_id',
        'applicationDate',
        'application_type_id',
        'applicationStatus',
        'lastStatusDate',
        'paidFees',
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
            'applicant_person_id' => 'integer',
            'applicationDate' => 'datetime',
            'application_type_id' => 'integer',
            'lastStatusDate' => 'datetime',
            'paidFees' => 'decimal:2',
            'created_by_user_id' => 'integer',
        ];
    }

    public function applicantPerson(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function applicationType(): BelongsTo
    {
        return $this->belongsTo(ApplicationType::class);
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
