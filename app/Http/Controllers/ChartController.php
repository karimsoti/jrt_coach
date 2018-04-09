<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller {

    public function getTeamWeeklyStats() {


        $query = \DB::select(DB::raw("SELECT count(ce.id) as count, ce.jira_reason
                                FROM agents a
                                Join coaching_entries ce on ce.agent_id = a.id
                                WHERE team_id =	(select id from teams where team_lead_id =
                                                 (select id from team_leads where email = '" . \Auth::user()->email . "')) and 
                                ce.created_at <= DATE_SUB(curdate(), INTERVAL -1 week)
                             
                                                 GROUP BY ce.jira_reason"
        ));
    }

}
