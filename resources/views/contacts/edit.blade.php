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
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Name:*</label>
                <input required type="text" class="form-control" name="name" value="{{ $contact->name }}" />
            </div>

            <div class="form-group">
                <label for="ticket">Contact:*</label>
                <input required type="phone" class="form-control" name="contact" value="{{ $contact->contact }}" />
            </div>

            <div class="form-group">
                <label for="value">E-mail:</label>
                <input required type="email" class="form-control" name="email" value="{{ $contact->email }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
