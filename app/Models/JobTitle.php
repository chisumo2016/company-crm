<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\JobTitle
 *
 * @method static \Database\Factories\JobTitleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|JobTitle onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|JobTitle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|JobTitle withoutTrashed()
 */
class JobTitle extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['name' ,'uuid'];
}
