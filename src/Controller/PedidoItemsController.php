<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PedidoItems Controller
 *
 * @property \App\Model\Table\PedidoItemsTable $PedidoItems
 * @method \App\Model\Entity\PedidoItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidoItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos', 'Produtos'],
        ];
        $pedidoItems = $this->paginate($this->PedidoItems);

        $this->set(compact('pedidoItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidoItem = $this->PedidoItems->get($id, [
            'contain' => ['Pedidos', 'Produtos'],
        ]);

        $this->set(compact('pedidoItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedidoItem = $this->PedidoItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $pedidoItem = $this->PedidoItems->patchEntity($pedidoItem, $this->request->getData());
            if ($this->PedidoItems->save($pedidoItem)) {
                $this->Flash->success(__('The pedido item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido item could not be saved. Please, try again.'));
        }
        $pedidos = $this->PedidoItems->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->PedidoItems->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedidoItem', 'pedidos', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedidoItem = $this->PedidoItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedidoItem = $this->PedidoItems->patchEntity($pedidoItem, $this->request->getData());
            if ($this->PedidoItems->save($pedidoItem)) {
                $this->Flash->success(__('The pedido item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido item could not be saved. Please, try again.'));
        }
        $pedidos = $this->PedidoItems->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->PedidoItems->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedidoItem', 'pedidos', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedidoItem = $this->PedidoItems->get($id);
        if ($this->PedidoItems->delete($pedidoItem)) {
            $this->Flash->success(__('The pedido item has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
