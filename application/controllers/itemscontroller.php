<?php

class ItemsController extends Controller {

    function view($id = null, $name = null) {
        $this->set('title', $name . ' - My Todo List App');
        $todo = $this->Item->select($id);
        $this->set('todo', $todo);
    }

    function viewall() {
        $this->set('title', 'All Items - My Todo List App');
        $todos = $this->Item->selectAll();
        $this->set('todo', $todos);
    }

    function insert() {
        $todo = $_POST['todo'];
        $this->set('title', 'Success - My Todo List App');
        $this->set('todo', $this->Item->query('insert into items (name) values (\'' . mysqli_real_escape_string($this->Item->getConnection(), $todo) . '\')'));
    }

    function delete($id = null) {
        $this->set('title', 'Success - My Todo List App');
        $this->set('todo', $this->Item->query('delete from items where id = \'' . mysqli_real_escape_string($this->Item->getConnection(), $id) . '\''));
    }

}
