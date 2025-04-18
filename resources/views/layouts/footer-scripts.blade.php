
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('assets/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('assets/js/pages/dashboard.js') }}"></script>
<script>
$(document).ready(function(){
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy text-primary"></i>', // Icône Copier avec la classe de couleur "text-primary" de Bootstrap
                titleAttr: 'Copy'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel text-success"></i>', // Icône Excel avec la classe de couleur "text-success" de Bootstrap
                titleAttr: 'Excel'
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv text-warning"></i>', // Icône CSV avec la classe de couleur "text-warning" de Bootstrap
                titleAttr: 'CSV'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf text-danger"></i>', // Icône PDF avec la classe de couleur "text-danger" de Bootstrap
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print text-info"></i>', // Icône Imprimer avec la classe de couleur "text-info" de Bootstrap
                titleAttr: 'Print'
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-columns text-light"></i>', // Icône Visibilité des colonnes avec la classe de couleur "text-secondary" de Bootstrap
                titleAttr: 'Column Visibility'
            }
        ]
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const confirmLinks = document.querySelectorAll('[data-confirm]');
    confirmLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const message = this.getAttribute('data-confirm');
            Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = this.getAttribute('href');
                }
            });
        });
    });
});
</script>
    @if(session()->has('success'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session()->get('success')}}',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
    @endif
    @if (session()->has('error'))
    <script>
                Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{session()->get('error')}}',

            })
    </script>
    @endif
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
    	<!-- js -->
@yield('scripts')

