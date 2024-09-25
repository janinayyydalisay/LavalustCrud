<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('user_model');
        // Ensure the session is started elsewhere, perhaps in your main controller
    }

    function set_flash_alert($type, $message) {
        $_SESSION['flash_alert'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public function create() {
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('jld_LastName')->required('Last Name is required')->alpha()
                ->name('jld_FirstName')->required('First Name is required')->alpha()
                ->name('jld_Email')->required('Email is required')->valid_email()
                ->name('jld_Gender')->required('Gender is required')
                ->name('jld_Address')->required('Address is required');

            if ($this->form_validation->run()) {
                $jld_LastName = $this->io->post('jld_LastName');
                $jld_FirstName = $this->io->post('jld_FirstName');
                $jld_Email = $this->io->post('jld_Email');
                $jld_Gender = $this->io->post('jld_Gender');
                $jld_Address = $this->io->post('jld_Address');

                if ($this->user_model->create($jld_LastName, $jld_FirstName, $jld_Email, $jld_Gender, $jld_Address)) {
                    $this->set_flash_alert('success', 'User was added successfully.');
                } else {
                    $this->set_flash_alert('danger', 'Failed to add user.');
                }
                redirect('user/display');  
            } else {
                $this->call->view('username/create');
            }
        } else {
            $this->call->view('username/create');
        }
    }

    public function read() {
        $data['username'] = $this->user_model->read();
        $this->call->view('username/display', $data);
    }

    public function update($id) {
        $data['user'] = $this->user_model->get_one($id);
        if (empty($data['user'])) {
            $this->set_flash_alert('danger', 'User not found.');
            redirect('user/display');  
        }
    
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('jld_LastName')->required('Last Name is required')->alpha()
                ->name('jld_FirstName')->required('First Name is required')->alpha()
                ->name('jld_Email')->required('Email is required')->valid_email()
                ->name('jld_Gender')->required('Gender is required')
                ->name('jld_Address')->required('Address is required');
    
            $jld_LastName = $this->io->post('jld_LastName');
            $jld_FirstName = $this->io->post('jld_FirstName');
            $jld_Email = $this->io->post('jld_Email');
            $jld_Gender = $this->io->post('jld_Gender');
            $jld_Address = $this->io->post('jld_Address');
    
            if ($this->user_model->update($id, $jld_LastName, $jld_FirstName, $jld_Email, $jld_Gender, $jld_Address)) {
                $this->set_flash_alert('success', 'User updated successfully.');
            } else {
                $this->set_flash_alert('danger', 'Failed to update user.');
            }
            redirect('user/display');  // Redirect to the display page
        } else {
            $this->call->view('username/update', $data);  // Pass the data here
        }
    }
    
            

    public function delete($id) {
        if ($this->user_model->delete($id)) {
            $this->set_flash_alert('success', 'User was deleted successfully.');
        } else {
            $this->set_flash_alert('danger', 'Something went wrong.');
        }
        redirect('user/display');
    }
}
