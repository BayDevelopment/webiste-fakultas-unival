<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqsModel extends Model
{
    protected $table = 'faqs';
    protected $fillable = [
        'question',
        'answer',
        'answered_at',
        'is_active',
        // 'sort_order', // aktifkan kalau kamu pakai field ini
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'answered_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (FaqsModel $faq) {
            // Kalau jawaban diisi dan answered_at belum ada -> set sekarang
            if (filled($faq->answer) && blank($faq->answered_at)) {
                $faq->answered_at = now();
            }

            // Kalau jawaban dikosongkan -> answered_at ikut null
            if (blank($faq->answer)) {
                $faq->answered_at = null;
            }
        });
    }
}
