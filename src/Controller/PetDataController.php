<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PetData Controller
 *
 * @property \App\Model\Table\PetDataTable $PetData
 */
class PetDataController extends AppController
{

    public $paginate = [
        'order' => ['pet_id' => 'ASC'],
        'limit' => 20
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('petData', $this->paginate($this->PetData));
        $this->set('_serialize', ['petData']);
    }

    /**
     * View method
     *
     * @param string|null $id Pet Data id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $petData = $this->PetData->get($id, [
            'contain' => []
        ]);
        $this->set('petData', $petData);
        $this->set('_serialize', ['petData']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $petData = $this->PetData->newEntity();

        $this->loadModel('Roledata');
        $roledataList = $this->Roledata->find()->select(['RoleID', 'RoleName'])->order(['RoleName' => 'asc'])->all();
        $roledataItems[] = __('Please select');
        foreach($roledataList as $roledata) {
            $roledataItems[$roledata->RoleID] = $roledata->RoleName;
        }

        if ($this->request->is('post')) {
            $petData = $this->PetData->patchEntity($petData, $this->request->data);
            $petData->pet_id = $this->PetData->generateNextID();
            if ($this->PetData->save($petData)) {
                $this->Flash->success(__('The pet data has been saved.'));
                return $this->redirect(['action' => 'edit', $petData->pet_id]);
            } else {
                $this->Flash->error(__('The pet data could not be saved. Please, try again.'));
            }
        }

        $this->set('roledata', $roledataItems);
        $this->set(compact('petData'));
        $this->set('_serialize', ['petData']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pet Data id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $petData = $this->PetData->get($id);

        $this->loadModel('Roledata');
        $roledataList = $this->Roledata->find()->select(['RoleID', 'RoleName'])->order(['RoleName' => 'asc'])->all();
        $roledataItems[] = __('Please select');
        foreach($roledataList as $roledata) {
            $roledataItems[$roledata->RoleID] = $roledata->RoleName;
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $petData = $this->PetData->patchEntity($petData, $this->request->data);
            if ($this->PetData->save($petData)) {
                $this->Flash->success(__('The pet data has been saved.'));
                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('The pet data could not be saved. Please, try again.'));
            }
        }

        $this->set('roledata', $roledataItems);
        $this->set(compact('petData'));
        $this->set('_serialize', ['petData']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pet Data id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $petData = $this->PetData->get($id);
        if ($this->PetData->delete($petData)) {
            $this->Flash->success(__('The pet data has been deleted.'));
        } else {
            $this->Flash->error(__('The pet data could not be deleted. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }
}
