
<!doctype html>
<html lang="ja">
  <head>
    <title>Todoリスト</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
  <label class="switch">
    <input class="status" type="checkbox" data-name="done">
    <span class="slider round"></span>
  </label>
  <div class="container">
    <h1>Todos</h1>
    <div class="input_form">
      <form action="{{ url('/todos') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="body" class="" placeholder="やらなければいけないこと">
      </form>
    </div>
    <table border="1">
      @foreach ($todos as $todo)
      <tr>
        @if ($todo['done'] === 1)
        <td class="input_class">
          <form action="{{ url('/todos', $todo->id) }}" method="post">
            @method('PATCH')
            @csrf
            <input type="checkbox" checked="checked" value="{{$todo->id}}" name="check" id="new_todo_form">
          </form>
        </td>
        @else
        <td class="input_class">
          <form action="{{ url('/todos', $todo->id) }}" method="post">
            @method('PATCH')
            @csrf
            <input type="checkbox" value="{{$todo->id}}" name="check" id="new_todo_form">
          </form>
          </td>
        @endif
        <td>{{$todo->body}}({{$todo->done}})</td>
        <td class="delete_class">
          <form action="{{ url('/todos', $todo->id) }}" method="post">
            {{ csrf_field() }}
            <!-- {{$todo->done}} -->
            {{ method_field('delete') }}
            <button type="submit">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(function(){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
  $('input[name="check"]').change(function(event){
    // もしチェックが入ったら
    console.log('ok')
    var method = $(event.currentTarget).prop('checked') ? 'PATCH':'DELETE'
    var url = $(event.currentTarget).prop('checked') ? '/todos/1/done' : '/todos/1/cancel'
    $.ajax({
      type: method,
      url: url,
      datatype: "json",
      data: {
        "id": $("new_todo_form").val(),
      },
      //通信が成功した時
      success: function(data){
        console.log(data);
      }
    })
  });
  return false;
});
</script>