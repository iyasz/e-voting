@extends('layout.mainlayout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/kandidat/{{$kandidat->id}}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="mb-2" >Nama kandidat</label>
                                <select name="user_id" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($user as $data)
                                       <option @if($kandidat->user_id == $data->id)selected @endif value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                  </select>
                                @error('user_id') <p>{{$message}}</p> @enderror
                            </div>
                        <div class="mb-3 text-end">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection