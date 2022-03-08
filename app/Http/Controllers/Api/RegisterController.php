<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Upazila;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\AttendanceLocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Api\BaseController as BaseController;

class RegisterController  extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */


     
    public function signup_account(Request $request)
    {
      
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $upazila = Upazila::find($request->upazila)->name;
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'upazila' => $upazila,
            'union' => $request->union,
            'designation' => $request->designation,
            'phone' => $request->phone,
        ]);

        Profile::create([
            'user_id' => $user->id,
        ]);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('My Token')->accessToken;
            $success['name'] = $user->name;
            $data['user'] = $user;
            $data['ip'] = Location::get(Upazila::where('name', $user->union)->first()->ip);
            $data['profile'] = $user->profile;
            $data['image_url'] = url('profile/' . $user->profile->photo);
            return $this->sendResponse($data, $success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
    public function updateProfile(Request $request)
    {
        $id = $request->user_id;
        if ($request->photo) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            ]);
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('profile'), $imageName);
        } else {
            $imageName = Auth::user()->profile->photo;
        }
        $upazila = Upazila::find($request->upazila)->name;
        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'upazila' => $upazila,
            'union' => $request->union,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        Profile::where('user_id', $id)->update([
            'address' => $request->address,
            'photo' => $imageName
        ]);

        $data['user'] = Auth::user();
        $data['ip'] = Location::get(Upazila::where('name', $request->union)->first()->ip);
        $data['profile'] = Auth::user()->profile;
        $data['image_url'] = url('profile/' . Auth::user()->profile->photo);

        return $this->sendResponse($data, 'Profile Updated successfully.');
    }

    function todaysAttendance()
    {
        $today_att = Attendance::where('user_id', Auth::user()->id)
            ->whereDate('created_at', Carbon::today())->first();

        if ($today_att) {
            $response = 'yes';
        } else {
            $response = 'no';
        }
        return $this->sendResponse($response, 'Todays Attendance Information.');
    }

    public function storeAttendance()
    {
        $today_att = Attendance::where('user_id', Auth::user()->id)
            ->whereDate('created_at', Carbon::today())->first();
        
        $ip = request()->ip();
        $user = Auth::user();
        $data['user'] = $user;
        $data['ip'] = Location::get(Upazila::where('name', $user->union)->first()->ip);
        $data['profile'] = $user->profile;
        $data['image_url'] = url('profile/' . $user->profile->photo);

        $currentUserInfo = Location::get($ip);
        if ($today_att) {
            if($today_att->punch == 0){
                $data = 'taken';
                return $this->sendResponse($data, 'Your Attendance for today already been taken');
            }
            $today_att->punch  = 0;
            $today_att->save();
            AttendanceLocation::create([
                'attendance_id' => $today_att->id,
                'action' => 'PUNCH_OUT',
                'ip' => $ip,
                'countryName' => @$currentUserInfo->countryName,
                'countryCode' => @$currentUserInfo->countryCode,
                'regionCode' => @$currentUserInfo->regionCode,
                'regionName' => @$currentUserInfo->regionName,
                'cityName' => @$currentUserInfo->cityName,
                'zipCode' => @$currentUserInfo->zipCode,
                'isoCode' => @$currentUserInfo->isoCode,
                'postalCode' => @$currentUserInfo->postalCode,
                'latitude' => @$currentUserInfo->latitude,
                'longitude' => @$currentUserInfo->longitude,
                'metroCode' => @$currentUserInfo->metroCode,
                'areaCode' => @$currentUserInfo->areaCode,
            ]);
            $data['action'] = 'PUNCH OUT DONE';
            return $this->sendResponse($data, 'Todays Punch OUT Successfull.');
        } else {
            $attendance = Attendance::create([
                'user_id' => Auth::user()->id,
                'upazilas' => Auth::user()->upazila,
                'unions' => Auth::user()->union,
                'designation' => Auth::user()->profile->designation,
            ]);

            AttendanceLocation::create([
                'attendance_id' => $attendance->id,
                'action' => 'PUNCH_IN',
                'ip' => $ip,
                'countryName' => @$currentUserInfo->countryName,
                'countryCode' => @$currentUserInfo->countryCode,
                'regionCode' => @$currentUserInfo->regionCode,
                'regionName' => @$currentUserInfo->regionName,
                'cityName' => @$currentUserInfo->cityName,
                'zipCode' => @$currentUserInfo->zipCode,
                'isoCode' => @$currentUserInfo->isoCode,
                'postalCode' => @$currentUserInfo->postalCode,
                'latitude' => @$currentUserInfo->latitude,
                'longitude' => @$currentUserInfo->longitude,
                'metroCode' => @$currentUserInfo->metroCode,
                'areaCode' => @$currentUserInfo->areaCode,
            ]);
            $data['action'] = 'PUNCH IN DONE';
            return $this->sendResponse($data, 'Todays Punch IN Successfull.');
        }
    }

    public function changePassword(Request $request)
    {
        
        $validated = $request->validate([
            'email' => ['required','email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user_exist = User::where('email', $request->email)->first();
        if(!$user_exist){
            return $this->sendResponse($request->email, 'This Email address does not match our record.');
        }else{
            $user_exist->password = Hash::make($validated['password']);
            $user_exist->save();
            return $this->sendResponse($user_exist, 'Password has been changed successfully.');
        }
    }
}
