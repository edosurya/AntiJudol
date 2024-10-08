<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Images;

class Creator extends Model
{
    use SoftDeletes, Notifiable;

    protected $guarded = [];
    protected $table = 'creators';

    const DEVICE1   = 1;
    const DEVICE2   = 2;

    const TYPE = [
        self::DEVICE1   => 'vivo',
        self::DEVICE2   => 'non vivo',
    ];

    const CATEGORY1   = 1;
    const CATEGORY2   = 2;
    const CATEGORY3   = 3;
    const CATEGORY4   = 4;
    const CATEGORY5   = 5;
    const CATEGORY6   = 6;

    const IMAGE_CATEGORY = [
        self::CATEGORY1   => 'portrait-photography',
        self::CATEGORY2   => 'street-photography',
        self::CATEGORY3   => 'series-photography',
        self::CATEGORY4   => 'still-life-photography',
        self::CATEGORY5   => 'night-photography',
        self::CATEGORY6   => 'nature-photography',
    ];

    const IMAGE_CATEGORY_2 = [
        self::CATEGORY1   => 'Portrait Photography',
        self::CATEGORY2   => 'Street Photography',
        self::CATEGORY3   => 'Series Photography',
        self::CATEGORY4   => 'Still Life Photography',
        self::CATEGORY5   => 'Night Photography',
        self::CATEGORY6   => 'Nature Photography',
    ];

    public function relatedImages(): HasMany
    {
        return $this->hasMany(Images::class, 'creator_id', 'id');
    }

}
