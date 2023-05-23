@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Add Book') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST">
                        @csrf
                        <table class="table">
                            <tr>
                                <th width="30%">Book Name</th>
                                <td>
                                    <input type="text" name="name" class="form-control" aria-describedby="bookName" placeholder="Enter name">
                                </td>
                            </tr>
                            <tr>
                                <th width="30%">Assign to</th>
                                <td>
                                    <select multiple name="libraries[]" class="form-control">
                                    @foreach($libraries as $library)
                                    <option value="{{$library->id}}">{{$library->name}}</option>
                                    @endforeach
                                </select>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
