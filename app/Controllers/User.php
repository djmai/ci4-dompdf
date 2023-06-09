<?php namespace App\Controllers;
/**
* THIS CONTROLER CODEIGNITER 4
* Codeigniter Version 4.x
* Generated by LigatCode
**/
use App\Models\UserModel;

class User extends BaseController
{
    /**
	 * Class constructor.
     */	
    protected $PageData;
    protected $Model; //Default Models Of this Controler
    protected $pager;
	public function __construct()
	{
		$this->Model = new UserModel(); //Set Default Models Of this Controler
        $this->PageData = $this->attributePage(); //Attribute Of Page
        $pager = \Config\Services::pager();
    }
    
    //ATRIBUTE THIS PAGE
    private function attributePage()
	{
		return  [
			'title' => 'LigatCode | User',
			'app' => 'LigatCode',
		];
    }

    //INDEX 
    public function index()
	{
		$data = [
			'AttributePage' =>$this->PageData,
			'content' => 'Create Pages',
            'data' => $this->Model->paginate(5, 'paging'),
            'pager' => $this->Model->pager
		];
		return view('user/index_sys_user', $data);
    }

    //READ
    public function read($id)
	{
		$data = [
			'AttributePage' => $this->PageData,
			'content' => 'Read Pages',
			'data' => $this->Model->find($id) //find on data
		];
		return view('user/read_sys_user', $data);
    }

    //CREATE
    public function create()
	{
		$data = [
			'AttributePage' => $this->PageData,
			'content' => 'Create Pages',
			'action' => site_url('User/create_action'),
			'data' =>   [
					     'id' => set_value('id'),
					     'user' => set_value('user'),
					     'email' => set_value('email'),
					     'password' => set_value('password'),
					     'idrol' => set_value('idrol'),
					     'creado_at' => set_value('creado_at'),
					     'creado_by' => set_value('creado_by'),
					     'actualizado_at' => set_value('actualizado_at'),
					     'actualizado_by' => set_value('actualizado_by'),
					     'borrado_at' => set_value('borrado_at'),
					     'borrado_by' => set_value('borrado_by'),
					    ]
		];
		return view('user/form_sys_user', $data);
    }
    
    //ACTION CREATE
	public function create_action()
	{
		$data =[
				     'id' => $this->request->getVar('id'),
				     'user' => $this->request->getVar('user'),
				     'email' => $this->request->getVar('email'),
				     'password' => $this->request->getVar('password'),
				     'idrol' => $this->request->getVar('idrol'),
				     'creado_at' => $this->request->getVar('creado_at'),
				     'creado_by' => $this->request->getVar('creado_by'),
				     'actualizado_at' => $this->request->getVar('actualizado_at'),
				     'actualizado_by' => $this->request->getVar('actualizado_by'),
				     'borrado_at' => $this->request->getVar('borrado_at'),
				     'borrado_by' => $this->request->getVar('borrado_by'),
        
				];
		$this->Model->save($data);
		session()->setFlashdata('message', 'Create Record Success');
		return redirect()->to(base_url('/User'));
    }
    
    //UPDATE
	public function update($id)
	{
		$dataFind = $this->Model->find($id);
		if($dataFind == false){
			return redirect()->to(base_url('/User'));
		}
		$data = [
			'AttributePage' => $this->PageData,
			'content' => 'Edite Pages',
			'action' => 'user/update_action',
			'data' => $this->Model->find($id),
        ];
		session()->setFlashdata('message', 'Update Record Success');
		return view('user/form_sys_user', $data);
    }
    
    //ACTION UPDATE
   	public function update_action()
	{
		$id = $this->request->getVar('id');
		$row = $this->Model->find(['id' => $id]);

			$data =[
				    'id' => $this->request->getVar('id'),
				    'user' => $this->request->getVar('user'),
				    'email' => $this->request->getVar('email'),
				    'password' => $this->request->getVar('password'),
				    'idrol' => $this->request->getVar('idrol'),
				    'creado_at' => $this->request->getVar('creado_at'),
				    'creado_by' => $this->request->getVar('creado_by'),
				    'actualizado_at' => $this->request->getVar('actualizado_at'),
				    'actualizado_by' => $this->request->getVar('actualizado_by'),
				    'borrado_at' => $this->request->getVar('borrado_at'),
				    'borrado_by' => $this->request->getVar('borrado_by'),
                    ];
            $this->Model->save($data);
			session()->setFlashdata('message', 'Update Record Success');
			
			return redirect()->to(base_url('user'));
		
	}

    //DELETE
	public function delete($id)
	{
		$row = $this->Model->find(['id' => $id]);
		if ($row) {
            $this->Model->delete($id);
            session()->setFlashdata('message', 'Delete Record Success');
            return redirect()->to(base_url('/user'));
        } else {
            session()->setFlashdata('message', 'Record Not Found');
            return redirect()->to(base_url('/user'));
        }

    }

    //RULES
    public function _rules() 
    {
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('idrol', 'idrol', 'trim|required|numeric');
	$this->form_validation->set_rules('creado_at', 'creado at', 'trim|required');
	$this->form_validation->set_rules('creado_by', 'creado by', 'trim|required|numeric');
	$this->form_validation->set_rules('actualizado_at', 'actualizado at', 'trim|required');
	$this->form_validation->set_rules('actualizado_by', 'actualizado by', 'trim|required|numeric');
	$this->form_validation->set_rules('borrado_at', 'borrado at', 'trim|required');
	$this->form_validation->set_rules('borrado_by', 'borrado by', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
 /* Location: ./app/controllers/User.php */
 /* Please DO NOT modify this information : */
 /* Generated by Ligatcode Codeigniter 4 CRUD Generator 2022-02-26 02:45:16 */