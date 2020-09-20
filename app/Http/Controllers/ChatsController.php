<?php

namespace App\Http\Controllers;
use App\User;
use App\Message;
use App\Events\MessageSent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\PrivateMessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatsController extends Controller
{
    protected $storage;
    protected $upload_path;
    public function __construct()
    {
        $this->middleware('auth');
        $this->upload_path = 'chat'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }


    public function index()
    {
        return view('chats');
    }

    public function private()
    {
        return view('privatechat');
    }

    public function fetchMessages()
    {
        return Message::with('user')->where('receiver_id',null)->get();
    }

    public function fetchprivateMessages(User $user)
    {
        $privateCommunication= Message::with('user')
        ->where(['user_id'=> auth()->id(), 'receiver_id'=> $user->id])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user->id, 'receiver_id' => auth()->id()]);
        })
        ->get();
        return $privateCommunication;
    }

    public function fetchUsers()
    {
        return User::where('id','!=',auth::id())->get();
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }

    public function sendPrivateMessage(Request $request,$user)
    {

            $input=request()->all();
            // dd($input);
            if(request()->has('file')){
                // dd('have');
                $filename = $this->uploadImage($input['file']);
                // dd($filename);
                $message=auth()->user()->messages()->create([
                    // 'user_id' => request()->user()->id,
                    'file' => $filename,
                    'receiver_id' => $user,
                ]);
            }
            else{
                // dd('not');
            $message=auth()->user()->messages()->create([
                // 'user_id' => request()->user()->id,
                'message' => $input['message'],
                'receiver_id' => $user,
            ]);
        }
        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();

        return response(['status'=>'Message private sent successfully','message'=>$message]);

    }
    public function uploadImage($featured_image)
    {
        $avatar = $featured_image;

        if (isset($featured_image) && !empty($featured_image)) {
            $exploaded_name = explode('.', $avatar->getClientOriginalName());

            $fileName = Str::random().'.'.$exploaded_name[1];
            while (Storage::exists('public/chat/'.$fileName)) {
                $fileName = Str::random().'.'.$exploaded_name[1];
            }

            $source=$featured_image;
            //compressing
            $quality=60;//0-9
            $dest="storage/".$this->upload_path.$fileName;
            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));
            // $path= $this->compress($source,$dest, $quality);// compressing images
            return $fileName;
        }
    }
}
