<script>

    // Call the dataTables jQuery plugin
    $(document).ready(function () {
        $('#dataTable').DataTable({
            language: {
                url:'{{asset('/lang/pt-BR/datatable.json')}}'
            },
            select: true
        });

        $('#dataTable tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });
    });


</script>
