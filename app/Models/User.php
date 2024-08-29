<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\SSORolesEnum;
use App\Models\Filters\Name;
use App\Models\Scopes\ApplicationScope;
use App\Models\Scopes\TenantScope;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

#[ScopedBy(TenantScope::class)]
#[ScopedBy(ApplicationScope::class)]
class User extends Authenticatable
{
    use HasFactory, Notifiable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_id',
        'avatar',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function applications(): BelongsToMany
    {
        return $this->belongsToMany(Application::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function isSuperUser()
    {
        return $this->hasSsoRole(SSORolesEnum::SUPER_USER);
    }

    public function isTenantAdmin()
    {
        return $this->hasSsoRole(SSORolesEnum::TENANT_ADMIN);
    }

    public function isTenantSupervisor()
    {
        return $this->hasSsoRole(SSORolesEnum::TENANT_SUPERVISOR);
    }

    public function isTenantUser()
    {
        return $this->hasSsoRole(SSORolesEnum::TENANT_USER);
    }

    public function hasSsoRole($roleId): bool
    {
        return $this->roles()->where('role_id', $roleId)->exists();
    }

    public function scopeSsoFilterUsers(Builder $query): void
    {
        $roles = Auth::user()->roles->pluck('id')->toArray();

        $isTenantSupervisor = in_array(SSORolesEnum::TENANT_SUPERVISOR->value, $roles);
        $isTenantAdmin = in_array(SSORolesEnum::TENANT_ADMIN->value, $roles);

        $query->where('id', '!=', Auth::user()->id);

        if ($isTenantSupervisor) {
            $query->whereDoesntHave('roles', fn ($query) =>
                $query->whereIn('roles.id', [SSORolesEnum::TENANT_ADMIN->value, SSORolesEnum::SUPER_USER->value])
            );
        }

        if ($isTenantAdmin) {
            $query->whereDoesntHave('roles', fn ($query) =>
                $query->whereIn('roles.id', [SSORolesEnum::SUPER_USER->value])
            );
        }
    }
}
