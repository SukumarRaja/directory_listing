<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the options for the activity log.
     *
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(array_diff($this->fillable, $this->hidden))
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? $this->defaultProfilePhotoUrl(),
        );
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        $emailHash = md5(strtolower(trim($this->email)));
        $initials = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://www.gravatar.com/avatar/'.$emailHash.'?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F'.urlencode($initials).'%2F128%2FEBF4FF%2F7F9CF5';
    }
}
