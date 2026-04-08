<?php 

namespace InterfacesClient;

interface CardIdoso {
    public function send($nome, $nasc, $sex, $end, $num, $bairro, $cep, $cidade, $uf,  $tel, $identidade, $expedicao, $expedido, $copiaRg, $nomeAqvRg, $comp = "", $cnh = "", $validadeCnh = "", $email = "",  $nomeRep = "", $emailRep = "", $endRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $identidadeRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "",$comprovanteRep = null, $nomeAqvCompRep = "");
}

interface CardDeficiente {
    public function send($nome, $nasc, $sexo, $endereco, $numEndereco, $bairro, $cep, $cidade, $uf, $tel, $numIdentidade, $expedicao, $expedido, $copiaRg, $nomeAqvRg, $nomeMedico, $crm, $telMedico, $localAtendMedico, $deficiencias, $periodoRestricaoMedica, $dataInicio, $cid, $atestadoMedico, $nomeAqvAtestado, $complementoBeneficiario = "" , $cnhBeneficiario = "", $validadeCnhBenef = "", $emailBeneficiario = "", $dataFim = "", $nomeRep = "", $emailRep = "", $enderecoRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $identidadeRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "", $comprovanteRep = null, $nomeAqvCompRep = "");
    public function update(array $infos, array $files);
    public function delete($numIdentidade);
}