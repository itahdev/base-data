<?php

namespace App\Models;

use App\Enums\ParkStatus;
use App\Enums\ParkStoryCommentAvailableFlag;
use App\Enums\ParkStoryReviewCheckDisplayFlag;
use App\Enums\ParkTerravieFlag;
use App\Enums\ParkTwoFactorAuth;
use App\Filters\Traits\Filterable;
use Database\Factories\DParkFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $image_path
 * @property string $park_user_id
 * @property bool $is_terravie
 * @property string $legal_register
 * @property ParkTwoFactorAuth $two_factor_auth_flag
 * @property ParkStoryReviewCheckDisplayFlag $story_comment_available_flag
 * @property ParkStoryReviewCheckDisplayFlag $story_review_check_display_flag
 * @property ParkStatus $status
 * @property ParkTerravieFlag $terravie_park_flag
 *
 * @method static DParkFactory factory($count = null, $state = [])
 * @method static Builder filter()
 * @method static Builder exclude()
 */
class DPark extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    use Filterable;

    /**
     * @var string
     */
    protected $table = 'd_parks';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'status',
        'terravie_park_flag',
        'name',
        'park_user_id',
        'image',
        'introduction',
        'post_code',
        'prefecture',
        'address',
        'telephone',
        'email',
        'contact_form',
        'open_close',
        'business_time_details',
        'stay_time',
        'breeding_kind_qty',
        'breeding_qty',
        'url',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'tiktok',
        'line',
        'two_factor_auth',
        'mirairo_id',
        'legal_register',
        'story_comment_available_flag',
        'two_factor_auth_flag',
        'story_review_check_display_flag',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'status' => ParkStatus::class,
        'terravie_park_flag' => ParkTerravieFlag::class,
        'two_factor_auth_flag' => ParkTwoFactorAuth::class,
        'story_review_check_display_flag' => ParkStoryReviewCheckDisplayFlag::class,
        'story_comment_available_flag' => ParkStoryCommentAvailableFlag::class,
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'deleted_at',
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
    public function parkUser(): BelongsTo
    {
        return $this->belongsTo(DParkUser::class, 'park_user_id');
    }

    /**
     * @return HasMany
     */
    public function parkUsers(): HasMany
    {
        return $this->hasMany(DParkUser::class, 'park_id');
    }
}
