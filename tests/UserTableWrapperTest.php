<?php
use src\UserTableWrapper;
use PHPUnit\Framework\TestCase;

class UserTableWrapperTest extends TestCase 
{ 
  private UserTableWrapper $user;

  protected function setUp(): void {
    parent::setUp();
    $this->user = new UserTableWrapper();
  }

  public function caseTestProvider(): array {
    return [
      ['Bob', 4],
      ['Bill', 1],
      ['Tom', 3]
    ];
  }
  
  /**
    * @dataProvider caseTestProvider
  */
  public function testInsert($name, $id) {
    $testCase = [$name, $id];
    $this->user->insert($testCase);
    $this->assertContains(['name' => $name, 'id' => $id], $this->user->rows);
  }
  
  /**
    * @dataProvider caseTestProvider
  */
  public function testUpdate($name, $id) {
    $this->user->insert(['Bob', 2]);
    $this->assertContains(
      ['name' => $name, 'id' => $id], 
      $this->user->update(2, [$name, $id])
    );
  }

  /**
    * @dataProvider caseTestProvider
  */
  public function testDelete($name, $id) {
    $this->user->insert([$name, $id]);
    $this->user->delete($id);
    $this->assertEquals([], $this->user->rows);
  }

  /**
    * @dataProvider caseTestProvider
  */
  public function testGet($name, $id) {
    $this->user->insert([$name, $id]);
    $this->assertEquals([['name' => $name, 'id' => $id]], $this->user->get());
  }
}