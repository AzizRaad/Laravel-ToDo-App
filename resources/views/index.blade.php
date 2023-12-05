
<x-app>
    
@auth
<div class="row mt-3">

    @if (session()->has('success'))
          <div class="container container--narrow">
            <div class="alert alert-success text-center">
              {{session('success')}}
            </div>
          </div>            
        @endif

    <div class="col-12 align-self-center">
        <div class="container py-md-5 container--narrow">
            <div class="text-center">
              <h2>Hello <strong>{{auth()->user()->name}}</strong></h2>
            </div>
        </div>
        <ul class="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item"><a href="details/{{$todo->id}}" style="color: cornflowerblue">{{$todo->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>  
@endauth

    <div class="row mt-3">
    </div>

</x-app>
