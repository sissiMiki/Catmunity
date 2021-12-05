
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Catmunity') }}</div>

                <div class="nav-item" style ="display:inline-flex">

                    <a class="nav-link" href="{{ route('home') }}">{{ __('Search') }}</a>|


                <a class="nav-link" href="{{ route('home') }}">{{ __('Profile') }}</a>|


                <a class="nav-link" href="{{ route('cats') }}">{{ __('Cat') }}</a>|


                <a class="nav-link" href="{{ route('home') }}">{{ __('Gallery') }}</a>|
            </div>

        </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>


  <div class="panel-default" >




          <form method="POST" action="/search" >

            {{  csrf_field()  }}

              <div class="col-md-5" >

                <div class="form-group">
                  <label class="sr-only" for="keyword">Key Word</label>
                  <input type="text" class="form-control" id="keyword" placeholder="Key Word" name="keyword">
                </div>
              </div>
              <div class="col-md-2">

                <div class="form-group">
                  <label class="sr-only" for="start_at">from</label>
                  <div class="input-group">
                    <input type="date" class="form-control" id="checkin" placeholder="Check in" name="start_at">
                  </div>
                </div>
              </div>
              <div class="col-md-2">

                <div class="form-group" >
                  <label class="sr-only" for="end_at">until</label>
                  <div class="input-group">
                    <input type="date" class="form-control" id="checkout" placeholder="Check out" name="end_at">
                  </div>
                </div>
              </div>
              <div class="col-md-1">

                <div class="form-group">

                  <label class="switch">
                    <br>
                    <input type="checkbox" name="check" value="yes">
                    <div class="slider round"></div>Available
                  </label>
                </div>
              </div>
              <div class="col-md-2">

                <div class="form-group">
                  <label class="sr-only" for="orderby">Order By</label>
                  <select id="orderby" name="orderby" class="form-control">
                    <option value="1">Most Recent</option>
                    <option value="2">Order by Name</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">



              <div class="col-md-6">
              <br>
                <button type="submit" class="btn btn-default btn-primary">Search</button>
              </div>
            </div>
            </div>





</form>


<div id="map"></div>


 </div>






@endsection


