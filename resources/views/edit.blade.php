@extends('layout')

@section('content')
<h4>Edit Data</h4>
<form action="{{route('updateData', $data->id) }}" method="POST" class="mt-5">
    @csrf
    @method('PATCH')
    <input type="number" class="form-control" placeholder="Masukan NIS" name="nis" value="{{$data->nis}}"><br>
    <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" value="{{$data->nama}}"><br>
    <select class="form-control" name="JK">
        <option value="Pria" {{ $data->JK == "Pria" ? 'selected' : ''}}>Pria</option>
        <option value="Wanita" {{ $data->JK == "Wanita" ? 'selected' : ''}}>Wanita</option>
    </select><br>
    <input type="number" class="form-control" placeholder="Masukan Umur" name="umur" value="{{$data->umur}}"><br>
    <button type="submit" class="btn btn-success float-center">Send</button> <a href="{{ route('index') }}" class="btn btn-success">Back</a>
</form>
@endsection