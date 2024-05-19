<?php include 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Librarian</title>
  <link rel="stylesheet" href="css\upload.css">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <!-- BoxIcons v2.1.2 -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
  <title>Libraian</title>

  <body>
    <div class="sidebar">

      <div class="toggle">
        <i class="bx bx-chevron-right"></i>
      </div>
      <div class="logo">
        <h3>Virtual Librarian</h3>
        <img src="img\logob.png">
      </div>
      <nav>
        <ul>
          <a style="text-decoration: none;" href="search.html">
            <li class="nav-item">
              <i class="bx bx-podcast"></i>
              <span>Home</span>
            </li>
          </a>
          <a style="text-decoration: none;" href="index.html">
            <li class="nav-item ">
              <i class='bx bx-search'></i>
              <span>Search Books</span>
            </li>
          </a>
          <a style="text-decoration: none;" href="http://localhost/visai/upload.php">
            <li class="nav-item   active">
              <i class='bx bxs-cloud-upload'></i>
              <span>Upload</span>
            </li>
          </a>
          <a style="text-decoration: none;" href="http://localhost/visai/keywords.php">

            <li class="nav-item">
              <i class="bx bxs-bell"></i>
              <span>Documents</span>
            </li>
          </a>
          <li class="nav-item">
            <i class="bx bxs-cog"></i>
            <span>Technical Issue</span>
          </li>
        </ul>

        <hr>



      </nav>

    </div>

    <br><br>
    <div class="main-container">
      <div class="container" style="margin-left:40px">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12" style="margin-top:40px">
            <br>

            <strong>Upload You Document</strong>
            <form method="post" enctype="multipart/form-data">
              <?php
              // If submit button is clicked
              if (isset($_POST['submit'])) {
                // get name from the form when submitted
                $name = $_POST['name'];

                if (isset($_FILES['pdf_file']['name'])) {
                  // If the ‘pdf_file’ field has an attachment
                  $file_name = $_FILES['pdf_file']['name'];
                  $file_tmp = $_FILES['pdf_file']['tmp_name'];


                  // Move the uploaded pdf file into the pdf folder
              

                  move_uploaded_file($file_tmp, "./pdf/" . $file_name);
                  // Insert the submitted data from the form into the table
                  echo $file_name . $name;
                  $insertquery =
                    "INSERT INTO pdf_data(username,filename) VALUES('$name','$file_name')";

                  // Execute insert query
                  $iquery = mysqli_query($con, $insertquery);

                  if ($iquery) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show text-center">
                      <a class="close" data-dismiss="alert" aria-label="close">
                        ×
                      </a>
                      <strong>Success!</strong> Data submitted successfully.
                    </div>
                    <?php
                  } else {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center">
                      <a class="close" data-dismiss="alert" aria-label="close">
                        ×
                      </a>
                      <strong>Failed!</strong> Try Again!
                    </div>
                    <?php
                  }
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show text-center">
                    <a class="close" data-dismiss="alert" aria-label="close">
                      ×
                    </a>
                    <strong>Failed!</strong> File must be uploaded in PDF format!
                  </div>
                  <?php
                } // end if
              } // end if
              ?>

              <div class="form-input py-2">
                <br>
                <div class="form-group" style="margin:auto">

                  <input type="text" class="form-control" placeholder="Enter your name" name="name" width="120px">
                </div> <br>
                <div class="form-group">
                  <input type="file" name="pdf_file" class="form-control" accept=".pdf" required />
                </div><br>
                <div class="form-group">
                  <input type="submit" class="btnRegister" name="submit" value="Upload">
                </div><br>


              </div>
            </form>
          </div>

          <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
              <div class="card-header text-center">
                <h4>Records from Database:</h4><br>
              </div>
              <div class="card-body">
                <div >

                  <table class="table-responsive">
                    <thead>
                      <th>ID</th>
                      <th>UserName</th>
                      <th>FileName</th>
                    </thead>
                    <tbody>
                      <?php
                      $selectQuery = "select * from pdf_data";
                      $squery = mysqli_query($con, $selectQuery);

                      while (($result = mysqli_fetch_assoc($squery))) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $result['id']; ?>
                          </td>
                          <td>
                            <?php echo $result['username']; ?>
                          </td>
                          <td>
                            <?php echo $result['filename']; ?>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


      <script script src="js/script.js"></script>
      <script script src="js/upload.js"></script>
  </body>
  <!-- partial -->
  <script src="./script.js"></script>
  <script src="https://kit.fontawesome.com/d97b87339f.js" crossorigin="anonymous"></script>

</body>

</html>