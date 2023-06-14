<!-- Bootstrap bundle JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/pace.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!--app-->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
{{-- Icon --}}
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ asset('assets/js/icons-feather-icons.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://kit.fontawesome.com/15e3d83353.js" crossorigin="anonymous"></script>
{{-- Custom --}}
<script src="{{ asset('assets/js/custom.js') }}"></script>
{{-- Select2 js --}}
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
{{-- Swall js --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>







<script>
function modalDelete(title, name, url, redirect_link) {
  Swal.fire({
    title: `Delete ${title}`,
    text: `Are you sure delete ${name}?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
        `${name} has been deleted!`,
        'success'
      );

      $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          "_method": 'delete',
          "_token": "{{ csrf_token() }}"
        },
        success: function (data) {
          window.location.href = redirect_link
        },
        error: function (data) {
          $.alert('Failed!');
        }
      });
    }
  });
}





                
</script>
@stack('scripts')
