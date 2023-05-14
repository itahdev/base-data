<?php

namespace App\Models;

use App\Enums\ParkUserStatus;
use App\Enums\ParkAdminAuthorityFlag;
use App\Filters\Traits\Filterable;
use Database\Factories\DParkUserFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/**
 * @property string $id
 * @property ParkUserStatus $status
 * @property string $park_id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property ParkAdminAuthorityFlag $admin_authority_flag
 * @property DPark $dPark
 *
 * @method static DParkUserFactory factory($count = null, $state = [])
 * @method static Builder filter()
 */
class DParkUser extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    use HasUuids;
    use SoftDeletes;
    use Filterable;

    /**
     * @var string
     */
    protected $table = 'd_park_users';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'park_id',
        'name',
        'email',
        'display_name',
        'image',
        'admin_authority_flag',
        'memo',
        'introduction',
        'password',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'deleted_at',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'status' => ParkUserStatus::class,
        'admin_authority_flag' => ParkAdminAuthorityFlag::class,
    ];

    /**
     * @return array
     */
    protected function getFilters(): array
    {
        return [
           //
        ];
    }

    /**
     * @return BelongsTo
     */
    public function park(): BelongsTo
    {
        return $this->belongsTo(DPark::class, 'park_id');
    }

    /**
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
