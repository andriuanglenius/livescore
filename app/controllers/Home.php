<?php
class Home extends Controller
{
    public function index()
    {
        
        return $this->view('home/index');

    }

    public function getData(){
        $data = [];
        $data['jsn'] = $this->model('Json_model')->data_json();

        //$data_json = $data['jsn'];

        $data['jsn'] = json_encode($data['jsn']);
        echo $data['jsn'];
    }
}


