@extends('dashboard.layouts.main')
@section('container')
@if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<h1>Data Kelas</h1>
@if($isAuthenticated)
<a type="button" href="/kelas/create" class="btn btn-primary" style="color: white; margin-top: 5px; margin-right: 10px; margin-bottom: 15px;">Add New Data</a>
<form action="/dashboard/kelas/all" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search Kelas..." value="{{ request('query') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
@endif
<table  class="table">
<thead class="table-dark">
        <th>Kelas Siswa</th>
    </thead>
      @foreach ($kelass as $kelas)
        <tbody>
            <td>{{$kelas["kelas_siswa"]}}</td>
            <td>
                <a type="button" href="/kelas/detail/{{$kelas->id}}"  class="btn btn-primary"  style="color: black">Detail</a>
 @if($isAuthenticated)
                <a type="button" href="/kelas/edit/{{$kelas->id}}"  class="btn btn-warning">Edit</a>
                <form action="/kelas/delete/{{$kelas->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                        <button onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" type="submit" class="btn btn-danger" style="color: black">Delete</button>
                </form>
            @endif
                
        </td>
        </tbody>
    @endforeach
</table>
@if ($isAuthenticated)
        
@if ($kelass->total() > 0)
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div>
            {{ $kelass->links() }}
        </div>
        <div>
            Page {{ $kelass->currentPage() }} of {{ $kelass->lastPage() }} <!-- Page information -->
        </div>
    </div>
@endif


    @endif
@endsection