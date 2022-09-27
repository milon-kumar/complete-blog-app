<ul class="list-group">
    <a href="{{route('backend.setting.index')}}" class="{{Route::is('backend.setting.index') ? 'bg-happy-fisher-active text-white ' : ''}}bg-happy-fisher font-weight-bold  list-group-item-action list-group-item">Default Setting</a>
    <a href="{{route('backend.setting.appearance')}}" class="{{Route::is('backend.setting.appearance') ? 'bg-happy-fisher-active text-white ' : ''}}bg-happy-fisher font-weight-bold  list-group-item-action list-group-item">Appearance</a>
    <a href="{{route('backend.setting.table')}}" class="{{Route::is('backend.setting.table') ? 'bg-happy-fisher-active text-white ' : ''}}bg-happy-fisher font-weight-bold  list-group-item-action list-group-item">Table</a>
</ul>
