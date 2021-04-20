<?php
echo'

<!-- Modal -->
<div class="modal fade" id="signuppop" tabindex="-1" aria-labelledby="signuppopLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signuppopLabel">SignUp for An iForums Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="brains/_handlesignup.php" method="post"  >
      <div class="mb-3">
        <label for="Email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="Email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="Email" class="form-label">Username</label>
        <input type="varchar" class="form-control" id="Username" name="username" aria-describedby="emailHelp">
        </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password1" name="password">
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">confirm Password</label>
        <input type="varchar" class="form-control" id="confirmPassword1" name="confirmpassword">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" >
        <label class="form-check-label" >Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>';


?>