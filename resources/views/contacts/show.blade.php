@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editing Contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            {{ $contact->name }}
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            {{ $contact->contact }}
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            {{ $contact->email }}
        </div>
        <button type="submit" onclick="history.back()" class="btn btn-primary">Back</button>
    </div>
</div>
@endsection
