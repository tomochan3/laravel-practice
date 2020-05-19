<!DOCTYPE html>
<html>
    {{-- さらに追加でPOSTパラメーターとしてCSRFトークンを確認したい場合は、LaravelのVerifyCsrfTokenミドルウェアがX-CSRF-TOKENリクエストヘッダもチェック --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form>
        @csrf
        <input type="text">
        <input type="submit">
    </form>
</html>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
