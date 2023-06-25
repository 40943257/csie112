<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <style>
    
    body {
      margin-top: 10px;
      text-align: center;
    }
    h1 {
      background-color: #0d6efd; 
      
    }
    button{border:0;
     background-color:#0d6efd;
    color:#000;
    border-radius:10px;
    cursor:pointer;}

    button:hover{
    color:#0d6efd;
    background-color:#fff;
    border:2px #0d6efd solid;
    }


    input{border:0;
     background-color:#0d6efd;
    color:#000;
    border-radius:20px;
    cursor:pointer;}

    input:hover{
    color:#0d6efd;
    background-color:#fff;
    border:2px #0d6efd solid;
    }
    
    
    
  </style>
</head>
<body>
    
  <h1>表格匯入（請使用 CSV 格式檔）</h1>
  <form method="post" enctype="multipart/form-data"><BR>
  <input type="file" id="csv_file" name="csv_file" accept=".csv"><br><br>
    <button type="submit" style="width:150px;height:50px;">匯入</button>
  </form>

  <?php

  
  if (isset($_FILES['csv_file'])) {
    
    $file = $_FILES['csv_file']['tmp_name'];

   
    if (($handle = fopen($file, "r")) !== FALSE) {
      
      fgetcsv($handle);

      
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        
        $column1 = $conn->real_escape_string($data[0]);
        $column2 = $conn->real_escape_string($data[1]);
        $column3 = $conn->real_escape_string($data[2]);
        $column4 = $conn->real_escape_string($data[3]);
        $column5 = $conn->real_escape_string($data[4]);
        $column6 = $conn->real_escape_string($data[5]);
        $column7 = $conn->real_escape_string($data[6]);
        $column8 = $conn->real_escape_string($data[7]);
        $column9 = $conn->real_escape_string($data[8]);
        $column10 = $conn->real_escape_string($data[9]);
        $column11 = $conn->real_escape_string($data[10]);

       
        $sql = "INSERT INTO t10_agency_info (account, name, address, phone, start, end, people, detailed, review) VALUES ('$column1', '$column2', '$column3', '$column4', '$column6', '$column7', '$column8', '$column9', '$column10')";
        $sql = "INSERT INTO t10_agency_care_type (care_type) VALUES ('$column5')";
        if ($conn->query($sql) === TRUE) {
          echo "插入成功<br>";
        } else {
          echo "插入失敗: " . $conn->error . "<br>";
        }
      }

    
      fclose($handle);
    }
    
  }
  

  $conn->close();
  ?>
</body>
</html>
