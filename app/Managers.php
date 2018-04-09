<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Managers
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Managers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Managers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Managers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Managers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Managers whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Managers extends Model
{
    //
}
