@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add Contact</h1>
    <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('contacts.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input required type="text" class="form-control" name="name" value="{{ old('name')}}"/>
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input required type="phone" class="form-control" name="contact" maxlength="9" value="{{ old('contact')}}"/>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input required type="email" class="form-control" name="email" value="{{ old('email')}}"/>
            </div>
            <button type="submit" class="btn btn-primary">Add Contact</button>
        </form>
    </div>
    </div>
</div>
@endsection
