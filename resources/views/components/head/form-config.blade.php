<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
</div>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code lists',
        menubar: "",
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist'
    });
</script>