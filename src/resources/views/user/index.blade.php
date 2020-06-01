<div class="container">
    @foreach ($users as $user)
        {{ $user->name }}
    @endforeach
</div>

{{-- {{ $users->links() }} --}}

{{-- {{ $users->appends(['sort' => 'votes'])->links() }} --}}

{{-- #fooがつく --}}
{{-- {{ $users->fragment('foo')->links() }} --}}
{{-- メインのペジネータリンクの両サイドに３つのリンクが表示されます。 --}}
{{-- {{ $users->onEachSide(5)->links() }} --}}

{{-- ビューへデータを渡す --}}
{{ $paginator->links('view.name', ['foo' => 'bar']) }}
