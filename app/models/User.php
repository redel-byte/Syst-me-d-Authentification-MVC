<?php

require_once __DIR__ . '/../core/database.php';
require_once __DIR__ . '/../core/hash_password.php';
require_once __DIR__ . '/../core/Validator.php';

class User
{
    private ?int $id = null;
    private string $email;
    private string $password;  
    protected \PDO $pdo;
    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }
    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }
    public function create($email, $password)
    {
      $pass = true;
      if(!Validator::validateEmail($email) && $this->findByEmail($email))$pass = false;
    if($pass){
      $stm = $this->pdo->prepare("INSERT INTO users (email, password, created_at) VALUES (:email, :password,NOW())"); 
      return $stm->execute([
        'email'=>$email,
        'password' => $password = (new Hashpassword($password)->getHashedPassword()) 
      ]);
      }
    }
       
    public function verify(string $email, string $password): bool
    {
      $user = $this->findByEmail($email);

      if (!$user) {
         return false;
      }

      return password_verify($password, $user['password']);
    }
}

echo (new User(Database::connection())->create('oussama@gmail.com','123'));
