<?php
class TypesController extends AppController {


    public function delete($id) {
        $type = $this->Type->findById($id);
        if ($this->Type->delete($id))
        {
            $this->Session->setFlash(__('Le type de service : %s a été supprimée.', h($type['Type']['libelle'])), 'default', array('class' => 'alert alert-warning'));
            $this->redirect('/annonces/manage');
        }
    }

    public function rename() {

    }
}

?>