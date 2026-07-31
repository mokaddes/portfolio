<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'portfolio_name',
        'portfolio_image',
        'favicon',
        'seo_image',
        'meta_title',
        'meta_description',
        'keywords',
        'is_captcha_enable',
        'captcha_key',
        'captcha_secret',
        'certificate_title',
        'certificate_issuer',
        'certificate_image',
    ];

    protected $casts = [
        'is_captcha_enable' => 'boolean',
    ];

    /**
     * The settings table holds a single row. Fetch it, creating the
     * row on first access if it does not exist yet.
     */
    public static function getSettings(): ?self
    {
        $settings = static::first();

        if (!$settings) {
            $settings = static::create([
                'portfolio_name' => 'Mokaddes Hosain',
            ]);
        }

        return $settings;
    }
}
