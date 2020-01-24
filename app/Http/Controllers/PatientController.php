<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Carbon\Carbon;

class PatientController extends Controller
{
    function __construct()
    {
        $this->middleware('role:Doctor', ['only' => ['index','edit','update']]);
       // $this->middleware('role:Admin', ['only' => ['create','store','destroy','index','edit','update']]);
        $this->middleware('role:Patient', ['only' =>['profile']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::role('Patient')->orderBy('id','DESC')->paginate(5);
        return view('patients.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = User::role('Doctor')->get();
        return view('patients.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required|regex:([0-9\s\-\+\(\)]*)|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'doctor_id' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['created_at'] = Carbon::now();

        $user = User::create($input);

        $input['user_id'] = $user['id'];
        $patient = Patient::create($input);
        $user->assignRole('Patient');

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $doctor = User::find($user['doctor_id']);
        return view('users.show',compact('user','doctor'));
    }

    public function diagnosis($id)
    {
        $patient = Patient::find($id);
        $user = User::find($patient['user_id']);
        return view('users.diagnosis',compact('user','patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'address' => 'required',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }
        $input['updated_at'] = Carbon::now();

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function profile(){
        $user = Auth::user();
        $doctor = User::find($user['doctor_id']);
        return view('profile.index',compact('user','doctor'));
    }
}
