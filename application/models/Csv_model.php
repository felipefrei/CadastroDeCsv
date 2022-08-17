<?php

class Csv_model extends CI_Model {

  /**
    * Método construtor
    *
    * @access  public
    * @return  void
    */
    function __construct() {
        parent::__construct();
        $this->load->helper("validation");

    }

    /**
      * Recupera todos os registros da tabela 'shipping_customer_one'
      *
      * @access  public
      * @return  void
      */
    function truncate_table() {
        $query = $this->db->truncate('customer_one_shipping');
       return FALSE;
    }

    /**
      * Insere os dados na tabela 'shipping_customer_one'
      *
      * @access  public
      * @return  void
      */
    function insert_csv($data) {

        if( !post_code($data['from_postcode'] )){
            throw new Exception('from_postcode fora do padrão');
        }

        if( empty($data['from_postcode'] )){
            throw new Exception('from_postcode sem preenchimento');
        }
        
        if( !post_code($data['to_postcode'] )){
            throw new Exception('to_postcode fora do padrão');
            
        }

        if( empty($data['to_postcode'] )){
            throw new Exception('to_postcode sem preenchimento');
            
        }

        if( !decimal($data['from_weight'] )){
            throw new Exception('from_weight fora do padrão');
            
        }

        if( !decimal($data['to_weight'] )){
            throw new Exception('to_weight fora do padrão');
        }

        if( !decimal($data['cost'] )){
            throw new Exception('cost fora do padrão');
        }
       
        $this->db->insert('customer_one_shipping', $data);
    }

     /**
      * Insere os dados do arquivo csv tabela 'csv_upload'
      *
      * @access  public
      * @return  void
      */
    public function upload_csv ($upload = [])
    {
        try
        {
            $this->db->trans_begin();

            $resp = $this->db->insert('csv_upload', $upload);

            if( !$resp )
                throw new Exception("Erro ao inserir arquivo", 1);

            $this->db->trans_commit();
        }
        catch( Exception $e )
        {
            $this->db->trans_rollback();

            throw new Exception($e->getMessage(), 1);
        }
    }
}

