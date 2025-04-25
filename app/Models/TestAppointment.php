<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TestAppointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'test_type_id',
        'Local_dl_application_id',
        'appointmentDate',
        'paidFees',
        'created_by_user_id',
        'isLocked',
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
            'test_type_id' => 'integer',
            'Local_dl_application_id' => 'integer',
            'appointmentDate' => 'datetime',
            'paidFees' => 'decimal:2',
            'created_by_user_id' => 'integer',
            'isLocked' => 'boolean',
        ];
    }

    public function testType(): BelongsTo
    {
        return $this->belongsTo(TestType::class);
    }

    public function localDlApplication(): BelongsTo
    {
        return $this->belongsTo(LocalDrivingLicenseApplication::class);
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function test(): HasOne
    {
        return $this->hasOne(Test::class);
    }


}
