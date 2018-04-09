SELECT * 
FROM agents 
WHERE team_id =	(select id from teams 
				 where manager_id = (select id from manager where email like 'jason.tadeo@soti.net'));
				 
				 
				 
				 
SELECT * 
FROM agents 
WHERE team_id =	(select id from teams 
				 where manager_id = (select id from manager where email = Auth::user()->email)
				 


DB::select(DB::raw("SELECT * 
                    FROM agents 
                    WHERE team_id =	
                        (select id 
                         from teams 
			 where managers_id = (select id from managers where email like 'jason.tadeo@soti.net'))")
			 
			 
			 
			 
			 ^^^^^^^^^^^^^working^^^^^^^^^^^^^^^^^^^^