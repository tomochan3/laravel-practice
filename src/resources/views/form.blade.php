
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
<form action="{{ route('confirm') }}" method="post">
    {{ csrf_field() }}
    <div>メールアドレス</div>
    <input type="text" name="email"　value="{{ old('email') }}"/>
    <div>住所</div>
    <input type="text" name="address" value="{{ old('address') }}"/>
    <input type="submit" value="送信"></button>
</form>

<!-- /resources/views/post/create.blade.php -->

<label for="title">Post Title</label>

<input id="title" type="text" class="@error('title') is-invalid @enderror">

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
