@extends('layout.mainlayout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="/login" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label >Password</label>
                                <input type="text" name="password" class="form-control" id="">
                            </div>
                            <button class="btn btn-primary w-100 rounded-0">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection