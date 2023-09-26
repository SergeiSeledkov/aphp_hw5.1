<?php
namespace src;
use src\TableWrapperInterface;

class UserTableWrapper implements TableWrapperInterface
{
    public array $rows;

    public function insert(array $values): void {
      $this->rows[] = ['name' => $values[0], 'id' => $values[1]];
    }

    public function update(int $id, array $values): array {
      foreach ($this->rows as &$user) {
         if ($user['id'] === $id) {
           $user = ['name' => $values[0], 'id' => $values[1]];
         }
      }
      return $this->rows;
    }
  
    public function delete(int $id): void {
      unset($this->rows[array_search($id, $this->rows)]);
    }
  
    public function get(): array {
      return $this->rows;
    }
}