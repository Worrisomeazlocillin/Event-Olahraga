<?php

namespace App\Controllers;

use App\Models\RegistrationModel;
use App\Models\EventModel;
use CodeIgniter\Controller;

class RegistrationController extends Controller
{
    public function index($eventId)
    {
        $eventModel = new EventModel();
        $data['event'] = $eventModel->find($eventId);

        return view('registrations/index', $data);
    }

    public function store()
    {
        $model = new RegistrationModel();

        $data = [
            'event_id' => $this->request->getPost('event_id'),
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'umur'    => $this->request->getPost('umur'),
            'alamat'    => $this->request->getPost('alamat'),
            'tempat_tanggal_lahir'    => $this->request->getPost('tempat tanggal lahir'),
            'jenis_kelamin'    => $this->request->getPost('jenis kelamin'),            
            ];

        $model->save($data);

        return redirect()->to('/events');
    }
}
