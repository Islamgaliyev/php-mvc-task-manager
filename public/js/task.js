$(document).ready(function () {
    $('#tasks').DataTable({
        "pagingType": "numbers",
        "lengthMenu": [3],
        "lengthChange": false,
        "searching": false
    });
});
