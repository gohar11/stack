<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
class EventsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        $events = Events::all();
        return view('events', compact('events'));
    }
    public function create(){
        return view('event');
    }

    public function store(Request $request)
    {
        $events =  new Events();
        $events->event_title = $request->get('title');
        $events->event_content = $request->get('body');
        $events->save();
        return redirect('events');
    }
    public function show($id)
    {
        $event = Events::find($id);
        return view('show_event', compact('event'));
    }
}
