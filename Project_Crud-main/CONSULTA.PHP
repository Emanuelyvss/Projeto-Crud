/** 
 Retirado a coluna "id" na instrução INSERT, com o auto incremento ativado não é necessário passar o valor da chave primária.
*/

    public function create ($entitie) {
        $name = $entitie->getName();
        $email = $entitie->getEmail();
        $phone = $entitie->getPhone();

        $sqlStmt = "INSERT INTO $this->table (name, email, phone) VALUES (:name, :email, :phone)";
        $operation = $this->connectionPDO->prepare($sqlStmt);
        try {
            $operation->bindParam(":name", $name, PDO::PARAM_STR);
            $operation->bindParam(":email", $email, PDO::PARAM_STR);
            $operation->bindParam(":phone", $phone, PDO::PARAM_STR);

            if ($operation->execute()) {
                if ($operation->rowCount() > 0) {
                    $id = $this->connectionPDO->lastInsertId();
                    $entitie->setId($id);
                    return true;
                }
                return false;
            }

        } catch (PDOException $err) {
            echo $err->getMessage();
        }

    }