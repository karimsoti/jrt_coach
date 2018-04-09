<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/php', function() {
    echo phpinfo();
})->name('php');

Route::get('/', function () {

    $agent = DB::table('agents')->get();

    return view('main')->withAgent($agent);
})->name('home');


/**
 * return to default page(index) after user authentication 
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Creates entry and sends an email to Management
 */
Route::post('/submit_feedback', 'CoachingEntryController@insertCoachingEntry')->middleware('isAdmin')->name('submit_feedback');
Route::post('/mail', 'CoachingEntryController@sendMailToManagement');

/**
 * Retrieves all coaching entries 
 */
Route::get('/view_entries', 'CoachingEntryController@viewCoachingEntries')->name('view_entries')->middleware('auth');

/**
 * Named route manage_agents
 * references the manageAgents method in the AgentController
 */
Route::get('/manage_agent', 'AgentController@manageAgents')->name('manage_agent')->middleware('management');


/**
 * Inserts a new agent in a database after the information has been entered into the insertAgent view
 */
Route::post('/insert_agent', 'AgentController@insertAgent')->name('insert_agent')->middleware('auth');

Auth::routes();


/**
 * Goes to the team change tab of agent management
 */
Route::post('/change_team/{id}', 'AgentController@changeAgentsTeam')->name('change_team')->middleware('management');



/**
 * edit the completion status of a coaching entry 
 * Route accepts an ID which is used to find the coaching entry
 */
Route::post('/edit/{id}', 'CoachingEntryController@editEntry')->name('edit')->middleware('auth');


/**
 * Save the changes that were made in the edit.blade.php 
 */
Route::post('/saveChanges/{id}', 'CoachingEntryController@saveChanges')->name('saveChanges')->middleware('auth');

Route::post('/saveAgentTeamChange/{ids}', 'agentController@saveChanges')->name('saveAgentTeamChange')->middleware('auth', 'management');







Route::get('/dd2', function(Request $request) {
    $raw = DB::select(DB::raw("SELECT * 
                        FROM agents 
                        WHERE team_id =	
                            (select id 
                             from teams 
                             where managers_id = (select id from managers where email like 'jason.tadeo@soti.net'))"));

    dd($raw);
});


Route::get('/dd', function(Request $request) {
//    $lava = new \Khill\Lavacharts\Lavacharts;
//    $stocksTable = Lava::DataTable();  // Lava::DataTable() if using Laravel
//
//    $stocksTable->addDateColumn('Day of Month')
//            ->addNumberColumn('Projected')
//            ->addNumberColumn('Official');
//
//// Random Data For Example
//    for ($a = 1; $a < 30; $a++) {
//        $stocksTable->addRow([
//            '2015-10-' . $a, rand(800, 1000), rand(800, 1000)
//        ]);
//    }
////    $chart = \Lava::LineChart();
//    $chart = \Lava::LineChart('MyStocks', $stocksTable);
//    \Lava::render('LineChart', 'MyStocks', 'stocks-chart');

    $query = \DB::select(DB::raw("SELECT count(ce.id) as count, ce.jira_reason
                                FROM agents a
                                Join coaching_entries ce on ce.agent_id = a.id
                                WHERE team_id =	(select id from teams where team_lead_id =
                                                 (select id from team_leads where email = 'roberto.isaula@soti.net')) and 
                                ce.created_at <= DATE_SUB(curdate(), INTERVAL -1 week)
                             
                                                 GROUP BY ce.jira_reason"
    ));
//    dd($query);


    return view('charts')->with('query', $query);
});



Route::get('/dd3', function() {
//    $search = \Adldap::search()->where('cn', '=', 'Karim Abdelbaki')->get();
    $user = Adldap::search()->users()->find('john doe');

    dd($search);
});







Route::get('/middleware', function() {
    return view('layouts.welcome');
})->middleware(App\Http\Middleware\isAdmin::class);

Route::get('/mailTest', function() {


//    $managersEmail = \Illuminate\Support\Facades\DB::table('agents')
//            ->join('teams', 'agents.team_id', '=', 'teams.id')
//            ->join('managers', 'teams.managers_id', '=', 'managers.id')
//            ->select('managers.email')
//            ->where('agents.id', '=', 1)
//            ->get();

    $data = \DB::table('coaching_entries')->find(1);

    \Mail::to('karim.abdelbaki@soti.net')->send(new App\Mail\CoachingOpp($data));

//    \Mail::to($teamLeadsEmail)
//            ->cc($managersEmail)
//            ->send(new App\Mail\CoachingOpp);
    return view('layouts.welcome');
});

//
//Route::get('/dd3', function() {
//    $query = DB::select(DB::raw('SELECT te.id, tl.name 
//from teams te 
//join team_leads tl on tl.id=te.team_lead_id
//'));
//
//    dd($query);
//});
//Route::get('/dd', function(Request $request) {
////    $rowById = DB::table('coaching_entries')->select('jira_number')->where('id', '=', $id)->get()->first();
////    dd($jira->jira_number);
////    dd(gethostbyaddr($_SERVER['REMOTE_ADDR']));
//
//    $rowById = DB::table('coaching_entries')->select('jira_number')->where('id', '=', 1)->get()->first();
//
//    $comment = new App\Comments;
//    $comment->jira = $rowById->jira_number;
//    $comment->completed = 0;
//    $comment->manager_notes = '$request->managerNotes';
//    $comment->coached_by = '$request->coach';
//    $comment->user = \Auth::user()->email;
//    $comment->host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//    $comment->save();
//    $query = \DB::select(\DB::raw('SELECT a.name as agent_name, a.id as agent_id, te.id as team_id, tl.name as team_lead_name
//                                    FROM `agents` a
//                                    join teams te on a.team_id=te.id
//                                    join team_leads tl on te.team_lead_id = tl.id'));
//
//    dd($query);
//    $search = \Adldap::search()->where('cn', '=', 'Karim Abdelbaki')->get();
//    dd($search);
//
//    $managersEmail = \Illuminate\Support\Facades\DB::table('agents')
//            ->join('teams', 'agents.team_id', '=', 'teams.id')
//            ->join('managers', 'teams.managers_id', '=', 'managers.id')
//            ->select('managers.email')
//            ->where('agents.id', '=', 1)
//            ->get();
//
//    $teamLeadsEmail = \Illuminate\Support\Facades\DB::table('agents')
//            ->join('teams', 'agents.team_id', '=', 'teams.id')
//            ->join('team_leads', 'teams.id', '=', 'team_leads.id')
//            ->select('team_leads.email')
//            ->where('agents.id', '=', 1)
//            ->get();
//
//
////    return view('test')->with('tl', $teamLeadsEmail);
//    echo $teamLeadsEmail->first()->email;
//    dd($teamLeadsEmail->first()->email, $managersEmail->first()->email);
//});



//Route::get('/manage_agent', function() {
//    $team = DB::select(DB::raw('SELECT te.id, tl.name 
//                                from teams te 
//                                join team_leads tl on tl.id=te.team_lead_id'));
//
//    $agentsWithTeam = \DB::select(\DB::raw('SELECT a.name as agent_name, a.id as agent_id, te.id as team_id, tl.name as team_lead_name
//                                    FROM `agents` a
//                                    join teams te on a.team_id=te.id
//                                    join team_leads tl on te.team_lead_id = tl.id'));
//
//    return view('ManageAgent')->with(['team' => $team, 'agents' => $agentsWithTeam]);
//})->name('manage_agent');
//Route::get('/view_entries', function(Request $request) {
//    $email = Auth::user()->email;
//    $raw = DB::select(DB::raw("SELECT a.*, ce.*
//                        FROM agents a
//                        Join coaching_entries ce on ce.agent_id = a.id
//                        WHERE team_id =	
//                            (select id 
//                             from teams 
//                             where managers_id = (select id from managers where email like '$email'))")
//    );
////    dd($raw);
//    return view('dashboard')->with('entries', $raw);
//})->name('view_entries');