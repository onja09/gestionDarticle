 <div class="blocmembre">
     <h1>tous les membres</h1>
     <div class="membre">
         @foreach ($users as $user)
             <a href="{{ route('conversation.show', $user->id) }}">
                 <div class="toutmembre">
                     <div class="imaperso">
                         <div class="imaboxperso">
                             <img src="/storage/{{ $user->photo }}" alt="">
                         </div>
                     </div>
                     <h3>{{ $user->name }}</h3>
                 </div>
                 @if (isset($unread[$user->id]))
                     <span class="count">
                         {{ $unread[$user->id] }}
                     </span>
                 @endif
             </a>
         @endforeach
     </div>
 </div>
