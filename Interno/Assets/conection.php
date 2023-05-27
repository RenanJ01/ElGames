<?php
class Conexao
{
    private $conection;

    //Conexão
    private function Con_AbrirConection()
    {
        try {
            $this-> conection = new PDO("mysql: host=localhost:8080; dbname=elgames", "clientes", "usuariostigresa1001");
            $this-> conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this-> conection->exec("SET CHARACTER SET utf8");
            return $this->conection;
            //echo "Sucesso na conexão!";
        } catch (PDOException $e) {
            //echo "Falha na conexão:".$e->getMessage();
            return false;
        }
    }


    //Select
    public function Con_Select($query)
    {
        try {
            $con = $this->Con_AbrirConection();
            $con->exec("SET CHARACTER SET utf8");
            $res = $con->prepare($query);
            $res->execute();
            if ($res) {
                $res->setFetchMode(PDO::FETCH_ASSOC);
                $tab = $res->fetchAll();
                return $tab;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }


    //Insert
    public function Con_Insert($name, $username, $senha)
    {
        try {
            $con = $this->Con_AbrirConection();
            $res = $con->prepare("INSERT INTO tb_usuarios(nome_users, username_users, senha_users) VALUES(:nome, :username, :senha)");
            $res->bindValue("nome", $name);
            $res->bindValue("username", $username);
            $res->bindValue("senha", $senha);
            $res->execute();
            if ($res) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }
    
    public function Con_InsUpd_Vils($data)
    {
        try {
            $con = $this->Con_AbrirConection();
            $res = $con->prepare("SELECT * FROM tb_visualiz WHERE data_vils=:dt");
            $res->bindValue("dt", $data);
            $res->execute();
            $verf = $res->fetchAll();
            if(count($verf) > 0){
                $upd = $con->prepare("UPDATE tb_visualiz SET cont_vils=cont_vils+1 WHERE data_vils=:dtu");
                $upd->bindValue("dtu", $data);
                $upd->execute();
            }else{
                $ins = $con->prepare("INSERT INTO tb_visualiz(data_vils, cont_vils) VALUES(:dti, '1')");
                $ins->bindValue("dti", $data);
                $ins->execute();
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }

    public function Con_Insert_Fase($title, $desc, $data)
    {
        try {
            $con = $this->Con_AbrirConection();
            $res = $con->prepare("INSERT INTO tb_fases(title_fases, desc_fases, data_fases) VALUES(:title, :desc, :data);");
            $res->bindValue("title", $title);
            $res->bindValue("desc", $desc);
            $res->bindValue("data", $data);
            $res->execute();
            if ($res) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }

    public function Con_Insert_cadastro($name, $username, $senha, $genero, $idade)
    {
        try {
            $con = $this->Con_AbrirConection();
            //Verificar os usuarios
            $cmd = $con->prepare("SELECT * FROM tb_usuarios WHERE username_users = :username;");
            $cmd->bindValue("username", $username);
            $cmd->execute();
            $verf = $cmd->fetchAll();
            if (count($verf) > 0) {
                echo count($verf); 
                return false;
            } else { 
                //Cadastro
                $res = $con->prepare("INSERT INTO tb_usuarios(nome_users, username_users, senha_users, genero_users, idade_users) VALUES(:nome, :username, :senha, :genero, :idade)");
                $res->bindValue("nome", $name);
                $res->bindValue("username", $username);
                $res->bindValue("senha", $senha);
                $res->bindValue("genero", $genero);
                $res->bindValue("idade", $idade);
                $res->execute();
                if ($res) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }

    public function Con_Insert_Img($id, $caminho)
    {
        try {
            $con = $this->Con_AbrirConection();
            $res = $con->prepare("INSERT INTO tb_usuarios_img(caminho_users_img, id_users) VALUES(:caminho, :id);");
            $res->bindValue("id", $id);
            $res->bindValue("caminho", $caminho);
            $res->execute();
            if ($res) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }

    //Update
    public function Con_Update_Fase($id, $title, $desc, $data)
    {
        try {
            $con = $this->Con_AbrirConection();
            //Verificar os usuarios
            $cmd = $con->prepare("SELECT * FROM tb_fases WHERE id_fases=:id");
            $cmd->bindValue("id", $id);
            $cmd->execute();
            $verf = $cmd->fetch();            
            if (count($verf) > 0) {
                //Atualizar
                $res = $con->prepare("UPDATE tb_fases SET title_fases=:title, desc_fases=:descr, data_fases=:datas WHERE id_fases=:idU");
                $res->bindValue("idU", $id);
                $res->bindValue("title", $title);
                $res->bindValue("descr", $desc);
                $res->bindValue("datas", $data);
                $res->execute();
                if ($res) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }
    
    public function Con_Update($name, $username, $senha, $idade, $genero)
    {
        try {
            $con = $this->Con_AbrirConection();
            //Verificar os usuarios
            $cmd = $con->prepare("SELECT * FROM tb_usuarios WHERE username_users = :username;");
            $cmd->bindValue("username", $username);
            $cmd->execute();
            $verf = $cmd->fetch();            
            if (count($verf) > 0) {
                //Cadastro
                $res = $con->prepare("UPDATE tb_usuarios SET nome_users=':none', username_users = :username, senha_users = :senha, genero_users = :genero, idade_users = :idade");
                $res->bindValue("nome", $name);
                $res->bindValue("username", $username);
                $res->bindValue("senha", $senha);
                $res->bindValue("genero", $genero);
                $res->bindValue("idade", $idade);
                $res->execute();
                if ($res) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }
    public function Con_Update_Img($id, $caminho)
    {
        try {
            $con = $this->Con_AbrirConection();
                //Atualizar
                $res = $con->prepare("UPDATE tb_usuarios_img SET caminho_users_img=:caminho WHERE id_users_img=:id;");
                $res->bindValue("id", $id);
                $res->bindValue("caminho", $caminho);
                $res->execute();
                if ($res) {
                    return true;
                } else {
                    return false;
                }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }


    // Delete
    public function Con_Delete_Fase($id)
    {
        try {
            $con = $this->Con_AbrirConection();
            //Verificar os usuarios
            $cmd = $con->prepare("DELETE FROM tb_fases WHERE id_fases=:id");
            $cmd->bindValue("id", $id);
            $res = $cmd->execute();
            if($res){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Ocorreu o erro:" . $e->getMessage();
        }
    }
}
