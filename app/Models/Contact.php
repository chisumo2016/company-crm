<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Contact
 *
 * @method static \Database\Factories\ContactFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|Contact onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withoutTrashed()
 */
class Contact extends Model
{
    use HasUuid;
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'preferred_name',
        'phone',
        'email',
        'pronouns',
    ];
}
