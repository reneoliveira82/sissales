<?php
//phpinfo();
$url = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : '';
echo $url;
if ($url == "cartaservicos.homologa.saebti.intranet") {
    header('Location: cartaservicos-homologa/');
}elseif ($url == "cartaservicos.desenv.saebti.intranet"){
    header('Location: cartaservicos-dev/');
}elseif ($url == "agendasalas.homologa.saebti.intranet"){
    header('Location: sas/');
}elseif ($url == "sacfacil.homologa.saebti.intranet"){
    header('Location: sacfacil/');
}elseif ($url == "gestaosac.homologa.saebti.intranet"){
    header('Location: gestaosac/GestaoSacHomologa/');
}elseif ($url == "cab50.homologa.saebti.intranet"){
    header('Location: cab50/');
}elseif ($url == "sa.homologa.saebti.intranet"){
    header('Location: sa/');
}elseif ($url == "findcall.homologa.saebti.intranet"){
    header('Location: findcall/');
}elseif ($url == "sacada.homologa.saebti.intranet"){
    header('Location: sacada/');
}elseif ($url == "sacocorrencia.homologa.saebti.intranet"){
    header('Location: sacocorrencia/');
}elseif ($url == "sistemainspecao.homologa.saebti.intranet"){
    header('Location: checklist_visita/');
}elseif ($url == "examesaeb.homologa.saebti.intranet"){
    header('Location: examesaeb/');
}elseif ($url == "sgr_suprev.homologa.saebti.intranet"){
    header('Location: sgr_suprev/');
}