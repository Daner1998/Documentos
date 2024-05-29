<?php
class Errors extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    function index()
    {
        $data['title'] = 'Pagina no Encontrada';
        $this->views->getView('principal', 'errors', $data);
    }


}
