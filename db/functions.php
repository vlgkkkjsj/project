<?php


class FormDb{

    private $connection;
    private $id;
    private $User;
    private $subtwt;
    private $link;
    

    //constructor from connect
    public function __construct()
    {
        $this->connection = new connection();
    }

    //get for $id
    public function getID()
    {
        return $this->id;
    }
    public function getUser()
    {
        return $this -> User;
    }
    public function getSubtwt()
    {
        return $this->subtwt;
    }
    public function getLink()
    {
        return $this-> link;
    }

    public function singleAcc($User)
    {
        $singleacc = "SELECT *FROM accountTable WHERE User = ?";
        
        $stmt = mysqli_prepare($this->connection->getConn(),$singleacc);
        mysqli_stmt_bind_param($stmt,"s", $singleacc);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        
        
        return mysqli_fetch_assoc($res);
    }
    public function InsertAccount($User, $subtwt, $link)
    {
        $User= filter_var($User,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $subtwt = filter_var($subtwt,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $link = filter_var($link,FILTER_SANITIZE_URL);

        if(empty($User)||empty($subtwt)||empty($link))
        {
            print "<script>'Veja se respondeu tudo'</script>";
            print "<script>'location.href= 'form.php'</script>";
        }
        else
        {
            $sql = "INSERT INTO accountTable (User,subtwt,link) VALUES ('{$User}','{$subtwt}','{$link}' )";
            $res = mysqli_query($this->connection -> getConn(), $sql);

            if(mysqli_affected_rows($this->connection-> getConn())>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }

}