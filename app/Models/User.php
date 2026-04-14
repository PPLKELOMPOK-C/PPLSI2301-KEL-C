<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * Kolom yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
    ];

    /**
     * Kolom yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Auto-hash password (Laravel modern)
        'deleted_at' => 'datetime',
    ];
    public function getAvatarUrl(): string
{
    return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
}

    /* =========================================================
     * HELPER ROLE
     * ========================================================= */

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPenghuni(): bool
    {
        return $this->role === 'penghuni';
    }

    public function isCalonPenghuni(): bool
    {
        return $this->role === 'calon_penghuni';
    }

    /* =========================================================
     * HELPER STATUS
     * ========================================================= */

    public function isAktif(): bool
    {
        return $this->status === 'aktif';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isNonaktif(): bool
    {
        return $this->status === 'nonaktif';
    }

    /* =========================================================
     * RELATIONSHIP
     * ========================================================= */

    public function pengajuanSewas()
    {
        return $this->hasMany(PengajuanSewa::class);
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }

    public function notifikasis()
    {
        return $this->hasMany(Notifikasi::class);
    }
    public function getDashboardRoute(): string
{
    return match ($this->role) {
        'admin' => route('admin.dashboard'),
        'penghuni' => route('penghuni.dashboard'),
        'calon_penghuni' => route('calon.dashboard'),
        default => '/',
    };
}

}
