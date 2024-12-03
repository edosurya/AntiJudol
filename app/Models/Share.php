<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Share extends Model
{
    use SoftDeletes, Notifiable;

    protected $guarded = [];
    protected $table = 'shares';

    const CHANNEL1   = 1;
    const CHANNEL2   = 2;
    const CHANNEL3   = 3;
    const CHANNEL4   = 4;

    const TYPE = [
        self::CHANNEL1   => 'facebook',
        self::CHANNEL2   => 'x',
        self::CHANNEL3   => 'instagram',
        self::CHANNEL4   => 'whatsapp',
    ];
}
