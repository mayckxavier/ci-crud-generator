<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class {{class_name}} extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->list_{{controller_name}}();
    }

    public function list_{{controller_name}}()
    {
        $this->load->model('{{model_name}}');
        ${{controller_name}} = $this->{{model_name}}->get_all();
        $this->loadTemplate('list', array(
            'message_type' => $this->message_type,
            'message' => $this->message,
            '{{controller_name}}' => ${{controller_name}}
        ));
    }

    public function create()
    {
        $this->loadTemplate('create', array(
            'message_type' => $this->message_type,
            'message' => $this->message
        ));
    }

    public function do_create(){
        $this->load->model('{{model_name}}');
        if (!$this->{{model_name}}->insert($this->input->post())) {
            $this->message_type = 'error';
            $this->message = validation_errors('', '<br />');
            $this->create();
        } else {
            $this->session->set_flashdata('messageType', 'success');
            $this->session->set_flashdata('messageText', '{{controller_name}} inserido com sucesso');
            redirect('{{controller_name}}');
        }
    }

    public function edit($user_id)
    {
        $this->load->model('{{model_name}}');
        ${{param_name}} = $this->{{model_name}}->get($user_id);
        if (count(${{param_name}}) == 0) {
            $this->session->set_flashdata('messageType', 'error');
            $this->session->set_flashdata('messageText', '{{param_name}} não existente');
            redirect('{{controller_name}}');
        } else {

            $this->loadTemplate('edit', array(
                'views_dir' => '{{controller_name}}',
                '{{param_name}}' => ${{param_name}}
            ));
        }
    }

    public function update()
    {
        $this->load->model('{{model_name}}');

        $retorno = $this->{{model_name}}->update($this->input->post('id'), $this->input->post());

        if ($retorno) {
            $this->session->set_flashdata('messageType', 'success');
            $this->session->set_flashdata('messageText', '{{controller_name}} editado com sucesso');
            redirect('{{controller_name}}');
        } else {
            $this->edit($this->input->post('id'));
        }
    }

    public function delete($id)
    {
        $this->load->model('{{model_name}}');
        if ($this->{{model_name}}->delete($id)) {
            $this->session->set_flashdata('messageType', 'success');
            $this->session->set_flashdata('messageText', '{{cap_param_name}} excluido com sucesso');
            redirect('{{controller_name}}');
        } else {
            $this->message_type = 'error';
            $this->message = 'Não foi possível excluir o {{cap_param_name}}. Tente novamente mais tarde';
            redirect('{{controller_name}}');
        }
    }
} 