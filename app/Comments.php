<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comments
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $jira
 * @property int $completed
 * @property string $manager_notes
 * @property string $coached_by
 * @property string $user
 * @property string $host
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereCoachedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereJira($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereManagerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comments whereUser($value)
 */
class Comments extends Model
{
    //
}
