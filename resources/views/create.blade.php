@extends('layout')

@section('content')
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li style="font-weight: bold;">{{ $error }}</li>
    @endforeach
</ul>
@endif
<h4>Create Data</h4>
<form action="{{ route('storeData')}}" method="POST" class="mt-5">
    @csrf
    <input type="number" class="form-control" placeholder="Masukan NIS" name="nis"><br>
    <input type="text" class="form-control" placeholder="Masukan Nama" name="nama"><br>
    <select class="form-control" name="JK">
        <option value="Pria">Pria</option>
        <option value="Wanita">Wanita</option>
    </select><br>
    <input type="number" class="form-control" placeholder="Masukan Umur" name="umur"><br>
    <button type="submit" class="btn btn-success float-center">Send</button> <a href="{{ route('index') }}" class="btn btn-success">Back</a>
</form>
@endsection