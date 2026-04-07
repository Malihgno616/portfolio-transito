<?php 

namespace Interfaces;

interface CardIdoso {
    public function send($nomeIdoso, $nascIdoso, $sexIdoso, $endIdoso, $numIdoso,  $bairroIdoso, $cepIdoso, $cidadeIdoso, $ufIdoso,  $telIdoso, $numDocIdoso, $expedicaoIdoso, $expedidoIdoso, $copiaRgIdoso, $nomeAqvRgIdoso,$compIdoso = "", $cnhIdoso = "", $validadeCnhIdoso = "", $emailIdoso = "",  $nomeRep = "", $emailRep = "", $endRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $numDocRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "",$comprovanteRep = null, $nomeAqvCompRep = "");
    public function update($idIdoso, $nomeIdoso, $nascIdoso, $sexIdoso, $endIdoso, $numIdoso,  $bairroIdoso, $cepIdoso, $cidadeIdoso, $ufIdoso,  $telIdoso, $numDocIdoso, $expedicaoIdoso, $expedidoIdoso, $copiaRgIdoso, $nomeAqvRgIdoso, $compIdoso = "", $cnhIdoso = "", $validadeCnhIdoso = "", $emailIdoso = "",  $nomeRep = "", $emailRep = "", $endRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $numDocRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "",$comprovanteRep = null, $nomeAqvCompRep = "", $updateRgIdoso = false, $updateRgRep = false, $updateCompRep = false);
    public function registerCard($id, $regNumber, $issueDate);
    public function delete($id);
}

interface CardDeficiente {
    public function send($nome, $nasc, $sexo, $endereco, $numEndereco, $bairro, $cep, $cidade, $uf, $tel, $numDoc, $expedicao, $expedido, $copiaRg, $nomeAqvRg, $nomeMedico, $crm, $telMedico, $localAtendMedico, $deficiencias, $periodoRestricaoMedica, $dataInicio, $cid, $atestadoMedico, $nomeAqvAtestado, $complementoBeneficiario = "" , $cnhBeneficiario = "", $validadeCnhBenef = "", $emailBeneficiario = "", $dataFim = "", $nomeRep = "", $emailRep = "", $enderecoRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $numDocRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "", $comprovanteRep = null, $nomeAqvCompRep = "");
    public function update($id, $nome, $nasc, $sexo, $endereco, $numEndereco, $bairro, $cep, $cidade, $uf, $tel, $numDoc, $expedicao, $expedido, $copiaRg, $nomeAqvRg, $nomeMedico, $crm, $telMedico, $localAtendMedico, $deficiencias, $periodoRestricaoMedica, $dataInicio, $cid, $atestadoMedico, $nomeAqvAtestado, $complementoBeneficiario = "" , $cnhBeneficiario = "", $validadeCnhBenef = "", $emailBeneficiario = "", $dataFim = "", $nomeRep = "", $emailRep = "", $enderecoRep = "", $numRep = "", $compRep = "", $bairroRep = "", $cepRep = "", $cidadeRep = "", $ufRep = "", $telRep = "", $numDocRep = "", $expedicaoRep = "", $expedidoRep = "", $copiaRgRep = null, $nomeAqvRgRep = "", $comprovanteRep = null, $nomeAqvCompRep = "", $updateRgBeneficiario = false, $updateAtestadoBeneficiario = false, $updateRgRep = false, $updateCompRep = false);
    public function registerCard($id, $regNumber, $issueDate);
    public function delete($id);
}
