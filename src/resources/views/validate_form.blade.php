
<h1>ポスト作成</h1>

{{-- {{ $errors->blog->first('email') }} --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('validate_confirm') }}" method="post">
    {{ csrf_field() }}
    <div>メールアドレス</div>
    <input type="text" name="title"　value="{{ old('title') }}"/>
    <div>住所</div>
    <input type="text" name="body" value="{{ old('body') }}"/>
    <input type="submit" value="送信"></button>
</form>

