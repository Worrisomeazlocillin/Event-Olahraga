<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\ParticipantModel;
use CodeIgniter\Controller;

class EventController extends Controller
{
    public function index()
    {
        $model = new EventModel();
        $data['events'] = $model->findAll();

        return view('events/index', $data);
    }

    public function show($id)
    {
        $eventModel = new EventModel();
        $participantModel = new ParticipantModel();

        $data['event'] = $eventModel->find($id);

        if (!$data['event']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event not found');
        }

        $data['participants'] = $participantModel->where('event_id', $id)->findAll();

        return view('events/show', $data);
    }

    public function create()
    {
        return view('events/create');
    }

    public function store()
    {
        $model = new EventModel();

        $data = [
            'name'               => $this->request->getPost('name'),
            'description'        => $this->request->getPost('description'),
            'date'               => $this->request->getPost('date'),
            'location'           => $this->request->getPost('location'),
            'registration_start' => $this->request->getPost('registration_start'),
            'registration_end'   => $this->request->getPost('registration_end'),
        ];

        $model->save($data);

        return redirect()->to('/events');
    }

    public function delete($id)
    {
        $model = new EventModel();

        // Cek apakah event dengan ID yang diberikan ada
        if ($model->find($id)) {
            $model->delete($id);
            return redirect()->to('/events')->with('message', 'Event deleted successfully.');
        } else {
            return redirect()->to('/events')->with('error', 'Event not found.');
        }
    }

    public function edit($id)
    {
        $model = new EventModel();
        $data['event'] = $model->find($id);

        if (!$data['event']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event not found');
        }

        return view('events/edit', $data);
    }

    public function update($id)
    {
        $model = new EventModel();

        $data = [
            'name'               => $this->request->getPost('name'),
            'date'               => $this->request->getPost('date'),
            'location'           => $this->request->getPost('location'),
            'description'        => $this->request->getPost('description'),
            'registration_start' => $this->request->getPost('registration_start'),
            'registration_end'   => $this->request->getPost('registration_end'),
        ];

        $model->update($id, $data);

        return redirect()->to('/events/show/' . $id)->with('message', 'Event updated successfully.');
    }

    public function registerParticipant($id)
    {
        $participantModel = new ParticipantModel();

        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        if(!$jenis_kelamin) {
            return redirect()->back()->with('error', 'Gender is required');
        }

        $data = [
            'event_id'             => $id,
            'name'                 => $this->request->getPost('name'),
            'email'                => $this->request->getPost('email'),
            'phone'                => $this->request->getPost('phone'),
            'umur'                 => $this->request->getPost('umur'),
            'alamat'               => $this->request->getPost('alamat'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'jenis_kelamin'        => $this->request->getPost('jenis_kelamin') // Pastikan ini ada
        ];

        $participantModel->insert($data);

        return redirect()->to('/events/show/' . $id)->with('message', 'Participant added successfully.');
    }

    public function editParticipant($id)
    {
        $participantModel = new ParticipantModel();
        $data['participant'] = $participantModel->find($id);

        if (!$data['participant']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Participant not found');
        }

        return view('participants/edit', $data);
    }

    public function updateParticipant($id)
    {
        $participantModel = new ParticipantModel();

        $data = [
            'name'                 => $this->request->getPost('name'),
            'email'                => $this->request->getPost('email'),
            'phone'                => $this->request->getPost('phone'),
            'umur'                 => $this->request->getPost('umur'),
            'alamat'               => $this->request->getPost('alamat'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'jenis_kelamin'        => $this->request->getPost('jenis_kelamin')
        ];

        $participantModel->update($id, $data);

        // Redirect ke halaman event yang sesuai dengan event_id
        $event_id = $this->request->getPost('event_id');
        return redirect()->to('/events/show/' . $event_id)->with('message', 'Participant updated successfully.');
    }

    public function deleteParticipant($id)
    {
        $participantModel = new ParticipantModel();
        $participant = $participantModel->find($id);

        if ($participant) {
            $participantModel->delete($id);
            return redirect()->to('/events/show/' . $participant['event_id'])->with('message', 'Participant deleted successfully.');
        } else {
            return redirect()->to('/events/show/')->with('error', 'Participant not found.');
        }
    }
}
