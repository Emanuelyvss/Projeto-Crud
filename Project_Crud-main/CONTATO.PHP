<?php

classe  ContatoDAO  implementa iDaoModeCrud
{
    privada  $ conexãoPDO ;
     tabela $ privada ;

     função  pública __construct ()
    {
        $ this -> connectionPDO = ConnectionPDO :: getinstance ();
        $ this -> table = " Contato ";
    }

     função  pública criar ( $ entidade ) {
        $ nome = $ entidade -> getNome ();
        $ email = $ entidade -> getEmail ();
        $ telefone = $ entidade -> getPhone ();

        $ sqlStmt = " INSERT INTO $ this -> tabela (nome, e-mail, telefone) VALUES (:nome, :email, :telefone) ";
        $ operação = $ this -> connectionPDO -> prepare ( $ sqlStmt );
        tente {
            $ operação -> bindParam (" :name ", $ name , PDO :: PARAM_STR );
            $ operação -> bindParam (" :email ", $ email , PDO :: PARAM_STR );
            $ operação -> bindParam (" :phone ", $ phone , PDO :: PARAM_STR );

            if ( $ operação -> executar ()) {
                if ( $ operação -> rowCount () > 0 ) {
                    $ id = $ this -> connectionPDO -> lastInsertId ();
                    $ entidade -> setId ( $ id );
                    retorna  verdadeiro ;
                }
                retorna  falso ;
            }

        } catch ( PDOException  $ err ) {
            echo  $ err -> getMessage ();
        }

    }
     função  pública lida ( $ id = null ) {

        $ id !== null ?
        $ sqlStmt = " SELECT * FROM $ this -> table WHERE id = :id ORDER BY id DESC " :
        $ sqlStmt = " SELECT * FROM $ this -> table ORDER BY id DESC ";

        $ operação = $ this -> connectionPDO -> prepare ( $ sqlStmt );
        
        tente {
            
            if ( $ id !== null ):
                $ operação -> bindParam (" :id ", $ id , PDO :: PARAM_STR );
            endif ;

            if ( $ operação -> executar ()) {
                if ( $ operação -> rowCount () > 0 ) {
                    $ id !== null ?
                        $ resultado = $ operação -> busca ( PDO :: FETCH_ASSOC ):
                        $ resultado = $ operação -> fetchAll ( PDO :: FETCH_ASSOC );
                    
                    retorna  $ resultado ;
                }
            }
        } catch ( PDOException  $ err ) {
            echo  $ err -> getMessage ();
        }
    }

     atualização de função  pública ( $ entidade ) {
        
        $ id = $ entidade -> getId ();
        $ nome = $ entidade -> getNome ();
        $ email = $ entidade -> getEmail ();
        $ telefone = $ entidade -> getPhone ();

        $ sqlStmt = " ATUALIZAR $ isto -> tabela SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id ";
        $ operação = $ this -> connectionPDO -> prepare ( $ sqlStmt );

        tente {

        $ operação -> bindParam (" :id ", $ id , PDO :: PARAM_INT );
        $ operação -> bindParam (" :name ", $ name , PDO :: PARAM_STR );
        $ operação -> bindParam (" :email ", $ email , PDO :: PARAM_STR );
        $ operação -> bindParam (" :phone ", $ phone , PDO :: PARAM_STR );

        if ( $ operação -> executar ()) {
            if ( $ operação -> rowCount () > 0 ) {
                retorna  verdadeiro ;
            }
            retorna  falso ;
        }
        retorna  falso ;

        } catch ( PDOException  $ err ) {
            echo  $ err -> getMessage ();
        }

    }
     função  pública deletar ( $ id ) {
        $ sqlStmt = " DELETE FROM $ this -> tabela WHERE id = :id ";

        $ operação = $ this -> connectionPDO -> prepare ( $ sqlStmt );

        tente {
            $ operação -> bindParam (" :id ", $ id , PDO :: PARAM_INT );
            
            if ( $ operação -> executar ()) {

                if ( $ operação -> rowCount () > 0 ) {
                    retorna  verdadeiro ;
                }
                retorna  falso ;
            }

        } catch ( PDOException  $ err ) {
            echo  $ err -> getMessage ();
        }
    }
}   