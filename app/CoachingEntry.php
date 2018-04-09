<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Managers;

/**
 * App\CoachingEntry
 *
 * @property int $id
 * @property string $jira_number
 * @property string $jira_status
 * @property string $agent
 * @property int $agent_id
 * @property string $region
 * @property string $jrt_feedback
 * @property int $completed
 * @property string $manager_notes
 * @property string $coached_by
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property-read \App\Managers $manager
 * @property-read \App\TeamLead $teamLead
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereCoachedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereJiraNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereJiraStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereJrtFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereManagerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $jira_reason
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CoachingEntry whereJiraReason($value)
 */
class CoachingEntry extends Model {

    public function manager() {
        return $this->hasOne('App\Managers');
    }

    public function teamLead() {
        return $this->hasOne('App\TeamLead');
    }

}
