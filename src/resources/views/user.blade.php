@can('update', $post)
    <!-- 現在のユーザーはポストを更新できる -->
@elsecan('create', App\Post::class)
    <!-- 現在のユーザーはポストを作成できる -->
@endcan

@cannot('update', $post)
    <!-- 現在のユーザーはポストを更新できない -->
@elsecannot('create', App\Post::class)
    <!-- 現在のユーザーはポストを更新できない -->
@endcannot

@if (Auth::user()->can('update', $post))
    <!-- 現在のユーザーはポストを更新できる -->
@endif

@unless (Auth::user()->can('update', $post))
    <!-- The 現在のユーザーはポストを更新できない -->
@endunless

@canany(['update', 'view', 'delete'], $post)
    // 現在のユーザーはポストとの更新、閲覧、削除ができる
@elsecanany(['create'], \App\Post::class)
    // 現在のユーザーはポストを作成できる
@endcanany

@can('create', App\Post::class)
    <!-- 現在のユーザーはポストを更新できる -->
@endcan

@cannot('create', App\Post::class)
    <!-- 現在のユーザーはポストを更新できない -->
@endcannot
