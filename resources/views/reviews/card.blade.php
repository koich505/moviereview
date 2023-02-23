<div class="card mt-3">
  <div class="card-body d-flex flex-row">
    <i class="fas fa-user-circle fa-3x mr-1"></i>
    <div>
      <div class="font-weight-bold">
        {{$review->user->name}}
      </div>
      <div class="font-weight-lighter">
        {{$review->created_at}}
      </div>
    </div>

    @if( Auth::id() === $review->user_id )
    <!-- dropdown -->
    <div class="ml-auto card-text">
      <div class="dropdown">
        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <button type="button" class="btn btn-link text-muted m-0 p-2">
            <i class="fas fa-ellipsis-v"></i>
          </button>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="{{ route("reviews.edit", ['review' => $review]) }}">
            <i class="fas fa-pen mr-1"></i>記事を更新する
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $review->id }}">
            <i class="fas fa-trash-alt mr-1"></i>記事を削除する
          </a>
        </div>
      </div>
    </div>
    <!-- dropdown -->

    <!-- modal -->
    <div id="modal-delete-{{ $review->id }}" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('reviews.destroy', ['review' => $review]) }}">
            @csrf
            @method('DELETE')
            <div class="modal-body">
              {{ $review->movie_title }}を削除します。よろしいですか？
            </div>
            <div class="modal-footer justify-content-between">
              <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
              <button type="submit" class="btn btn-danger">削除する</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal -->
  @endif
      
  </div>
  <div class="card-body pt-0 pb-2">
    <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('reviews.show', ['review' => $review])}}">
        {{$review->movie_title}}
      </a>
    </h3>
  </div>
  <div class="card-body pt-0 pb-2">
    <h3 class="h4 card-title">
      {{$review->review_title}}
    </h3>
    <div>
      @for($i = 0; $i < $review->stars; $i ++)
        <i class="fas fa-star" style="color: yellow"></i>
      @endfor
    </div>
    <div class="card-text">
      {{$review->review_body}}
    </div>
  </div>
</div>
