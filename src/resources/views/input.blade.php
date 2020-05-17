<!DOCTYPE html>
<html lang="ja">
    <form action="{{ route('confirm') }}" method="post">
    @csrf
    <input type="text" name="name"/>
    <br>
    <input type="submit" value="送信">
    </form>
</html>
