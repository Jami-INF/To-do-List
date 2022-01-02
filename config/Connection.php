<?php

class Connection extends PDO
{
    private $stmt;
    public function __construct(string $host, string $conname, string $user, string $password)
    {
        parent::__construct('mysql:host='.$host.';dbname='.$conname, $user, $password);
        // parent::__construct('mysql:host=localhost;dbname=to_do_list','root','root');

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function executeQuery(string $query, array $params = []): bool
    {
        $this->stmt = parent::prepare($query);
        foreach ($params as $name => $value) {
            $this->stmt->bindValue($name, $value[0],$value[1]);
        }
        return $this->stmt->execute();
    }
    public function getResults(): array
    {
        return $this->stmt->fetchAll();
    }
}

?>