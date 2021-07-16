@extends('layouts.landing')

@section('title', 'Registration')
    
@section('content')
    
    <section class="mt-4">

        <div class="container">

            <form action="/register" method="POST">

                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>

                <div class="form-control mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>

                <div class="form-control mb-3">
                    <button class="btn btn-success">
                        Register
                    </button>
                </div>

            </form>

        </div>


    </section>



@endsection