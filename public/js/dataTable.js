window.DataTableConfig = {
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
    "drawCallback": function(settings) {
        $('.dataTables_filter input[type="search"]').css({
            'width': '350px',
            'display':'inline-block',
            'padding': '7px 10px'
        });
        $(".dataTable thead tr th").css({
            'height': '20px'
        })
    },
    "language": {
        "decimal":        "",
        "emptyTable":     "Dữ liệu trống",
        "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty":      "Showing 0 to 0 of 0 entries",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Show _MENU_ entries",
        "loadingRecords": "Loading...",
        "processing":     "",
        "search":         "",
        "searchPlaceholder" : "Nhập vào từ khóa cần tìm",
        "zeroRecords":    "Không tìm thấy kết quả nào!",
        "paginate": {
            "first":      "First",
            "last":       "Last",
            "next":       "<i class='fa fa-arrow-right'></i>",
            "previous":   "<i class='fa fa-arrow-left'></i>"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }
}
