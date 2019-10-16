function configuracoes() {

    //mascara

    //datepicker
    ! function(a) {
        a.fn.datepicker.dates["pt-BR"] = { days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"], daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"], daysMin: ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa"], months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"], monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"], today: "Hoje", monthsTitle: "Meses", clear: "Limpar", format: "dd/mm/yyyy" }
    }(jQuery);
    $('.date').datepicker({
        language: 'pt-BR',
        todayBtn: "linked",
        format: 'dd/mm/yyyy',
        autoclose: true
    });
    //$('.date').attr('placeholder', 'DD/MM/AAAA');


    //tabela
    var table = $('.tabelaPT');

    var oTable = table.dataTable({
        "language": {
            url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
        },
        buttons: [],
        responsive: {
            details: {}
        },
        "order": [],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "Todos"] // change per page values here
        ],
        // set the initial value
        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

    });


    $('.fileinput-new').each(function(chave, dado) {
        $(this).html('<span class="btn blue-hoki btn-file">' +
            '<span class="fileinput-new"> Selecione o arquivo </span>' +
            '<span class="fileinput-exists"> Mudar </span>' +
            $(this).html() +
            '</span>' +
            '<span class="fileinput-filename"> </span> &nbsp;' +
            '<a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>');
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
        template: '<div class="popover confirmation" style="min-width: 210px">' +
            '<div class="arrow"></div>' +
            '<h3 class="popover-title"></h3>' +
            '<div class="popover-content text-center">' +
            '<div class="btn-group">' +
            '<a class="btn" data-apply="confirmation"></a>' +
            '<a class="btn" data-dismiss="confirmation"></a>' +
            '</div>' +
            '</div>' +
            '</div>',
        onConfirm: function() {
            var id = $(this); //.data('id');
            var funcao = $(this).data('funcao');

            window[funcao](id);

            //chamaFuncao(document.getElementById('comando'), funcao, id);
        },
        onCancel: function() {}
    });

    //Inclusão do asteristico nos campos obrigatorios
    $("[required]").each(function(index) {
        $("label[for=" + $(this).attr('id') + "]").html(
            $("label[for=" + $(this).attr('id') + "]").html() + " <span style='color:red'>*</span>"
        );
    });
    $('select[readOnly]').each(function(key, value) {
        var obj = $(this).find('option[selected]');
        $(this).html('');
        $(this).append(obj);
    });

    $(document).ready(function() {

        $('.select2').select2({
            allowClear: true,
            placeholder: "Selecione",
            width: null,
            language: {
                noResults: function() {
                    return "Não encontrado.";
                },
                searching: function() {
                    return 'Procurando…';
                },
                loadingMore: function() {
                    return 'Procurando mais resultados…';
                }
            }

        });
    });

    $("button[data-select2-open]").click(function() {
        $("#" + $(this).data("select2-open")).select2("open");
    });

}


//chama a funcao do controller
function chamaFuncao(formulario, funcao, dadoss) {
    //quando quiser mandar post sem formulario

    var comando = formulario.form;
    document.forms[comando.id].comando.value = funcao;

    // para quando quiser chamar uma funcao do controller e enviar POST com formulario desvinculado
    if (typeof dadoss === "undefined") {} else {
        document.forms[comando.id].dados.value = dadoss;
    }
    document.forms[comando.id].submit();

}




//territorio_identidade.php
function chamaModel(idModel, formulario, campos, dados) {

    for (var i = 0; i < campos.length; i++) {
        document.forms[formulario.id][campos[i]].value = dados[i];
    }
    $('#' + idModel).modal('show');
}


//cadastro_municipio.php e edita_municipio.php
function statusCampo(formulario, IdCampos, sufixIdBanco) {

    if (typeof sufixIdBanco === "undefined") {

        if (formulario.checked === true) {
            for (var i = 0; i < IdCampos.length; i++) {
                $("#" + IdCampos[i]).prop("disabled", false);
                //            alert(IdCampos[i]+sufixIdBanco + IdCampos.length);
            }
        } else {
            for (var i = 0; i < IdCampos.length; i++) {
                $("#" + IdCampos[i]).prop("disabled", true);

            }
        }

    } else {
        if (formulario.checked === true) {
            for (var i = 0; i < IdCampos.length; i++) {
                $("#" + IdCampos[i] + sufixIdBanco).prop("disabled", false);
                //            alert(IdCampos[i]+sufixIdBanco + IdCampos.length);
            }
        } else {
            for (var i = 0; i < IdCampos.length; i++) {
                $("#" + IdCampos[i] + sufixIdBanco).prop("disabled", true);

            }
        }
    }

}


var paginas = [
    ["perfil_permissao", "perfil_acesso"],
    ["cad_usuario", "usuario"],
    ["cad_local_atendimento", "local_atendimento"],
    ["cad_servico", "servico"],
    ["cad_servico_etapa", "servico"],
    ["cad_servico_taxa", "servico"],
    ["servico_etapa", "servico"],
    ["cad_servico_presencial", "servico"],
    ["cad_servico_web", "servico"],
    ["cad_servico_tel", "servico"],
    ["finalizado", "servico_finalizado"],
    ["validado", "servico_validado"],
    ["publicado", "servico_publicado"],
    ["validar", "validar_servico"],
    ["publicar", "publicar_servico"],
    ["log", "log_servico"]

];

var mapaDePaginas = new Map(paginas);

$('.start').each(
    function() {
        var a = $(this).children().attr('href').toString();
        var nova = a.split('/');
        var menupage = nova[nova.length - 1];
        var pathArray = window.location.pathname.split('/');
        //var newpage = pathArray[pathArray.length-1];

        //Servidor
        // var newpage = pathArray[pathArray, 2];

        //Local
        var newpage = pathArray[pathArray, 1];

        //opção com href 
        if (menupage === newpage) {
            $(this).addClass("active open");
        } else {
            if (mapaDePaginas.get(newpage)) {
                if (mapaDePaginas.get(newpage) === menupage) {
                    $(this).addClass("active open");
                } else {
                    var hr = $(this).children().find("li.nav-item");
                    var este = $(this);
                    hr.each(function() {
                        var np = $(this).children().attr('href');
                        var nova2 = np.split('/');
                        var menupage2 = nova2[nova2.length - 1];
                        if (mapaDePaginas.get(newpage) === menupage2) {
                            este.addClass("active open");
                            $(this).addClass("active open");
                        }
                    });
                }
                return;
            }
            var hr = $(this).children().find("li.nav-item");
            var este = $(this);
            hr.each(function() {
                var np = $(this).children().attr('href');
                var nova2 = np.split('/');
                var menupage2 = nova2[nova2.length - 1];
                if (menupage2) {
                    if (menupage2 == newpage) {
                        este.addClass("active open");
                        $(this).addClass("active open");
                    }
                }
            });
        }
    }
);

$('[readonly]').removeClass("date");
$('[readonly]').removeClass("date-picker");


configuracoes();



/***** Funções para validar CPF - CNPJ - CEP *****/
function CPF() {
    "user_strict";

    function r(r) { for (var t = null, n = 0; 9 > n; ++n) t += r.toString().charAt(n) * (10 - n); var i = t % 11; return i = 2 > i ? 0 : 11 - i }

    function t(r) { for (var t = null, n = 0; 10 > n; ++n) t += r.toString().charAt(n) * (11 - n); var i = t % 11; return i = 2 > i ? 0 : 11 - i }
    var n = "CPF Inválido",
        i = "CPF Válido";
    this.gera = function() {
        for (var n = "", i = 0; 9 > i; ++i) n += Math.floor(9 * Math.random()) + "";
        var o = r(n),
            a = n + "-" + o + t(n + "" + o);
        return a
    }, this.valida = function(o) {
        for (var a = o.replace(/\D/g, ""), u = a.substring(0, 9), f = a.substring(9, 11), v = 0; 10 > v; v++)
            if ("" + u + f == "" + v + v + v + v + v + v + v + v + v + v + v) return n;
        var c = r(u),
            e = t(u + "" + c);
        return f.toString() === c.toString() + e.toString() ? i : n
    }
}

var CPF = new CPF();

window.onload = function() {

        if (id('cep')) {
            id('cep').onkeyup = function() {
                mascara(this, mCep);
            };
            id('cep').onblur = function() {
                console.log(this.value);
                if (this.value.length == 10) {
                    $.get("https://viacep.com.br/ws/" + this.value.replace(".", "").replace("-", "") + "/json/", function(data) {
                        //console.log(data);
                        id('address').value = data.logradouro;
                        id('bairro').value = data.bairro;
                        id('cidade').value = data.localidade;
                        id('uf').value = data.uf;
                        id('num_ibge').value = data.ibge;
                        //console.log(data);
                    });
                }

            };
        };

        /*if (id('telefone')) {
        	id('telefone').onkeyup = function () {
        		mascara(this, mtel);
        	};
        	id('telefone').onblur = function () {
        		if (this.value.length < 14) {
        			this.value = "";
        		}
        	};
        };*/

        if (id('inicio')) {
            id('inicio').onkeyup = function() {
                mascara(this, mDate);
            };
            id('inicio').onblur = function() {
                if (v_obj.value.length < 10) {
                    v_obj.value = "";
                }
            };
        };

        /*if (id('cpf')) {
        	id('cpf').onkeyup = function () {
        		if (this.value.length <= 14) {
        			mascara(this, mCPF);
        		} else {

        			mascara(this, mCNPJ);
        		}
        	};
        	id('cpf').onblur = function () {

        		if (v_obj.value.length > 1 && v_obj.value.length < 14) {
        			v_obj.value = "";
        		} else if (v_obj.value.length > 14 && v_obj.value.length < 18) {
        			v_obj.value = "";
        		} else if ((CPF.valida($(this).val()) == "CPF Inválido") && v_obj.value.length == 14) {
        			alert(CPF.valida($(this).val()));
        			v_obj.value = "";
        		} else if (ValidarCNPJ($(this).val()) && v_obj.value.length == 18) {
        			alert("CNPJ Inválido");
        			v_obj.value = "";
        		}
        	};
        };*/

    }
    /***** FIM Funções para validar CPF - CNPJ - CEP *****/

/***** Mascaras *****/
function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)


}

function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function mDate(v) {
    v = v.replace(/\D/g, "");
    v = v.replace(/(\d{2})(\d)/, "$1/$2");
    v = v.replace(/(\d{2})(\d)/, "$1/$2");
    return v;
}

function mMesAno(v) {
    v = v.replace(/\D/g, "");
    v = v.replace(/(\d{2})(\d)/, "$1/$2");
    return v;
}


function mCep(v) {
    v = v.replace(/\D/g, "");
    v = v.replace(/(\d{2})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d)/, "$1-$2");
    return v;
}

function mCPF(v) {
    v = v.replace(/\D/g, "")
    v = v.replace(/(\d{3})(\d)/, "$1.$2")
    v = v.replace(/(\d{3})(\d)/, "$1.$2")
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
    return v;
}

function mCNPJ(v) {
    v = v.replace(/\D/g, "")
    v = v.replace(/(\d{2})(\d)/, "$1.$2")
    v = v.replace(/(\d{3})(\d)/, "$1.$2")
    v = v.replace(/(\d{3})(\d)/, "$1/$2")
    v = v.replace(/(\d{4})(\d{1,2})$/, "$1-$2")
    return v;
}

function id(el) {
    return document.getElementById(el);
}
/***** FIM Mascaras *****/


$('#etapa_taxa_valor').mask('#.##0,00', {
    reverse: true
});

if (id('telefone')) {
    id('telefone').onkeyup = function() {
        mascara(this, mtel);
    };
    id('telefone').onblur = function() {
        if (this.value.length < 14) {
            this.value = "";
        }
    };
}