<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightcoral;
        }
    </style>
</head>
<body>
    <img src="{{ asset('img/R.jpg') }}" alt="">
    <h2>Ciao hai creato correttamente un post: {{$post->title}}</h2>
    <p>Categoria: {{ $post->category->label }}</p>
    <img src="{{ asset("storage/$post->image") }}" alt="">

{{-- //Tags --}}
    <ul>
       @forelse ( $post->tags  as $tag )
        <li>{{ $tag->label }}</li>
        @empty

        @endforelse
    </ul>

</body>
</html>
