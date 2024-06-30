<?php

namespace App\Models\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Base\Treatment;
use App\Models\Illness;
use App\Models\IotData;
use App\Models\MedicalReport;
use App\Models\Medicine;
use App\Models\Message;
use App\Models\UserData;
use App\Traits\CanChat;
use App\Traits\HasAddress;
use App\Traits\HaveCover;
use App\Traits\Patient\CanMedicalFollow;
use App\Traits\PatientTrait;
use Exception;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $role
 */
class Patient extends Authenticatable implements FilamentUser
{
    use HaveCover;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use CanChat;
    use PatientTrait;
    use CanMedicalFollow;
    use HasAddress;


    public function get(Model |\Illuminate\Contracts\Auth\Authenticatable $record): string
    {
        return $this->profile_photo_url;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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


    public function illnesses(): BelongsToMany
    {
        return $this->belongsToMany(Illness::class, "user_illnesses");
    }

    public function medicalReports(): HasMany
    {
        return $this->hasMany(MedicalReport::class);
    }


    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function iot_data(): HasMany
    {
        return $this->hasMany(IotData::class);
    }

    public function user_data(): HasMany
    {
        return $this->hasMany(UserData::class);
    }

    /**
     * @throws Exception
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $panel->getId() == 'patient';
    }

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(
            Doctor::class,
            'medical_followings'
        );
    }

    public function routeNotificationForVonage(Notification $notification) : string
    {
        return '213558654521';
    }
}
