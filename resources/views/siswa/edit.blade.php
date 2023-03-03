@extends('layout.mainlayout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/siswa/{{$siswa->id}}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2" >Name</label>
                                <input type="text" value="{{$siswa->name}}" name="name" class="form-control" id="">
                                @error('name') <p>{{$message}}</p> @enderror
                            </div>
                        <div class="mb-3">
                            <label class="mb-2" >Email</label>
                            <input type="text" name="email" class="form-control" value="{{$siswa->email}}" id="">
                            @error('email') <p>{{$message}}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" >Password</label>
                            <input type="text" name="password" class="form-control" id="" value="">
                            @error('password') <p>{{$message}}</p> @enderror
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