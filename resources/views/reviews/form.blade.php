@csrf
<div class="md-form">
  <label>映画タイトル</label>
  <input type="text" name="movie_title" class="form-control" required value="{{$review->movie_title ?? old('movie_title') }}">
</div>
<div class="md-form">
  <input type="range" class="form-range" min="0" max="5" step="0.1" name="stars" required value="{{$review->stars ?? old('stars') }}">
</div>
<div class="md-form">
  <label>レビュータイトル</label>
  <input type="text" name="review_title" class="form-control" required value="{{$review->review_title ?? old('review_title') }}">
</div>
<div class="form-group">
  <label></label>
  <textarea name="review_body" required class="form-control" rows="16" placeholder="本文">{{$review->review_body ?? old('review_body') }}</textarea>
</div>
