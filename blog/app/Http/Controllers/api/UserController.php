<?php
namespace App\Http\Controllers\api;

use App\JobApply;
use App\JobPost;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Api is used to add the user.
     * @method post;
     * @param string name;
     * @param string email;
     * @param string password;
     * @return \Illuminate\Http\JsonResponse
     */
    public function AddUser(Request $request)
    {
        $data = [];
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        if ($user->save()) {
            $data['status'] = 200;
        } else {
            $data['error'] = 'Data not save';
        }
        return response()->json($data);
    }

    /**
     * Api is used to create a new job post
     * @param string title;
     * @param string description;
     * @param integer vacancy;
     * @method post
     * @return \Illuminate\Http\JsonResponse
     */
    public function CreatePost(Request $request)
    {
        $data = [];
        $job = new JobPost();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->vacancy = $request->vacancy;
        $job->state_id = 1;
        if ($job->save()) {
            $data['status'] = 200;
        } else {
            $data['error'] = 'data not save';
        }
        return response()->json($data);
    }

    /**
     * User can apply on the post by hitting this api
     * @param integer job_id;
     * @method post;
     * @return \Illuminate\Http\JsonResponse
     */
    public function ApplyPost(Request $request)
    {
        $data = [];
        $model = new JobApply();
        $model->user_id = $request->user_id;
        $model->job_id = $request->job_id;
        if ($model->save()) {
            $data['status'] = 200;
        } else {
            $data['error'] = 'data not save';
        }
        return response()->json($data);
    }
}
