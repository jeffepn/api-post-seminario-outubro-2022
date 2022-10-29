@extends('template')

@section('title')
    Listagem de posts
@endsection

@section('breadcrump')
@parent
 / Post
@endsection

@section('content')

<h3> {!! $testVariable !!} </h3>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Título</th>
      <th scope="col">Contéudo</th>
      <th scope="col">Comentários</th>
      <th scope="col">Data de Publicação</th>
      <th scope="col">Data de Criação</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td> {{ $post->title }} </td>
            <td> {{ $post->preview_content }}</td>
            <td> {{ $post->comments()->count() }}</td>
            <td> {{ $post->available_at_pt}} </td>
            <td> {{ $post->created_at?->format('d-m-Y H:i')}} </td>
        </tr>
    @endforeach
    
    {{ $posts->links('pagination::bootstrap-5') }}
  </tbody>
</table>

@endsection

@push('script')
    <script src="caminho-do-meu-script"></script>
@endpush