<?php

class Crud_Funcionario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
    }

    function get_funcionario($prodacto) {

        $this->gespol->select('funcio.td_run AS run,
                            funcio.td_digito AS digito,
                            funcio.td_primernombre AS primernombre,
                            funcio.td_segundonombre AS segundonombre,
                            funcio.td_apellidomaterno AS apellidopaterno,
                            funcio.td_apellidomaterno AS apellidomaterno,
                            funcio.td_correo AS correo,
                            funcio.td_fechanacimiento AS fechanac,
                            funcio.td_fono AS fono,
                            funcio.td_imagen AS img');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_prodfun fun', ' ON pac.idta_prodacto = fun.idta_prodacto');
        $this->gespol->join('ta_funcionario funcio', 'ON fun.idta_funcionario = funcio.idta_funcionario');
        $this->gespol->join('ta_entidad ent', 'ON funcio.idta_entidad = ent.idta_entidad');
        $this->gespol->join('ta_grado grad', 'ON funcio.idta_grado = grad.idta_grado');
        $this->gespol->where('pac.idta_prodacto  =', $prodacto);
        
        $query = $this->gespol->get();
        return $query->result_array();
        
        
        
    }
    
    

}
