<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- connect to sdn bootstap --}}
    <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
              crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('post.index') }}">MAS-knowledge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('post.index') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('post.create') }}">Create post</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="wrapper">
        <div class="row">
          <div class="col-sm-2 menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    @foreach ($new_menu as $menu)
                    <p>
                        {{ $menu['category'] }}
                    </p>
                        @foreach ($menu['title'] as $menu_title)
                        <a class="nav-link active" href="{{ route('post.index', ['category' => $menu['category'], 'title'=>$menu_title]) }}">
                            {{ $menu_title }}
                        </a>
                        @endforeach
                    @endforeach
                  {{-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> --}}
                </li>

            </ul>
          </div>
          <div class="col-sm content">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @yield('content')
          </div>
        </div>
      </div>



{{-- у зависи должно быть название категории и ее имя
должна быть таблица в который содержаться названиея категорий
должна быть таблицы в которой есть название статей и их категории
у поста должна быть категория и название и контент. Создавая новую статью с определенным название создается новая запись в другой таблице, где появляется категория статьи и ее название.
Это должно быть реализовано на отдельной странице.
нужно почитать про миграции и так далее (во-первых нужно указывать index у таблиц которые связывваем, а также нужно прописывать в форен ки что делать при удаление и изменение, также к примеру если null устанавливаем при удаление то поле должно быть nullable())

нужно сделать чтобы в menu сами добавлялись записи при создании новой записи.


важен порядок миграций --}}

<style>

    .menu {
        background-color: lightsalmon;
        padding-right: 0;

    }

    .content {
        background-color: lightgreen;

    }
</style>

</body>
</html>

{{-- [
    {"id":1,"category":"laravel","title":"test1"},
    {"id":2,"category":"laravel","title":"test2"},
    {"id":3,"category":"linux","title":"test3"},
    {"id":4,"category":"linux","title":"test4"}
]

создать пустой массив
взять 1 элемент, если категория новая, создать подмасив указав новую ктаегорию и добавив товар
взять 2 элемент, если категория не новая, добавить в подмасив в title новый title

$test = [[]];
foreach($i = 0; $i < $menu; $i++) {
    if (!$i) {
        $test[0][$i] = $menu_item['category'];

    }

}


[
    [
        'category' => 'laravel',
        'title'    => ['test1', 'test2']
    ],
    [
        'category' => 'linux',
        'title'    => ['test3', 'test4']
    ]
] --}}

