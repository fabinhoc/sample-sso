<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy(TenantScope::class)]
class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'callback_url',
        'status',
        'client_id',
        'client_secret',
        'tenant_id',
        'is_sso'
    ];

    protected function casts(): array
    {
        return [
            'status' => ApplicationStatus::class,
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}
