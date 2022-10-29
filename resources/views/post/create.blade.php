@extends('template')

@section('title')
    Listagem de posts
@endsection

@section('breadcrump')
@parent
 / Criar Post
@endsection

@section('content')
<form action="{{route('post.register')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Título</label>
    <input value="{{old('title')}}" name="title" type="text" class="form-control" id="exampleFormControlInput1">
    @error('title')
    <small class="text-danger">{{$message}}</small>      
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Conteúdo</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('content')}}</textarea>
    @error('content')
    <small class="text-danger">{{$message}}</small>      
    @enderror
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3"> Salvar </button>
  </div>
</form>


<p class="text-success">
  {{ session('success') }}
</p>

<p class="text-danger">
  {{ session('error') }}
</p>

@endsection