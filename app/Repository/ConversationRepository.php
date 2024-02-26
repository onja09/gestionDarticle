<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Message;
use Carbon\Carbon;

class ConversationRepository {

    private $user;
    private $message;

    public function __construct(User $user, Message $message){
        $this->user = $user;
        $this->message = $message;
    }

    // affichier tous les membres sauf moi 
    public function getConversations(int $userId){
     $conversations = $this->user->newQuery()
                    ->select('name','photo','id')
                    ->where('id', '!=', $userId)
                    ->get();

            return $conversations;
    }

    // affichier toutes les images 
    public function getAllUsers(){
        return $this->user->newQuery()
                ->select('photo', 'name', 'id')
                ->get();
    }

    // creer les messages 
    public function createMessage(string $content, int $from, int $to){
      return $this->message->newQuery()->create([
            'content' => $content,
            'from_id' => $from,
            'to_id' => $to,
            'created_at' => Carbon::now()
        ]);
    }

    // affichier les messages 
    public function getMessagesFor(int $from, int $to): Builder
    {
       return $this->message->newQuery()
            ->whereRaw("((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
            ->orderBy('created_at', 'DESC')
            ->with([
                'from' => function($query){
                   return $query->select('name', 'id', 'photo');
                } 
            ]);
    }

    // recuperation des nombres de messages

    public function unreadCount(int $userId){
        return $this->message->newQuery()
                    ->where('to_id', $userId)
                    ->groupBy('from_id')
                    ->selectRaw('from_id, COUNT(id) as count')
                    ->whereRaw('read_at IS NULL')
                    ->get()
                    ->pluck('count', 'from_id');
    }

    // messages marquer lu
    public function readAllfrom(int $from, int $to){
        return $this->message->where('from_id', $from)->where('to_id', $to)->update(['read_at' => Carbon::now()]);
    }

}