@extends('layout.main')

@section('container')
<div class="container-about" style="text-align: center;">
  <h1 style="margin-bottom: 20px;">Tentang Saya</h1>
  <div style="margin-bottom: 20px;">
    <img src="{{$image}}" alt="" style="width: 200px; border-radius: 50%;">
  </div>
  <div style="margin-bottom: 20px;">
    <h4>Nama</h4>
    <p>{{$name}}</p>
  </div>
  <div style="margin-bottom: 20px;">
    <h4>Email</h4>
    <p>{{$email}}</p>
  </div>
  <div style="margin-bottom: 20px;">
    <h4>Kelas</h4>
    <p>{{$kelas}}</p>
  </div>
  <div style="margin-bottom: 20px;">
    <h4>Github</h4>
    <a href="{{$github}}" style="color: black;">{{$github}}</a>
  </div>
  <div style="margin-bottom: 20px;">
    <h4>Keahlian</h4>
    <div>
      <h5>PHP</h5>
      <div style="width: 50%; background-color: lightblue; height: 10px;"></div>
    </div>
    <div>
      <h5>Flutter</h5>
      <div style="width: 60%; background-color: lightblue; height: 10px;"></div>
    </div>
    <div>
      <h5>HTML</h5>
      <div style="width: 60%; background-color: lightblue; height: 10px;"></div>
    </div>
    <div>
      <h5>CSS</h5>
      <div style="width: 70%; background-color: lightblue; height: 10px;"></div>
    </div>
    <div>
      <h5>JavaScript</h5>
      <div style="width: 60%; background-color: lightblue; height: 10px;"></div>
    </div>
    <div>
      <h5>React</h5>
      <div style="width: 65%; background-color: lightblue; height: 10px;"></div>
      <div style="width: 65%; background-color: lightblue; height: 10px;"></div>
    </div>
  </div>
</div>
@endsection
