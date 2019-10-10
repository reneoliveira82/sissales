var geocoder;
var map;
var marker;

function abrirMapa() {
    $('#googleMapa').html('Carregando...');
    $('#myModal').modal();
    var lat, long;
    setTimeout(function () {
        lat = String($('#GEOLOCALIZACAO').val()).split(',')[0];
        long = String($('#GEOLOCALIZACAO').val()).split(',')[1];

        initialize(lat, long);
    }, 2000);
}



//configurações iniciais, sem isso qualquer outra função não funciona
function initialize(latit, longit) {
    var mLatit, mLogit

    if (latit == "") {
        latit = "-12.9497666";
        longit = "-38.43236439999998";
    }

    var mapProp = {
        center: new google.maps.LatLng(latit, longit),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    //digo que o mapa vai ser no googleMapa (está no modal)
    map = new google.maps.Map(document.getElementById("googleMapa"), mapProp);
    geocoder = new google.maps.Geocoder();
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(latit, longit),
        map: map,
        //efeito legal ao mudar o prego de posição
        animation: google.maps.Animation.DROP,
        draggable: true
    });

    //quando mover o prego
    google.maps.event.addListener(marker, 'dragend', function () {
        //pega a geolocalização atual e deixa entre parenteses
        var latCompleta = String(marker.getPosition());
        //geolocalização atual sem parentese
        var latitudeLimpo = latCompleta.substr(1, latCompleta.length - 2);
        //geolocalização dividido entre latitude e longitude
        var latit = String(latitudeLimpo).split(',')[0];
        var longit = String(latitudeLimpo).split(',')[1];

        //Latitude e Longitude em uma variavel 
        latlng = new google.maps.LatLng(latit, longit);
        //pega o endereço atráves da geolocalização
        geocoder.geocode({'latLng': latlng}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    
                    //atribui o endereço de onde está o prego aos inputs ENDERECO e ENDERECO_BUSCAR
                    $('#ENDERECO_BUSCAR').val(results[1].formatted_address);

                    //Atribui a geolocalização
                    $('#GEOLOCALIZACAO').val(latCompleta.substr(1, latCompleta.length - 2));
                    $('#latitude').val(latit);
                    $('#longitude').val(longit);

                    $("#GEOLOCALIZACAO_PREVIA").html("");
                    $("#GEOLOCALIZACAO_PREVIA").html("GEOLOCALIZAÇÃO: " + latCompleta.substr(1, latCompleta.length - 2));
                    
                    //Seperar o endereço em componentes
                    for(var i in results[1].address_components){
                        if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "route") {
                            if (typeof results[1].address_components[i].long_name != undefined){
                                var endereco = String(results[1].address_components[i].long_name).replace("'", "");
                            }
                        } else if(typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "street_number"){
                            if (typeof results[1].address_components[i].long_name != undefined){
                                var numero = String(results[1].address_components[i].long_name).replace("'", "");
                            }
                        } else if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[2] == "sublocality_level_1") {
                            if (typeof results[1].address_components[i].short_name != undefined){
                                var bairro = String(results[1].address_components[i].short_name);
                            }
                        } else if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "administrative_area_level_2") {
                            if (typeof results[1].address_components[i].long_name != undefined){
                                var cidade = results[1].address_components[i].long_name;
                            }
                        }else if(typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "administrative_area_level_1"){
                            if (typeof results[1].address_components[i].long_name != undefined){
                                var uf = results[1].address_components[i].short_name;                                        
                            }
                        }else if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "postal_code") {
                            if (typeof results[1].address_components[i].long_name != undefined){
                                var cep = results[1].address_components[i].long_name.toUpperCase();
                                cep = cep.replace(/\D/g, "");
                                cep = cep.replace(/(\d{2})(\d)/, "$1.$2");
                                cep = cep.replace(/(\d{3})(\d)/, "$1-$2");
                            }
                        }
                    }
                    endereco = (endereco != undefined) ? endereco + ', ' : '';
                    numero = (numero != undefined) ? 'Nº ' + numero + ', ' : '';
                    bairro = (bairro != undefined) ? 'Bairro ' + bairro : '';
                    cidade = (cidade != undefined) ? cidade + ' - ' : '';
                    uf = (uf != undefined) ? uf : '';
                    cep = (cep != undefined) ? cep: '';
                    $('#endereco').val(endereco + numero + bairro);
                    $('#municipio').val(cidade + uf);
                    $('#cep').val(cep);

                }
            } else {

            }
        });

    });

}

function carregarNoMapa() {
    var ENDERECO_BUSCAR = $("#ENDERECO_BUSCAR").val() != "" ? $("#ENDERECO_BUSCAR").val() : "";
    geocoder.geocode({'address': ENDERECO_BUSCAR + ' , Bahia , Brasil', 'region': 'BR'}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                latlng = new google.maps.LatLng(latitude, longitude);
                geocoder.geocode({'latLng': latlng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            
                            //Seperar o endereço em componentes
                            for(var i in results[1].address_components){
                                if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "route") {
                                    if (typeof results[1].address_components[i].long_name != undefined){
                                        var endereco = String(results[1].address_components[i].long_name).replace("'", "");
                                    }
                                } else if(typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "street_number"){
                                    if (typeof results[1].address_components[i].long_name != undefined){
                                        var numero = String(results[1].address_components[i].long_name).replace("'", "");
                                    }
                                } else if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[2] == "sublocality_level_1") {
                                    if (typeof results[1].address_components[i].short_name != undefined){
                                        var bairro = String(results[1].address_components[i].short_name);
                                    }
                                } else if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "administrative_area_level_2") {
                                    if (typeof results[1].address_components[i].long_name != undefined){
                                        var cidade = results[1].address_components[i].long_name;
                                    }
                                }else if(typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "administrative_area_level_1"){
                                    if (typeof results[1].address_components[i].long_name != undefined){
                                        var uf = results[1].address_components[i].short_name;                                        
                                    }
                                }else if (typeof(results[1].address_components[i]) === "object" && results[1].address_components[i].types[0] == "postal_code") {
                                    if (typeof results[1].address_components[i].long_name != undefined){
                                        var cep = results[1].address_components[i].long_name.toUpperCase();
                                        cep = cep.replace(/\D/g, "");
                                        cep = cep.replace(/(\d{2})(\d)/, "$1.$2");
                                        cep = cep.replace(/(\d{3})(\d)/, "$1-$2");
                                    }
                                }
                            }
                            endereco = (endereco != undefined) ? endereco + ', ' : '';
                            numero = (numero != undefined) ? 'Nº ' + numero + ', ' : '';
                            bairro = (bairro != undefined) ? 'Bairro ' + bairro : '';
                            cidade = (cidade != undefined) ? cidade + ' - ' : '';
                            uf = (uf != undefined) ? uf : '';
                            cep = (cep != undefined) ? cep: '';
                            $('#endereco').val(endereco + numero + bairro);
                            $('#municipio').val(cidade + uf);
                            $('#cep').val(cep);
                        }
                    } else {
                    }
                });
                
                //$('#endereco').val(results[0].formatted_address);
                $('#ENDERECO_BUSCAR').val(results[0].formatted_address);
                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
                $('#GEOLOCALIZACAO').val(latitude + ', ' + longitude);
                $("#GEOLOCALIZACAO_PREVIA").html("");
                $("#GEOLOCALIZACAO_PREVIA").html("GEOLOCALIZAÇÃO: " + String($('#GEOLOCALIZACAO').val()));

                var location = new google.maps.LatLng(latitude, longitude);
                marker.setPosition(location);
                map.setCenter(location);
                map.setZoom(18);
            }
        }
    });
    $('#googleMapa').html();

}