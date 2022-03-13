<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function () {
        let url = "{{ route('users.serverSideDataTable') }}"
        $('#serverSideDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": url,
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "created_at" , "render": function (data) {
                    return '<span class="badge badge-info">'+ new Date(data).toLocaleDateString() +'</span>';
                }},
                { "data": "updated_at" , "render": function (data) {
                    return '<span class="badge badge-success">'+ new Date(data).toLocaleDateString() +'</span>';
                }}
            ],
            "language": {
                "lengthMenu": " _MENU_ adet göster",
                "zeroRecords": "Aradığınız değer bulunamadı",
                "info": "_PAGE_ ile _PAGES_ sayfa arasındakiler gösteriliyor &nbsp;",
                "infoEmpty": "Hiç kayıt yok",
                "infoFiltered": "(_MAX_ değer arasından)",
                "search": "Ara:",
                "paginate": {
                    "first": "İlk",
                    "last": "Son",
                    "next": "İleri",
                    "previous": "Önceki"
                },
            },
            "dom": '<"top-custom"f>rt<"bottom-custom"ilp>'
        });
    })
</script>
