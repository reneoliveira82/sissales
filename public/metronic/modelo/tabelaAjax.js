//tabela
var table = $('.tabelaPT');

var oTable = table.dataTable({
    "language": {
        url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
    },
    buttons: [
    ],
    responsive: {
        details: {
        }
    },
    "order": [
    ],
    "lengthMenu": [
        [5, 10, 15, 20, -1],
        [5, 10, 15, 20, "Todos"] // change per page values here
    ],
    // set the initial value
    "pageLength": 20,
    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

});

$('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    popout: true,
    singleton: true,
    btnOkClass: 'btn btn-success',
    btnOkIcon: 'glyphicon glyphicon-ok',
    btnOkLabel: 'Sim',
    btnCancelClass: 'btn btn-danger',
    btnCancelIcon: 'glyphicon glyphicon-remove',
    btnCancelLabel: 'Não',
    template:
            '<div class="popover confirmation">' +
            '<div class="arrow"></div>' +
            '<h3 class="popover-title"></h3>' +
            '<div class="popover-content text-center">' +
            '<div class="btn-group">' +
            '<a class="btn" data-apply="confirmation"></a>' +
            '<a class="btn" data-dismiss="confirmation"></a>' +
            '</div>' +
            '</div>' +
            '</div>',
    onConfirm: function () {
        var id = $(this);//.data('id');
        var funcao = $(this).data('funcao');

        window[funcao](id);

        //chamaFuncao(document.getElementById('comando'), funcao, id);
    },
    onCancel: function () {
    }
});


$(function () {
  $('.tooltips').tooltip();
});