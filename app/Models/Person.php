<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nationalityNo',
        'firstName',
        'lastName',
        'dateOfBirth',
        'sex',
        'address',
        'phone',
        'email',
        'imagePath',
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
            'dateOfBirth' => 'date',
        ];
    }

    public function driver() : hasOne
    {
        return $this->hasOne(Driver::class);
    }

    public function user() : hasOne
    {
        return $this->hasOne(User::class);
    }

    public function applications(): hasMany
    {
        return $this->hasMany(Application::class);
    }
}
