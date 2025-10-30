<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Department;
use Carbon\Carbon;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "type",
        'department_id',
        'name',
        'email',
        'birth_date',
        'birth_place',
        'address',
        'registration_number',
        'password',
        'email_verified_at',
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
    ];

    function department() {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    function getAcademicYear() {
        $now = Carbon::now();
        $currentYear = $now->year;
        $currentMonth = $now->month;

        if ($currentMonth < 8) {
            $currentYear -= 1;
        }
        return $currentYear.' - '.$currentYear+1;
    }

    public function sendPasswordResetNotification($token) {
        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $this->email,
        ], false));

        $this->notify(new ResetPasswordNotification($url));
    }

    public function sendEmailVerificationNotification()
    {
        $url = route('verification.verify', [
            'id' => $this->getKey(),
            'hash' => sha1($this->getEmailForVerification()),
        ]);

        $this->notify(new VerifyEmailNotification($url));
    }

    function isProfileFilled() {
        if (
            $this->department_id == null ||
            $this->name == null ||
            $this->email == null ||
            $this->birth_date == null ||
            $this->birth_place == null ||
            $this->address == null ||
            $this->registration_number == null
        ) {
            return false;
        }

        return true;
    }
}
