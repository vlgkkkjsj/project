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
  //setters
  public function setID($id)
  {
      $this->id = $id;
  }
  public function setUser($User)
  {
      $this->User = $User;
  }
  public function setSubtwt($subtwt)
  {
      $this->subtwt = $subtwt;
  }
  public function setLink($link)
  {
      $this-> link = $link;
  }

  public function singleAcc($User)
  {
      $singleAcc = "SELECT *FROM accountable WHERE User = ?";

      $stmt = mysqli_prepare($this->connection->getConn(),$singleAcc);
      mysqli_stmt_bind_param($stmt,"s",$User);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);

      return mysqli_fetch_assoc($res);
  }
  public function InsertAcc($User,$subtwt,$link)
  {
      $User = filter_var($User, FILTER_SANITIZE_FULL_SPECIAL_CHARS, ); //
      $subtwt = filter_var($subtwt, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $link = filter_var($link, FILTER_SANITIZE_URL);


      if(empty($User)||empty($subtwt)||empty($link))
      {
          print "<script>'Veja se respondeu tudo'</script>";
          print "<script>location.href='form.php'</script>";
      }
      else 
      {
          $sql = "INSERT INTO accountable (User,subtwt,link) VALUES  ('{$User}','{$subtwt}','{$link}')";
          $res = mysqli_query($this->connection -> getConn(), $sql);

          if(mysqli_affected_rows($this->connection->getConn())>0)
          {
              return true;
          }
          else
          {
              return false;
          }
      }
   }
   public function listAcc()
   {
        $a = array();

        $sql = "SELECT *FROM accountable";
        $res = mysqli_query($this->connection->getConn(), $sql);

        while($row = mysqli_fetch_assoc($res))
        {
            $accounts = new FormDB();

            $accounts -> setID($row['id']);
            $accounts -> setUser($row['User']);
            $accounts -> setSubtwt($row['subtwt']);
            $accounts -> setLink($row['link']);

            $a[] = $accounts;
        }
        return $a;
    }

   }

