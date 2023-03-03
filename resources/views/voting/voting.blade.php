@extends('layout.mainlayout')

@section('content')
    <div class="container mt-5">
        <div class="row mt-5 justify-content-center">
            @foreach ($kandidat as $data)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <img src="https://esportsku.com/wp-content/uploads/2020/06/Kimmy-dragon-tamer.jpeg" width="100%" alt="">
                        <div class="text-center">
                            <h3>{{$data->user->name}}</h3>
                            @if(Auth::user()->token_vote != 1)
                            <form action="/voting/{{$data->id}}" method="post">
                                @csrf
                                <button class="btn btn-primary">Voting</button>
                            </form>
                            @else
                              <p>Anda Sudah Memilih</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            @foreach ($kandidat as $data)
            <div class="col-12 mt-5">
                <img src="https://esportsku.com/wp-content/uploads/2020/06/Kimmy-dragon-tamer.jpeg" width="90px" alt="">
                <p class="mb-0">{{$data->user->name}}</p>
                <div class="mt-3" style="background-color: blue;height: 30px; width:{{ ($data->vote / $count) * 100}}%;">{{round($data->vote / $count * 100)}}</div>
            </div>
            @endforeach
            {{-- <p>{{$countPhp}}</p> --}}
        </div>
    </div>
@endsection