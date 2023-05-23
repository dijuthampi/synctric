@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$books->name}}&nbsp;{{ __('Library Books') }}
                    <span style="float:right"><a href="/libraries" class="btn btn-sm btn-success">Back</a></span>
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
                              <th scope="col">Book Name</th>
                              <th scope="col">Status</th>
                              <th scope="col">Return Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($books->books as $book)
                            <tr>
                                <td>{{$book->name}}</td>
                                <td>{{$book->status}}</td>
                                <td>
                                    @if($book->status == "Out")
                                    {{$book->lentbooks[0]->return_date}}
                                    @else
                                    --
                                    @endif
                                </td>
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
