@extends('layouts.dash')

@section('title', 'Dashboard')


@section('content')
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Go to main Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          
        </ul>
        <a class="btn btn-outline-success" href="/logout">Logout</a>
      </div>
    </div>
  </nav>

  <section class="mt-3">

    <div class="container">
      <p><b>Name:</b> {{ $details->name }}</p>
      <p><b>Email:</b> {{ $details->email }}</p>
      <p><b>Amount in account:</b> {{ number_format($account->amount, 0) }} TZS</p>
    </div>


  </section>



@endsection