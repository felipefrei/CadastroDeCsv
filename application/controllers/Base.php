<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

  /**
    * Método construtor
    *
    * @access  public
    * @return  void
    */
    function __construct() {
        parent::__construct();
        $this->load->model('csv_model');
        $this->load->library('csvimport');
    }

  /**
    * Método que carrega a home
    *
    * @access  public
    * @return  void
    */
    function Index() {
        $this->load->view('home');
    }

  /**
    * Faz a improtação do CSV
    *
    * @access  public
    * @return  void
    */
    function ImportCsv() {
    // Zera a tabela customer_one_shipping
        $data['contatos'] = $this->csv_model->truncate_table();
        $data['error'] = '';

    // Define as configurações para o upload do CSV
        $arquivo    = $_FILES['csvfile']['tmp_name'];
        $nome       = $_FILES['csvfile']['name'];

        $ext            = explode(".", $nome);
        $extensao   = end($ext);

        $configuracao = array(
            'upload_path'   => 'assets/csv/',
            'allowed_types' => 'csv',
            'file_name'     => reset($ext). "_".date("Y-m-d"). "_". time().'.csv',
            'max_size'      => '20000'
        );

        $this->load->library('upload', $configuracao);

        // Se o upload falhar, exibe mensagem de erro na view
        if (!$this->upload->do_upload('csvfile')) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('home', $data);
        } else {

            $upload =array( 
                "url_csv"           => '/' . $configuracao['upload_path'].$configuracao['file_name'],
                "original_name"         => $nome,
                "formated_name"     => $configuracao['file_name'],
            );

            
            $this->csv_model->upload_csv($upload);  

            $file_data = $this->upload->data();
            $file_path =  'assets/csv/'.$file_data['file_name'];

      // Chama o método 'get_array', da library csvimport, passando o path do
      // arquivo CSV. Esse método retornará um array.
      $csv_array = $this->csvimport->get_array($file_path);
            if ($csv_array) {

        // Faz a interação no array para poder gravar os dados na tabela 'customer_one_shipping'
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'from_postcode' => $row['from_postcode'],
                        'to_postcode' => $row['to_postcode'],
                        'from_weight' => $row['from_weight'],
                        'to_weight' => $row['to_weight'],
                        'cost' => $row['cost'],
                    );

          // Insere os dados na tabela 'customer_one_shipping'
                    $this->csv_model->insert_csv($insert_data);
                }
                $this->load->view('finish');
            } else{
              $data['error'] = "Ocorreu um erro, desculpe!";
                $this->load->view('home', $data);
            }
        }

    }
}
