<?php

namespace App\Models;

use App\Builders\EventBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    const PUBLISHED_STATUS = "published";
    const DRAFT_STATUS     = "draft";

    const VALID_STATUS = [
        self::PUBLISHED_STATUS,
        self::DRAFT_STATUS,
    ];

    protected $fillable = [
        "name",
        "description",
        "date",
        "destination",
        "status",
    ];
    protected $casts = [
        "date" => "date",
    ];

    public function newEloquentBuilder($query): EventBuilder
    {
        return new EventBuilder($query);
    }
}
