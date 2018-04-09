<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Agent
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $coach-entry-count
 * @property int $team_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereCoachEntryCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agent extends Model
{
    //
}
