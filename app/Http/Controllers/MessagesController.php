<?php

namespace SEO\Http\Controllers;

use SEO\Lib\PusherFactory;
use SEO\Message;
use SEO\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use SEO\Notification;
use SEO\Events\Notificacao;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * getLoadLatestMessages
     *
     *
     * @param Request $request
     */

    public function status_message(Request $request)
	{ 
        $messages = Message::Where('to_user',Auth::user()->id)->where('from_user', '=', $request->username)->orderBy('created_at', 'ASC')->get(); 
       
        
        foreach($messages as $message)
        {
            $message->message_read = 1;
            $message->save();
        }
       
    }
    
    public function getLoadLatestMessages(Request $request)
    {
       
        if(!$request->user_id) {
            return;
        }
  
        $messages = Message::where(function($query) use ($request) {
            $query->where('from_user', Auth::user()->id)->where('to_user', $request->user_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('from_user', $request->user_id)->where('to_user', Auth::user()->id);
        })->orderBy('created_at', 'ASC')->limit(10)->get();

        $return = [];

        foreach ($messages as $message) {

           $return[] = view('message-line')->with('message', $message)->render();
         
        }
        return response()->json(['state' => 1, 'messages' => $return]);
    }


    /**
     * postSendMessage
     *
     * @param Request $request
     */
    public function postSendMessage(Request $request)
    {
        if(!$request->to_user || !$request->message) {
            return;
        }

        $message = new Message();

        $message->from_user = Auth::user()->id;

        $message->to_user = $request->to_user;

        $message->content = $request->message;

        $message->save();


        // prepare some data to send with the response
        $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()));

        $message->dateHumanReadable = $message->created_at->diffForHumans();

        $message->fromUserName = $message->fromUser->name;

        $message->from_user_id = Auth::user()->id;

        $message->toUserName = $message->toUser->name;

        $message->to_user_id = $request->to_user;

        PusherFactory::make()->trigger('chat', 'send', ['data' => $message]);
        
        $registro =  User::where("id",  $request->to_user)->value('registro');

        Notification::create([
            'type' =>'Nova Mensagem Recebida',
            'data' => "Nova Mensagem de ".Auth::user()->name." ". Auth::user()->sobrenome,
            'to_user' => $registro,
        ]);			
        
        $notificacao_id = Notification::get('id')->last();
        $notiticacao_type = ["Message", $message->from_user_id,  $message->fromUserName, $message->to_user_id];
    
        //testa conexão com a interner antes de enviar uma notificação via pusher
        if(!$sock = @fsockopen('www.google.com', 80))
        {
            
        }
        else
        {
            event(new Notificacao($notificacao_id,  $notiticacao_type, "Você recebeu uma nova mensagem de ".Auth::user()->name." ". Auth::user()->sobrenome));
        }
        

        return response()->json(['state' => 1, 'data' => $message]);
    }


    /**
     * getOldMessages
     *
     * we will fetch the old messages using the last sent id from the request
     * by querying the created at date
     *
     * @param Request $request
     */
    public function getOldMessages(Request $request)
    {
        if(!$request->old_message_id || !$request->to_user)
            return;

        $message = Message::find($request->old_message_id);

        $lastMessages = Message::where(function($query) use ($request, $message) {
            $query->where('from_user', Auth::user()->id)
                ->where('to_user', $request->to_user)
                ->where('created_at', '<', $message->created_at);
        })
            ->orWhere(function ($query) use ($request, $message) {
            $query->where('from_user', $request->to_user)
                ->where('to_user', Auth::user()->id)
                ->where('created_at', '<', $message->created_at);
        })
            ->orderBy('created_at', 'ASC')->limit(10)->get();

        $return = [];

        if($lastMessages->count() > 0) {

            foreach ($lastMessages as $message) {

                $return[] = view('message-line')->with('message', $message)->render();
            }

            PusherFactory::make()->trigger('chat', 'oldMsgs', ['to_user' => $request->to_user, 'data' => $return]);
        }

        return response()->json(['state' => 1, 'data' => $return]);
    }

    	
	

}
