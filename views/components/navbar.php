 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid list-login">
     <a class="navbar-brand" href="#">My blog</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="/home">Home</a>
         </li>
       </ul>
     </div>
     <div class="menu-list">
       <?php
        if (!$_SESSION['user']) {
        ?>
         <a class="nav-link" href="/login">login</a>
         <a class="nav-link" href="/register">Register</a>
       <?php
        } else {
        ?>
         <a class="nav-link" href="/profile">Profile</a>
         <form action="/auth/logout" method="post" style="width: auto; display: block; padding: 0; border: none;  background-color: transparent">
           <button class="nav-link" type="submit">Logout</button>
         </form>
       <?php
        }
        ?>



     </div>
   </div>
 </nav>