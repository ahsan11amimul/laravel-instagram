@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="{{$user->profile->profileImage()}}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
             <div class="d-flex justify-content-between align-items-baseline">
                 <div class="d-flex align-items-center pb-3">   
                 <div class="h4">
                 {{$user->username}}
                 </div>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}" ></follow-button>
                 </div>
             
              @can('update', $user->profile)
                
              <a href="/post/create">add new Post</a>
             @endcan
            
             </div>
             @can('update', $user->profile)
             <a href="/profile/{{$user->profile->user_id}}/edit">
                 Edit Profile
             </a>    
             @endcan
            
             <div class="d-flex pt-2">
                 <div class="pr-3">
                 <strong class="pr-1">{{$user->posts->count()}}</strong> Post
                 </div>
                 <div class="pr-3">
                 <strong class="pr-1">{{$user->profile->followers->count()}}</strong> Followers
                 </div>
                 <div class="pr-3">
                 <strong class="pr-1">{{$user->following->count()}}</strong> Following
                 </div>
             </div>
             <div class="pt-3">
             <h3>{{$user->profile->title}}</h3>
             </div>
             <div>
             <p>{{$user->profile->description}}</p>
             </div>
             <div>
                 <a href="#">{{$user->profile->url}}</a>
             </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $item)
          <div class="col-4 pb-4">
             <a href="/post/{{$item->id}}">
                <img src="/storage/{{$item->image}}" class="w-100">
              </a>
          
         </div>   
        @endforeach
        
         
    </div>
</div>
@endsection
