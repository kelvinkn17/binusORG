<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\activity;
use App\Models\event;
use App\Models\membership;
use App\Models\organization;
use App\Models\registration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $member = membership::select('organization_id')->where('user_id', $id);
        $activity = activity::whereIn('organization_id', $member)->get();
        $organization = organization::whereIn('id', $member)->get();
        $event = event::all();
        
        return view('home', compact('activity', 'event', 'organization'));
    }

    public function organization(){
        $data = organization::all();
        return view('user.organization', compact('data'));
    }

    public function handleAdmin()
    {
        $id = Auth::user()->organization_admin_id;
        $activity = activity::where('organization_id', $id)->get();
        $organization = organization::find($id);
        $event = event::where('organization_id', $id)->get();
        return view('adminHome', compact('activity', 'organization', 'event'));
    }

    public function organizationAdmin(){
        $data = organization::all();
        return view('admin.organization', compact('data'));
    }

    public function membershipAdmin(){
        $id = Auth::user()->organization_admin_id;
        $registration = registration::where('organization_id', $id)->get();
        $member = membership::where('organization_id', $id)->get();
        
    }

    public function addActivity(Request $request){
        $this->validate($request, [
            'activity' => 'min:3|required',
            'location' => 'min:3|required',
            'timeAndDate' => 'min:3|required',
        ]);

        $id = Auth::user()->organization_admin_id;
        $organization = organization::where('id', $id)->first();
        
        $activity = new activity;
        $activity->organization_id = $id;
        $activity->organization_name = $organization->name;
        $activity->activity = $request->activity;
        $activity->location = $request->location;
        $activity->timeAndDate = $request->timeAndDate;
        $activity->save();

        $data = organization::all();
        return redirect()->back();
    }

    public function deleteActivity($id){
        $data = activity::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function addEvent(Request $request){
        $this->validate($request, [
            'event' => 'min:3|required',
            'event_location' => 'min:3|required',
            'event_time' => 'min:3|required',
            'event_image' => 'required|image|mimes:jpeg,png,jpg|max:8192',
            'event_file' => 'required|image|mimes:jpeg,png,jpg,doc,docx,pdf|max:8192',
        ]);

        $event = new event;

        $id = Auth::user()->organization_admin_id;
        $organization = organization::where('id', $id)->first();

        $imageName = $organization->name.time().'.'.$request->event_image->extension();  
        $request->event_image->move(public_path('images/events'), $imageName);

        $fileName = $organization->name.time().'.'.$request->event_file->extension();  
        $request->event_file->move(public_path('images/events'), $fileName);

        $event->organization_name = $organization->name;
        $event->organization_id = $organization->id;

        $event->title = $request->event;
        $event->time = $request->event_time;
        $event->name = $request->event;
        $event->location = $request->event_location;
        $event->thumbnail = $imageName;
        $event->event_file = $fileName;

        $event->save();
        return redirect()->back();
    }

    public function deleteEvent($id){
        $data = event::find($id);
        $destinationPath = 'images/events/';
        File::delete($destinationPath.$data->image);

        $data->delete();
        return redirect()->back();
    }

    public function registerOrganization($id){
        $data = organization::find($id);
        return view('user.registerOrganization', compact('data'));
    }

    public function registerOrganizationSubmit($id, Request $request){
        $this->validate($request, [
            'description' => 'min:10|required',
        ]);

        $data = new registration;
        $user_id = Auth::user()->id;

        $data->user_id = $user_id;
        $data->organization_id = $id;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('home');
    }
}
