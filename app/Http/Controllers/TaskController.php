<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types[] = [ 'id' => 1 , 'name' => 'Support' ];
        $types[] = [ 'id' => 2 , 'name' => 'Maintain' ];
        $types[] = [ 'id' => 3 , 'name' => 'Change Requirement' ];
    
        $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
        $statuses[] = ['id' => 1, 'name' => 'completed'];
        $tasks = Task::all();
        return view('tasks.index')
                ->with([
                    'tasks'=> $tasks,
                    'types' => $types,
                    'statuses' => $statuses
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types[] = [ 'id' => 1 , 'name' => 'Support' ];
        $types[] = [ 'id' => 2 , 'name' => 'Maintain' ];
        $types[] = [ 'id' => 3 , 'name' => 'Change Requirement' ];
    
        $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
        $statuses[] = ['id' => 1, 'name' => 'completed'];
        return view('tasks.create')->with([ 'types'=> $types,'statuses' => $statuses ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'type' => 'required',
            'name' => 'required|max:255',
            'status' => 'required'
        ]);
        Task::create($request->all());
        return redirect()->back()->with('success','Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types[] = [ 'id' => 1 , 'name' => 'Support' ];
        $types[] = [ 'id' => 2 , 'name' => 'Maintain' ];
        $types[] = [ 'id' => 3 , 'name' => 'Change Requirement' ];
    
        $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
        $statuses[] = ['id' => 1, 'name' => 'completed'];
    
        $task = Task::find($id);
    
        $tasks = Task::all();
        if(empty($task)){
            return "Not found";
        }
        return  view('tasks.index')
                ->with([
                        'types'=> $types,
                        'statuses' => $statuses, 
                        'task'=> $task,
                        'tasks' => $tasks,
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task)
    {
        $validation = $request->validate([
            'type' => 'required',
            'name' => 'required|max:255',
            'status' => 'required'
        ]);
        
        $task->update(request()->all());
        return redirect()->back()->with('success','Edited Successfully !!');
    }

    public function updateStatus(Task $task){
        $task->update(request()->all());
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}