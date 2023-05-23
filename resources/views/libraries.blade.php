@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Libraries') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">Library Name</th>
                              <th scope="col"># Books</th>
                              <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($libraries as $library)
                             <tr>
                                <td>{{$library->name}}</td>
                                <td>{{$library->books_count}}</td>
                                <td><a href="library/{{$library->id}}" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                             @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
