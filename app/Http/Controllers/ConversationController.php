<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;
use App\Repository\ConversationRepository;

class ConversationController extends Controller
{
    private $r;
    private $auth;
    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth){
            $this->r = $conversationRepository;
            $this->auth = $auth;
    }

    public function index(){
        return view('conversation.index', [
            'users' => $this->r->getConversations($this->auth->user()->id),
            'unread' => $this->r->unreadCount($this->auth->user()->id),
            'personnes' => $this->r->getAllUsers()
        ]);
    }

    public function show(User $user){
        $me = $this->auth->user();
        $messages = $this->r->getMessagesFor($me->id, $user->id)->paginate(3);
        $unread = $this->r->unreadCount($me->id);
        if(isset($unread[$user->id])){
            $this->r->readAllfrom($user->id, $me->id);
            unset($unread[$user->id]);
        }
        return view('conversation.show', [
            'users' => $this->r->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages' => $messages,
            'unread' => $unread
        ]);
    }

    public function store(User $user, Request $request){
        $this->r->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        return redirect(route('conversation.show', [$user->id]));
    }
    

}
