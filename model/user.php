<?php
class user {
    private string $id;
    private string $username;
    private string $password;
    public function __construct(
        string $id, string $username, string $password
    )
    {

        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    public function getUsername():string {
        return $this->username;
    }
    public function getPass():string {
        return $this->password;
    }
    public function getId():string {
        return $this->id;
    }
}
?>