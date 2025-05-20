@vite(['resources/css/app.css', 'resources/js/app.js'])

<script>
    function showZoomLoading() {
        Swal.fire({
            title: 'Menghubungkan ke Zoom...',
            html: 'Tunggu sebentar ya 🙏',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }
</script>
