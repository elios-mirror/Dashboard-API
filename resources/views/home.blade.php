@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if(auth()->user()->confirmed === false)
                            <div class="alert alert-warning">
                                Email not confirmed <a href="{{ url('/email/resend') }}" class="btn btn-info">Resend
                                    Email</a>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!

                    </div>

                </div>
            </div>

            <div class="col-md-8" style="padding-top: 20px">
                <div class="card">
                    <div class="card-header">Application Status</div>

                    <div class="card-body">
                      @foreach($modules as $m)
                        @if(auth()->user()->id === $m->publisher_id)
                          <table class="table">
                             <tr>
                               <th>Title</th>
                               <th>Name</th>
                               <th>Repository</th>
                               <th>Description</th>
                               <th>Logo</th>
                             </tr>
                             <tr>
                               <td>{{ $m->title }}</td>
                               <td>{{ $m->name }}</td>
                               <td>{{ $m->repository }}</td>
                               <td>{{ $m->description }}</td>
                               <td><img src="{{asset($m->logo_url)}}"/ width="50" height="50"></td>
                             </tr>
                          </table>
                        @endif
                      @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
