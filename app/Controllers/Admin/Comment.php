<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Comment extends BaseController
{
    protected $require_auth = true;
    protected $requiredPermissions = ['administrateur'];
    protected $breadcrumb =  [['text' => 'Tableau de Bord','url' => '/admin/dashboard']];
    public function getindex($id) {
        $this->addBreadcrumb("Modification d'un commentaire",'');
        $this->title = "Modifier un commentaire";
        return $this->view('/admin/comment/comment', ['comment' => Model('CommentModel')->getCommentById($id)],'true');
    }

    public function postupdate() {
        $data = $this->request->getPost();
        if (model("CommentModel")->updateComment($data)) {
            $this->success("Commentaire modifié");
        } else {
            $this->error("Une erreur est survenue");
        }
        $this->redirect('/admin/dashboard');
    }
}
