<?php

declare (strict_types = 1);

namespace App\Controller;

/**
 * Kycdocs Controller
 *
 * @property \App\Model\Table\KycdocsTable $Kycdocs
 *
 * @method \App\Model\Entity\Kycdoc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KycdocsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($mem_id=null)
    {
      //  $this->viewBuilder()->setLayout('member');
      $this->allow([2,11,5]);
      $this->loadModel('Kycs');
        $u = $this->Authentication->getResult()->getData();

        if($u->role_id==5)
        $mem_id=$u->username;
 
        $kyc = $this->Kycs->find('all')->contain(['Members'])->where(['member_id' => $mem_id])->first();

        $kycdocs = $this->Kycdocs->find()->where(['kyc_id' => $kyc->id]);
        
        if ($kycdocs->count()==0) {
            $kycdoc = $this->Kycdocs->newEmptyEntity();
            $kycdoc->kyc_id = $kyc->id;
            $kycdoc->display = 'Self Photo';
            $this->Kycdocs->save($kycdoc);
            
            $kycdoc = $this->Kycdocs->newEmptyEntity();
            $kycdoc->kyc_id = $kyc->id;
            $kycdoc->display = 'ID Proof (Example Aadhar Card Front)';
            $this->Kycdocs->save($kycdoc);
            
            $kycdoc = $this->Kycdocs->newEmptyEntity();
            $kycdoc->kyc_id = $kyc->id;
            $kycdoc->display = 'Address Proof (Example Aadhar Card Back)';
            $this->Kycdocs->save($kycdoc);

            $kycdoc = $this->Kycdocs->newEmptyEntity();
            $kycdoc->kyc_id = $kyc->id;
            $kycdoc->display = 'PAN Card';
            $this->Kycdocs->save($kycdoc);

            $kycdoc = $this->Kycdocs->newEmptyEntity();
            $kycdoc->kyc_id = $kyc->id;
            $kycdoc->display = 'Cancel Cheque/Passbook Front Page';
            $this->Kycdocs->save($kycdoc);

            $kycdocs = $this->Kycdocs->find()->where(['kyc_id' => $kyc->id]);
        
        }

        $this->set(compact('kyc', 'kycdocs'));
    }

    public function savefile($id)
    {
        $kycdoc=$this->Kycdocs->get($id);
        $u = $this->Authentication->getResult()->getData();
        $kyc = $this->Kycdocs->Kycs->find('all')->contain(['Members'])->where(['member_id' => $u->username])->first();
        $this->allow([2,11,5]);
        if($u->role_id==5 && $kycdoc->kyc_id!=$kyc->id ||  $kyc->approveby!=null || $kyc->approveon!=null || $kyc->member->kyc=='Y' )
        return;

        if ($this->request->is(['post', 'put'])) {
            $file = $this->request->getData('file');

            if (!empty($file->getClientFilename())) {

                $fileName = $file->getClientFilename();
                $uploadPath = 'd:/tmp/';
                $uploadPath='/home/vr0v1y0fqdpy/public_html/fni_docs/';
                $uploadFile = $uploadPath . $id;

                if ($file->getSize() > 3 * 1024 * 1024) { //3MB
                    $this->Flash->error(__('Max File Size can be only 3 MB '));
                } else {
                    $file->moveTo($uploadFile);

                    $uploadData = $this->Kycdocs->newEmptyEntity();
                    
                    if (!empty($kycdoc)) {
                        $uploadData->id = $kycdoc->id;
                    } else {
                        $uploadData->id = null;
                    }
                    $uploadData->kyc_id = $kyc->id;
                    //$uploadData->kyc_id=$kyc->id;
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $ext = substr(strtolower(strrchr($fileName, '.')), 1);
                    $arr_ext = ['jpg', 'jpeg', 'gif','png'];

                    if (!in_array($ext, $arr_ext)) {
                        $this->Flash->error(__('Please choose Image only.'));
                        $this->redirect(['controller' => 'kycdocs', 'action' => 'index']);
                    }
                    else    
                    if ($this->Kycdocs->save($uploadData)) {

                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                        $this->redirect(['controller' => 'kycdocs', 'action' => 'index']);
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                }
            }}}
    public function sendFile($id,$mem_id = null)
    {
        // $this->viewBuilder()->setLayout('member');
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2,5,11]);

        if ($u->role_id == 2 || $u->role_id==11) {
            $kyc = $this->Kycdocs->Kycs->find('all')->where(['member_id' => $mem_id])->first();

        } else {
            $kyc = $this->Kycdocs->Kycs->find('all')->where(['member_id' => $u->username])->first();
        }

        $kycdoc = $this->Kycdocs->find()->where(['kyc_id' => $kyc->id,'id'=>$id])->first();

        if ($u->role_id == 2 || $u->role_id==11) {
            $response = $this->response;

            $ext = explode(".", $kycdoc->name);

            // $this->response->type('image/png');
            $response = $response->withType($ext[count($ext) - 1]);

            $response = $response->withFile($kycdoc->path . '/' . $kycdoc->id, ['download' => false, 'name' => $kycdoc->name]);

        } else {
            $response = $this->response->withFile($kycdoc->path . '/' . $kycdoc->id, ['download' => true, 'name' => $kycdoc->name]);
        }

        // Return the response to prevent controller from trying to render
        // a view.
        return $response;
    }
}
