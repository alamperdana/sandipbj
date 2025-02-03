<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('{{$target}}').DataTable({
            "ordering": false
        });
    } );
</script>


