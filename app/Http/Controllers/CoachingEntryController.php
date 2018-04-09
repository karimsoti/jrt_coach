<?php

namespace App\Http\Controllers;

//use App\Mail;
use Illuminate\Http\Request;
use App\CoachingEntry;
use \Illuminate\Support\Facades\DB;
use Adldap\Laravel\Facades\Adldap;

class CoachingEntryController extends Controller {

    /**
     * 
     * @param Request $request
     * @return type
     * @throws \Exception
     * returns all coaching entries of the logged in TL/Manager
     */
    public function viewCoachingEntries(Request $request) {


        $user = \Auth::user();
        $email = \Auth::user()->email;

        $raw;
        try {
            if ($user->isManager === 1) {
                $raw = DB::select(DB::raw("SELECT a.*, ce.*
                        FROM agents a
                        Join coaching_entries ce on ce.agent_id = a.id
                        WHERE team_id =	
                                        (select id from teams where managers_id = 
                                                                                   (select id from managers where email = '$email'))"
                                        . "order by ce.updated_at desc")
                );
            }
            else if ($user->isTeamLead === 1) {
                $raw = DB::select(DB::raw("SELECT a.*, ce.*
                        FROM agents a
                        Join coaching_entries ce on ce.agent_id = a.id
                        WHERE team_id =	
                                        (select id from teams where team_lead_id = 
                                                                                   (select id from team_leads where email = '$email'))"
                                        . "order by ce.updated_at desc  ")
                );
            }
            else if ($user->admin === 1) {
                $raw = DB::table('coaching_entries')
                        ->orderBy('updated_at', 'desc')
                        ->get();
            }
            else {
                throw new \Exception('You are not a part of management');
            }
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }


        return view('dashboard')->with(['entries' => $raw]);
    }

    /**
     * checks if the a user is logged ad get the email of that user
     */
    public function checkAuth() {
//        try {
//            $this->user = \Auth::user();
//            $this->email = \Auth::user()->email;
//        } catch (Exception $ex) {
//            
//        }
    }

    /**
     * 
     * @param Request $request
     * @return type
     * inserts new coaching entries and calls the sendmail button
     */
    public function insertCoachingEntry(Request $request) {

//        dd($request);

        date_default_timezone_set('America/New_York');

        try {
            $name = \DB::table('agents')->select('name')->where('id', '=', $request->agent)->get()->first()->name;
            $coachingEntry = new CoachingEntry;
            $coachingEntry->jira_number = $request->jiraNumber;
            $coachingEntry->jira_status = $request->jiraStatus;
            $coachingEntry->jira_reason = $request->jiraReason;

            $coachingEntry->agent = $name;
            $coachingEntry->agent_id = $request->agent;

            $coachingEntry->jrt_feedback = $request->jrtFeedback;
            $coachingEntry->completed = 0;

            $coachingEntry->save();
//          
        } catch (\Exception $ex) {
            abort(404, 'could not complete your request');
        }
        //        $this->sendMailToManagement($request);

        return view('success')->with('msg', 'A new coaching entry has been created');


        /**
         * 
         * @param Request $request
         * @return type
         * sends the email to the  TL/Manager that correspond with the agent
         */
    }

    public function sendMailToManagement(Request $request) {

        $managersEmail = DB::table('agents')
                ->join('teams', 'agents.team_id', '=', 'teams.id')
                ->join('managers', 'teams.managers_id', '=', 'managers.id')
                ->select('managers.email')
                ->where('agents.id', '=', $request->agent)
                ->get();

        $teamLeadsEmail = \DB::table('agents')
                ->join('teams', 'agents.team_id', '=', 'teams.id')
                ->join('team_leads', 'teams.id', '=', 'team_leads.id')
                ->select('team_leads.email')
                ->where('agents.id', '=', $request->agent)
                ->get();
//        $raw = \DB::table('agents')->find($request->agent);
//        \Mail::to('karim.abdelbaki@soti.net')->send(new \App\Mail\CoachingOpp($request));
        \Mail::to($teamLeadsEmail)->cc($managersEmail)->send(new \App\Mail\CoachingOpp($request));
        return view('success')->with('msg', 'The coaching oppurtunity was sucessfully mailed out');
    }

    /**
     * 
     * @param Request $request
     * @param type $id
     * @return type
     * Moves the request to the view that's responsible for saving changes that will take place on the coaching_entry table
     */
    public function editEntry(Request $request, $id) {


        try {
            $entry = \DB::table('coaching_entries')->find($id);
        } catch (\Exception $ex) {
            abort(500, 'an error occurred with your query');
        } catch (\PDOException $e) {
            abort(500, 'a database error occurred with your query');
        }

        return view('edit')->with('entry', $entry);
    }

    /**
     * 
     * @param Request $request
     * @param type $id
     * @return type
     * checks if the data coming from the view is valid that makes the necessary changes
     */
    public function saveChanges(Request $request, $id) {
        date_default_timezone_set('America/New_York');
//        $validate = $request->validate([
//            'completed' => 'required',
//            'managerNotes' => 'required',
//            'coach' => 'required'
//        ]);
//
//        dd($validate);
        try {

            $this->checkRequestValues($request);

            \DB::table('coaching_entries')
                    ->where('id', $id)
                    ->update(['completed' => (int) $request->completed, 'manager_notes' => $request->managerNotes, 'coached_by' => $request->coach, 'updated_at' => date("Y-m-d h:i:s")]);
            $this->logCoachingEntryChange($request, $id);
        } catch (\Exception $ex) {
            $entry = DB::table('coaching_entries')->find($id);
            return view('edit')->with(['exception' => $ex, 'id' => $id, 'entry' => $entry]);
        } catch (\PDOException $e) {
            abort(500, 'a database error occurred with your query');
        }
        return view('success')->with('msg', 'Your entry was saved');
    }

    /**
     * 
     * @param type $request
     * validates the data coming from the edit.blade form
     * used by saveChanges()
     */
    public function checkRequestValues($request) {
        if ($request->completed == null || empty($request->completed)) {
            throw new \Exception('The completion status was not changed');
        }
        else if ($request->coach == null || empty($request->coach)) {
            throw new \Exception('You did not enter a coach for this edit');
        }
        else if ($request->managerNotes == null || empty($request->managerNotes)) {
            throw new \Exception('You did not input any manager notes');
        }
//        $validate = $request->validate([
//            'completed' => 'required',
//            'managerNotes' => 'required',
//            'coach' => 'required'
//        ]);
//
//        dd($validate);
    }

    /**
     * 
     * @param type $request
     * @param type $id
     * logs the last changes that were made by a user, also stores HOST and EMAIL
     */
    public function logCoachingEntryChange($request, $id) {
        $rowById = DB::table('coaching_entries')->select('jira_number')->where('id', '=', $id)->get()->first();
        $comment = new \App\Comments();
        $comment->jira = strtoupper($rowById->jira_number);
        $comment->completed = $request->completed;
        $comment->manager_notes = $request->managerNotes;
        $comment->coached_by = $request->coach;
        $comment->user = \Auth::user()->email;
        $comment->host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $comment->save();
    }

}
