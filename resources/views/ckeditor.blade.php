<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5 Ckeditor Image Upload Example - ItSolutionStuff.com</title>

    <script src="{{ asset('PubAdmin/js/ckeditor/ckeditor.js') }}"></script>

</head>

<body>

  

<h1>Laravel 5 Ckeditor Image Upload Example - ItSolutionStuff.com</h1>

<textarea name="editor1"></textarea>

   

<script type="text/javascript">

    CKEDITOR.replace('editor1', {

        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",

        filebrowserUploadMethod: 'form'

    });

</script>

$msg2="$msg2="<script>Swal.fire({icon: 'success',title: 'موفقیت آمیز',text: 'آپلود با موفقیت انجام شد',confirmButtonText: 'باشه',});</script>";<script>Swal.fire({icon: 'success',title: 'موفقیت آمیز',text: 'آپلود با موفقیت انجام شد',confirmButtonText: 'باشه',});</script>";

</body>

</html>