<!DOCTYPE html>
<html lang="ja">
<form action="{{ route('post') }}" method="post">
    {{ csrf_field() }}
    {{-- @for ($i = 0; $i < 10; $i++) --}}
    <input type="text" value="" name="name"/>
    <br>
    <input type="text" value="" name="username"/>
    <br>
    {{-- @if($request->session()) --}}
    <input type="text" value="" name="{{ old('username') }}"/>
    <br>
    <input type="text" value="" name="password"/>
    <br>
    {{ Form::file('photo') }}
    <br>
    {{-- @endfor --}}
    <input type="submit" value="送信">
</form>
</html>
