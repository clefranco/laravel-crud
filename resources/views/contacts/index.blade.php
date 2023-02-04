@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Contacts</h1>
        <div>
            <a href="{{ route('contacts.create')}}" class="btn btn-primary mb-3">Add Contact</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Contact</td>
                <td>E-mail</td>
                <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}} </td>
                    <td>{{$contact->contact}}</td>
                    <td>{{$contact->email}}</td>
                    <td><a href="{{ route('contacts.show',$contact->id)}}" class="btn btn-primary">Show</a></td>
                    <td><a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection
