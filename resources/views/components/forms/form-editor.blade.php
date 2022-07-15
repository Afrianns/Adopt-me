<label for="editor" class="form-label">
    <p class="fs-5 mt-5">Deskripsi</p>
</label>
@if($library != null)
<textarea class="form-control" id="editor" name="description" rows="3">
{{ $library['description'] }}
</textarea>
@else
<textarea class="form-control" id="editor" name="description" rows="3"></textarea>
@endif