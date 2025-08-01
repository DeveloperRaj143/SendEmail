<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
<form class="mt-5" method="POST" action="mail.php">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div data-mdb-input-init class="form-outline">
          <label class="form-label" for="name">Full name</label>
        <input type="text" id="name" name="name" required class="form-control" />
      </div>
    </div>
   
  </div>
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="email">Email</label>
    <input type="email" id="email" name="email" required class="form-control" />
  </div>

  <!-- Number input -->
  <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="subject">Subject</label>
    <input type="text" id="subject" name="subject" required class="form-control" />
  </div>

  <!-- Message input -->
  <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="massage">Additional information</label>
    <textarea class="form-control" id="massage" name="massage" rows="4"></textarea>
  </div>

  

  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" name="submitContact" class="btn btn-primary btn-block mb-4">Send mail</button>
  <a href="otpindex.php" class="btn btn-primary btn-block mb-4">Send otp</a>
</form>
</div>

<script>
    // Initialization for ES Users
import { Input, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Input, Ripple });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var messagetext="<?= $_SESSION['status'] ?? ''; ?>";
    if(messagetext != ''){

    
    Swal.fire({
        title: "Thank You?",
        text: messagetext,
        icon: "success"
        });
        <?php unset($_SESSION['status'])?>

    }
</script>
</body>
</html>