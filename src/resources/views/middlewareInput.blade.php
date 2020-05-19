<!DOCTYPE html>
<html lang="ja">
    <form method="POST" action="{{ route('middlewareConfirm') }}">
        @csrf
        <div>Please your age write</div>
        <ul>
            <li><input type="text" name="age" value=""></li>
        </ul>
        <input type="submit" value="send">
    </form>
</html>
