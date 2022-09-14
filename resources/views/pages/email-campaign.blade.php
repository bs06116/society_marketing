<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="main-padding">
    <div class="table-card">
        <h1 class="heading">Email</h1>
        <form method="POST" action="{{route("submit-email")}}">
            @csrf
            <div class="row mb-3">
            <div class="col-sm-6">
                <div class="w-100">
                    <label class="theme-label">Send To</label>
                    <select id="send-to" name="user[]" multiple>
                        @foreach($users as $user)
                        <option {{$user->email}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="theme-label">Subject</label>
                <input type="text" class="theme-input" name="subject" placeholder="Subject">
            </div>
        </div>
        <textarea id="create-email" name="email_message"></textarea>
        <br>
        <button type="submit" class="theme-btn" style="width:150px;">Submit</button>

    </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#send-to').select2({
        placeholder: "Select contact",
        allowClear: true
    });
    tinymce.init({
        selector:'#create-email',
        plugins: 'table, textcolor, link, image, code, hr, lists, wordcount, fullscreen, preview, emoticons, textpattern, visualblocks, visualchars, nonbreaking, pagebreak, charmap, autosave, contextmenu, paste, searchreplace',
        // images_upload_url: '#',
        // images_upload_handler: image_upload_handler_callback,
        height: '600px',
        relative_urls : false,
        convert_urls : false
    });
});
</script>
@endpush