<ul class="share-buttons">
    <li><a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}&title={{ $description }}                            "
            title="Compartir en Facebook" target="_blank"><img alt="Compartir en Facebook" width="30px"
                src="/img/social/fb.png"></a></li>
    <li><a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $description }}&via={{ config('app.name') }}&hashtags={{ config('app.name') }}                            "
            target="_blank" title="Compartir en twitter"><img alt="Tweet" src="/img/social/twitter.png"
                width="30px"></a></li>
    <li><a href="https://www.google.com/bookmarks/mark?op=edit&bkmk={{ request()->fullUrl() }}&title={{ $description }}&annotation={{ $description }}&labels={{ config('app.name') }}       " target="_blank" title="Compartir en Google+"><img
                alt="Compartir en Google+" src="/img/social/google.png" width="30px"></a></li>
    <li><a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}                           "
            target="_blank" title="Compartir en pinterest"><img alt="Pin it" src="/img/social/pinterest.png"
                width="30px"></a></li>
</ul>
