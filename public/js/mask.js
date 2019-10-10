/***** Funções para validar CPF - CNPJ - CEP *****/
function CPF() { "user_strict"; function r(r) { for (var t = null, n = 0; 9 > n; ++n)t += r.toString().charAt(n) * (10 - n); var i = t % 11; return i = 2 > i ? 0 : 11 - i } function t(r) { for (var t = null, n = 0; 10 > n; ++n)t += r.toString().charAt(n) * (11 - n); var i = t % 11; return i = 2 > i ? 0 : 11 - i } var n = "CPF Inválido", i = "CPF Válido"; this.gera = function () { for (var n = "", i = 0; 9 > i; ++i)n += Math.floor(9 * Math.random()) + ""; var o = r(n), a = n + "-" + o + t(n + "" + o); return a }, this.valida = function (o) { for (var a = o.replace(/\D/g, ""), u = a.substring(0, 9), f = a.substring(9, 11), v = 0; 10 > v; v++)if ("" + u + f == "" + v + v + v + v + v + v + v + v + v + v + v) return n; var c = r(u), e = t(u + "" + c); return f.toString() === c.toString() + e.toString() ? i : n } }

var CPF = new CPF();

window.onload = function () {

	if (id('cep')) {
		id('cep').onkeyup = function () {
			mascara(this, mCep);
		};
		id('cep').onblur = function () {
                    console.log(this.value);
			if (this.value.length == 10) {
				$.get("https://viacep.com.br/ws/" + this.value.replace(".", "").replace("-", "") + "/json/", function (data) {
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
		id('inicio').onkeyup = function () {
			mascara(this, mDate);
		};
		id('inicio').onblur = function () {
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
	v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
	v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
	v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
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