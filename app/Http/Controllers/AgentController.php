<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller {

    /**
     * 
     * @param Request $request
     * @return type
     * inserts new agent with a team into the database
     */
    public function insertAgent(Request $request) {

        try {
            $agent = new \App\Agent;
            $agent->name = $request->first_name . " " . $request->last_name;
            $agent->email = $request->email;
            $agent->team_id = $request->team_id;
            $agent->save();
        } catch (\Exception $ex) {
            abort(500, 'An error occurred with your request');
        }

        return view('success')->with('msg', 'A new agent has been added to the system');
    }

    /**
     * 
     * @param Request $request
     * @return type
     * view = ManageAgent 
     * $agentsWithTeam, returns the agent's name, TL's name as well as the associated Team ID 
     * 
     */
    public function manageAgents(Request $request) {


        return view('ManageAgent')->with(['team' => $this->getTeams(), 'agents' => $this->getAgents()]);
    }

    public function prepareAgentForTeamChange($agent_id, $team_id) {
        $changeTeam = \DB::table('agents')
                ->where('id', '=', $agent)
                ->update(['team_id' => $team]);
    }

    /**
     * 
     * @param type $agentId
     * @return type
     * 
     */
    public function changeAgentsTeam($agentId) {
        $agentWithTeam = \DB::select(\DB::raw('SELECT a.name as agent_name, a.id as agent_id, te.id as team_id, tl.name as team_lead_name
                                    FROM `agents` a
                                    join teams te on a.team_id=te.id
                                    join team_leads tl on te.team_lead_id = tl.id
                                    WHERE a.id = ' . $agentId . ';'))[0];


        return view('saveTeamChange')->with(['agent' => $agentWithTeam, 'team' => $this->getTeams()]);
    }

    public function getAgents() {
        $agents = \DB::table('agents')->select('id as agent_id', 'name as agent_name')->get();

        return $agents;
    }

    /**
     * 
     * @return type
     * The method returns the list of agents and their team/team leads
     */
    public function getAgentWithTeam() {
        $agentsWithTeam = \DB::select(\DB::raw('SELECT a.name as agent_name, a.id as agent_id, te.id as team_id, tl.name as team_lead_name
                                    FROM `agents` a
                                    join teams te on a.team_id=te.id
                                    join team_leads tl on te.team_lead_id = tl.id'));


        return $agentsWithTeam;
    }

    /**
     * @return type
     * Get the team ID and team lead id
     */
    public function getTeams() {
        $team = \DB::select(\DB::raw('SELECT te.id, tl.name 
                                from teams te 
                                join team_leads tl on tl.id=te.team_lead_id'));

        return $team;
    }

}
