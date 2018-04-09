<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Teams
 *
 * @property int $id
 * @property int $team_lead_id
 * @property int $managers_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teams whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teams whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teams whereManagersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teams whereTeamLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Teams whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Teams extends Model
{
    //
}
