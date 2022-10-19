<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'elements',
        'company_id',
        'created_by',
        'valid_since',
        'valid_until'
    ];
    /**
     * Get the company that owns the Certificate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected $casts = [
        'valid_since' => 'date:Y-m-d',
        'valid_until' => 'date:Y-m-d',
    ];
}
