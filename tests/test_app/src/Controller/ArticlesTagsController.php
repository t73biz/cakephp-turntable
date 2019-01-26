<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesTags Controller
 *
 * @property \App\Model\Table\ArticlesTagsTable $ArticlesTags
 *
 * @method \App\Model\Entity\ArticlesTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Tags']
        ];
        $articlesTags = $this->paginate($this->ArticlesTags);

        $this->set(compact('articlesTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesTag = $this->ArticlesTags->get($id, [
            'contain' => ['Articles', 'Tags']
        ]);

        $this->set('articlesTag', $articlesTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesTag = $this->ArticlesTags->newEntity();
        if ($this->request->is('post')) {
            $articlesTag = $this->ArticlesTags->patchEntity($articlesTag, $this->request->getData());
            if ($this->ArticlesTags->save($articlesTag)) {
                $this->Flash->success(__('The articles tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles tag could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesTags->Articles->find('list', ['limit' => 200]);
        $tags = $this->ArticlesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlesTag', 'articles', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesTag = $this->ArticlesTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesTag = $this->ArticlesTags->patchEntity($articlesTag, $this->request->getData());
            if ($this->ArticlesTags->save($articlesTag)) {
                $this->Flash->success(__('The articles tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles tag could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesTags->Articles->find('list', ['limit' => 200]);
        $tags = $this->ArticlesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlesTag', 'articles', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesTag = $this->ArticlesTags->get($id);
        if ($this->ArticlesTags->delete($articlesTag)) {
            $this->Flash->success(__('The articles tag has been deleted.'));
        } else {
            $this->Flash->error(__('The articles tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
